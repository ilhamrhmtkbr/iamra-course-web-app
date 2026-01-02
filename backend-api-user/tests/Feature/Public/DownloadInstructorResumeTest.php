<?php

namespace Tests\Feature\Public;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DownloadInstructorResumeTest extends TestCase
{
    public function test_user_bisa_download_cv_instructor(): void
    {
        $id = '123';
        $filename = "{$id}.pdf";
        $relativePath = "user-resume/{$filename}"; // ← FIX: Hapus 'private/'

        Storage::disk('local')->put($relativePath, 'PDF CONTENT');

        $response = $this->get(config('api.version') . '/public/instructor/download-resume?id=' . $id);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
        $response->assertDownload($filename);
    }

    public function test_download_gagal_jika_id_tidak_ada(): void
    {
        $response = $this->get(config('api.version') . '/public/instructor/download-resume');

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'id' => ['The id field is required.']
            ]
        ]);
    }

    public function test_download_gagal_jika_file_tidak_ditemukan(): void
    {
        $id = 'nonexistent';
        $response = $this->get(config('api.version') . '/public/instructor/download-resume?id=' . $id);

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false,
            'message' => 'File tidak ditemukan.'
        ]);
    }

    public function test_download_gagal_jika_id_kosong(): void
    {
        $response = $this->get(config('api.version') . '/public/instructor/download-resume?id=');

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'errors' => [
                'id' => ['The id field is required.']
            ]
        ]);
    }
}
