<?php

namespace Domain\Public\Action;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadInstructorResumeAction
{
    public function __invoke(Request $request): StreamedResponse|JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $valid = $validator->validated();

            $resumeId = $valid['id'];
            $relativePath = "user-resume/" . $resumeId . ".pdf";

            $disk = Storage::disk('local');

            if (!$disk->exists($relativePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File tidak ditemukan.'
                ], 404);
            }

            return $disk->download($relativePath, $resumeId . '.pdf', [
                'Content-Type' => 'application/pdf'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getCode() > 0 ? $e->getCode() : 500);
        }
    }
}
