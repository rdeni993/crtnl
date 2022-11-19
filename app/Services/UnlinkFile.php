<?php 

namespace App\Services;

use App\Models\File;

/**
 * 
 * Remove file from filesystem
 * 
 */

class UnlinkFile
{
    public function unlink(File $file) : bool 
    {
       return $file->unlink();
    }
}