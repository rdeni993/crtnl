<?php 

namespace App\Services;

use App\Http\Requests\NewFileRequest;
use App\Models\File;
use Illuminate\Http\Request;

class CreateNewFile
{
    /**
     * Create Array with data we need
     * to keep the track
     * 
     * @param NewFileRequest $request
     * @return void
     */
    public function prepare(NewFileRequest $request) : array
    {
        return [
            'file_name' => $request->file('document')->getClientOriginalName(),
            'file_size' => $request->file('document')->getMaxFilesize(),
            'file_path' => $request->file('document')->hashName(),
            'file_mime' => $request->file('document')->getMimeType(),
            'user_id'   => $request->user_id
        ];
    }

    /**
     * Create new file in database
     * related to uploaded file
     * 
     * @param array $fileData
     * @return File
     */
    public function create(NewFileRequest $request) : File
    {
        return File::create($this->prepare($request));
    }
}