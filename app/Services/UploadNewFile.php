<?php 

namespace App\Services;

use App\Http\Requests\NewFileRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadNewFile
{
    /**
     * Return upload status. If we deal with 
     * to large file we will handle Laravel Exception
     * 
     * @param NewFileRequest $request 
     * @return bool
     */
    public function upload(NewFileRequest &$request) : bool
    {
        try
        {
            return Storage::disk('private')->put('documents', $request->file('document'));
        }
        catch(PostTooLargeException $e)
        {
            // Log error
            Log::channel('files')->error("File " . $request->file('document')->getClientOriginalName() . " is to big for upload!");
            
            // Return false
            return false;
        }
    }
}