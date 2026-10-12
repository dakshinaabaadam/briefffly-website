from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel

import os
import smtplib
from email.message import EmailMessage
from dotenv import load_dotenv


load_dotenv()


app = FastAPI()

SMTP_HOST = os.getenv("SMTP_HOST")
SMTP_PORT = int(os.getenv("SMTP_PORT", "587"))
SMTP_USERNAME = os.getenv("SMTP_USERNAME")
SMTP_PASSWORD = os.getenv("SMTP_PASSWORD")
CONTACT_RECEIVER = os.getenv("CONTACT_RECEIVER")

# Allow the frontend running through Live Server
app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://127.0.0.1:5500"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


class ContactMessage(BaseModel):
    name: str
    email: str
    subject: str
    message: str


@app.get("/")
def home():
    return {"message": "Briefffly contact API is running"}


@app.post("/contact")
def contact(data: ContactMessage):

    email = EmailMessage()

    email["From"] = SMTP_USERNAME
    email["To"] = CONTACT_RECEIVER
    email["Subject"] = f"Briefffly Contact: {data.subject}"
    email["Reply-To"] = data.email

    email.set_content(
        f"Name: {data.name}\n"
        f"Email: {data.email}\n"
        f"Subject: {data.subject}\n\n"
        f"Message:\n{data.message}"
    )

    with smtplib.SMTP(SMTP_HOST, SMTP_PORT) as server:
        server.starttls()
        server.login(SMTP_USERNAME, SMTP_PASSWORD)
        server.send_message(email)


    
    return {
        "success": True,
        "message": "Contact message sent successfully"
    }   