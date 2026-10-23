from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from email.message import EmailMessage
from pathlib import Path
from dotenv import load_dotenv

import smtplib
import os


load_dotenv()

SMTP_HOST = os.getenv("SMTP_HOST")
SMTP_PORT = int(os.getenv("SMTP_PORT", 587))
SMTP_USERNAME = os.getenv("SMTP_USERNAME")
SMTP_PASSWORD = os.getenv("SMTP_PASSWORD")
CONTACT_RECEIVER = os.getenv("CONTACT_RECEIVER")


app = FastAPI()


app.add_middleware(
    CORSMiddleware,
    allow_origins=[
        "http://127.0.0.1:5500"
    ],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


EMAIL_TEMPLATE_PATH = (
    Path(__file__).resolve().parent
    / "email_templates"
    / "auto_reply.html"
)

NEW_CLIENT_TEMPLATE_PATH = (
    Path(__file__).resolve().parent
    / "email_templates"
    / "new_client_request.html"
)


class ContactForm(BaseModel):
    name: str
    email: str
    subject: str
    message: str


@app.get("/")
def home():
    return {"message": "Briefffly backend is running"}

@app.post("/send-email")
def send_email(form: ContactForm):
    with open(NEW_CLIENT_TEMPLATE_PATH, "r", encoding="utf-8") as file:
        html_content = file.read()

    # Preserve message line breaks for HTML email
    formatted_message = (
        form.message
        .replace("&", "&amp;")
        .replace("<", "&lt;")
        .replace(">", "&gt;")
        .replace("\n", "<br>")
    )

    html_content = (
        html_content
        .replace("{{name}}", form.name)
        .replace("{{email}}", form.email)
        .replace("{{subject}}", form.subject)
        .replace("{{message}}", formatted_message)
    )

    email = EmailMessage()

    email["From"] = SMTP_USERNAME
    email["To"] = CONTACT_RECEIVER
    email["Subject"] = "New Client Request - Briefffly"

    # Plain-text fallback
    email.set_content(
        f"""
            New Client Request

            Name: {form.name}
            Email: {form.email}
            Subject: {form.subject}

            Client Enquiry:
            {form.message}
        """
    )

    # HTML version
    email.add_alternative(
        html_content,
        subtype="html"
    )

    with smtplib.SMTP(SMTP_HOST, SMTP_PORT) as server:
        server.starttls()
        server.login(SMTP_USERNAME, SMTP_PASSWORD)
        server.send_message(email)

    return {
        "success": True,
        "message": "New client request email sent successfully"
    }




@app.post("/send-auto-reply")
def send_auto_reply(form: ContactForm):
    auto_reply = EmailMessage()

    auto_reply["From"] = SMTP_USERNAME
    auto_reply["To"] = form.email
    auto_reply["Subject"] = "Thank you for contacting Briefffly"

    # Plain-text fallback
    auto_reply.set_content(
        f"""
            Hi {form.name},

            Thank you for contacting Briefffly!

            We have received your message successfully. Our team will review your request and get back to you as soon as possible.

            Best regards,
            Briefffly Team
        """
        )

    # Beautiful HTML version
    formatted_message = (
        form.message
        .replace("&", "&amp;")
        .replace("<", "&lt;")
        .replace(">", "&gt;")
        .replace("\n", "<br>")
    )

    with open(EMAIL_TEMPLATE_PATH, "r", encoding="utf-8") as file:
        html_content = file.read()

    html_content = (
        html_content
        .replace("{{name}}", form.name)
        .replace("{{subject}}", form.subject)
        .replace("{{message}}", formatted_message)
    )

    auto_reply.add_alternative(html_content, subtype="html")

    # Send the email
    with smtplib.SMTP(SMTP_HOST, SMTP_PORT) as server:
        server.starttls()
        server.login(SMTP_USERNAME, SMTP_PASSWORD)
        print("AUTO-REPLY TO:", auto_reply["To"])
        server.send_message(auto_reply)

    return {
        "success": True,
        "message": "Auto-reply email sent successfully"
    }
