<?php 

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Download file
 */

class DownloadFile
{
    /**
     * @param File $file
     * @return bool
     */
    public function download(File $file) 
    {
        if( Storage::disk('private')->exists($file->documentPath()) )
        {
            return Storage::disk('private')->path( $file->documentPath());
        }
        else 
        {
            abort(404);
        }
    }
}