<?php

namespace App\Http\Controllers;

use App\Events\NewUserCreatedEvent;
use App\Events\NewUserNotCreatedEvent;
use App\Http\Requests\NewUserRequest;
use App\Services\CreateNewUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * Return Signup form
     * 
     * @return View
     */
    public function index() : View
    {
        return view('ui.signup');
    }

    /**
     * Determinate the page from where
     * we recieve request for new user, is that
     * a login screen, signup or admin dashboard.. 
     * 
     * @return string
     */
    private function previousPage() : string 
    {
        $previousUrl = str_replace(url('/'), '', url()->previous());

        return $previousUrl !== '/signup' ? $previousUrl : '/login';
    }

    /**
     * Handle process creating new user.
     * After we complete process system will
     * trigger event NewUserCreatedEvent
     * 
     * @param NewUserRequest $request
     * @param CreateNewUser $service
     * 
     * @return void
     */
    public function create( NewUserRequest $request, CreateNewUser $service ) : RedirectResponse
    {
        if( $newUser = $service->store($request->validated()) )
        {
            // Emit event
            event( new NewUserCreatedEvent( $newUser ) );
            // Go to login page
            return redirect()->to( $this->previousPage() )->with('alert-success-message', __('auth.registered'));
        }
        else 
        {
            // Emit event
            event( new NewUserNotCreatedEvent( $request->validated() ) );   
            // Go back
            return redirect()->back();
        }
    }
}
