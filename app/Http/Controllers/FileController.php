<?php

namespace App\Http\Controllers;

use App\Events\FileAssignedEvent;
use App\Events\FileDownloadedEvent;
use App\Events\FileRemovedEvent;
use App\Http\Requests\NewFileRequest;
use App\Models\File;
use App\Models\User;
use App\Services\CreateNewFile;
use App\Services\DeleteFile;
use App\Services\DownloadFile;
use App\Services\UnlinkFile;
use App\Services\UploadNewFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\VersionUpdater\Downloader\FileDownloader;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends UserBaseController
{
    /**
     * Create form for file
     * uploading
     * 
     * @return View
     */
    public function index(User $user) : View
    {
        return view('ui.upload', [
            'pageTitle' => 'Upload Document',
            'user' => $user
        ]);
    }

    /**
     * Create new file
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(NewFileRequest $request, UploadNewFile $uploadService, CreateNewFile $service) // : RedirectResponse
    {
        if( $request->user()->can('assign', File::class) )
        {
            if( $uploadService->upload($request) )
            {
                if( $newFileData = $service->create($request) )
                {
                    // Emit event
                    event( new FileAssignedEvent($newFileData) );

                    // Go back with success message
                    return redirect()->back()->with('alert-success-message', "Document is uploaded!");
                }
            }
        }

        return redirect()->back()->withErrors('File is not upload! Check the log file for errors!');
    }

    /**
     * Remove file
     * 
     * @param Request $request
     * @param UnlinkFile $unlinkService
     * @param DeleteFile $deleteService
     * @param File $file
     * 
     * @return RedirectResponse
     */
    public function remove(Request $request, UnlinkFile $unlinkService, DeleteFile $deleteService, File $file) : RedirectResponse
    {
        if( $request->user()->can('delete', File::class) )
        {
            if( $unlinkService->unlink($file) )
            {
                if( $deleteService->remove($file) )
                {
                    event( new FileRemovedEvent($file) );

                    return redirect()->back()->with('alert-success-message');
                }
            }
        }

        return redirect()->back()->withErrors("File is not removed");
    }

    /**
     * @param Request $request
     * @param DownloadFile $service
     * @param File $file
     * 
     * @return RedirectResponse
     */
    public function download(Request $request, DownloadFile $service, File $file) : BinaryFileResponse
    {
        if( $request->user()->can('download', File::class) )
        {
            if( $filePath = $service->download($file) )
            {
                event( new FileDownloadedEvent($request->user(), $file) );

                return response()->file($filePath);
            }
        }

        abort(404);
    }
}
