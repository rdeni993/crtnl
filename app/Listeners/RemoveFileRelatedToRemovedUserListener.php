<?php

namespace App\Listeners;

use App\Models\File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class RemoveFileRelatedToRemovedUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $filesBelongsToUser = File::where('user_id', $event->user->id)->get();

        foreach( $filesBelongsToUser as $fPointer )
        {
            // Remove from database
            $fPointer->delete();

            // Remove from store
            Storage::disk('private')->delete( 'documents/' . $fPointer->file_path );
        }
    }
}
