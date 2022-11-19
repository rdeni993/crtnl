<?php

namespace App\Http\Controllers;

use App\Services\ClearNotifications;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationController extends UserBaseController
{
    /**
     * Show all notifiations 
     * 
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : View
    {
        return view('ui.notifications', [
            'notifications' => $request->user()->unreadNotifications()->orderBy('created_at', 'DESC')->paginate(20),
            'pageTitle' => "Notifications"
        ]);
    }

    /**
     * Read All notifications
     * 
     * @param Request $request
     * @param ClearNotifications $service
     * @return RedirectResponse
     */
    public function delete(Request $request, ClearNotifications $service) : RedirectResponse
    {
        $service->clear( $request->user() );

        return redirect()->back();
    }
}
