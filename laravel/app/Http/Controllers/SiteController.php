<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SiteController extends Controller
{
    public function home(): Response
    {
        return $this->htmlFromProjectRoot('Briefffly Site v2.dc.html');
    }

    public function homeV1(): Response
    {
        return $this->htmlFromProjectRoot('Briefffly Site.dc.html');
    }

    public function brieffflySiteV2(): Response
    {
        return $this->home();
    }

    public function brieffflySite(): Response
    {
        return $this->homeV1();
    }

    private function htmlFromProjectRoot(string $filename): Response
    {
        $path = dirname(base_path()).DIRECTORY_SEPARATOR.$filename;

        if (! is_file($path)) {
            abort(404, $filename.' not found');
        }

        return response(file_get_contents($path), 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
        ]);
    }
}
