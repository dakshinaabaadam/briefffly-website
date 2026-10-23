<?php

namespace App\Http\Controllers;

use Briefffly\Backend\ContactMailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private ContactMailService $mailService;

    public function __construct()
    {
        $backendRoot = dirname(base_path()).DIRECTORY_SEPARATOR.'backend';
        $this->mailService = new ContactMailService($backendRoot);
    }

    public function home(): JsonResponse
    {
        return response()->json(['message' => 'Briefffly backend is running']);
    }

    public function sendEmail(Request $request): JsonResponse
    {
        try {
            $form = $this->mailService->validateContactPayload($request->all());

            return response()->json($this->mailService->sendEmail($form));
        } catch (\InvalidArgumentException $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 422);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to send email. Please try again later.',
            ], 500);
        }
    }

    public function sendAutoReply(Request $request): JsonResponse
    {
        try {
            $form = $this->mailService->validateContactPayload($request->all());

            return response()->json($this->mailService->sendAutoReply($form));
        } catch (\InvalidArgumentException $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()], 422);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to send auto-reply. Please try again later.',
            ], 500);
        }
    }
}
