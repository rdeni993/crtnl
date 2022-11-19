<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class File extends Model
{
    use HasFactory;

    protected $table='files';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_mime',
        'file_size',
        'file_path'
    ];

    /**
     * Belongs to user
     * 
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Unlink file from filesystem..
     *
     * @return bool
     */
    public function unlink() : bool
    {
        return (bool) Storage::disk('private')->delete( 'documents/' . $this->file_path );
    }

    /**
     * Delete file track
     * 
     * @return bool
     */
    public function remove() : bool 
    {
        return (bool) $this->delete();
    }

    /**
     * Download
     * 
     * @return bool
     */
    public function documentPath()
    {
        return 'documents/' . $this->file_path;
    }
}
