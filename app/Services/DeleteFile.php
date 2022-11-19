<?php 

namespace App\Services;

use App\Models\File;

/**
 * 
 * Remove File track
 * 
 */

class DeleteFile
{
    public function remove(File $file) : bool 
    {
        return (bool) $file->delete();
    }
}