<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends UserBaseController
{
    /**
     * Create a dashboard
     * 
     * @return View
     */
    public function index(Request $request) : View
    {
        return view('ui.dashboard', [
            'pageTitle'   =>  'Dashboard',
            'clients'     =>  User::where('role', 'client')->limit(5)->orderBy('id', 'DESC')->get(),

            'countUsers'   => User::all()->count(),
            'countAdmins' =>  User::where('role', 'administrator')->count(),
            'countSecretaries' => User::where('role', 'secretary')->count(),
            'countClients' => User::where('role', 'client')->count(),

            'notifications' => $request->user()->unreadNotifications()->orderBy('created_at', 'DESC')->take(6)->get(),

            'documents' => File::all()->take(6)
        ]);
    }
}
