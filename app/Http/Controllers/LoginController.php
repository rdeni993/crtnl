<?php

namespace App\Http\Controllers;

use App\Events\UserLoginEvent;
use App\Events\UserLoginFailedEvent;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * 
 * Handle Login process. 
 * For this action we will user
 * a Auth Facade.
 * 
 */

class LoginController extends Controller
{
    
    /**
     * Get previous page
     * 
     * @return string
     */
    public function getPreviousPage() : string
    {
        return Session::get('previousPage') ?? '/';
    }

    /**
     * Set previous page
     * 
     * @return void
     */
    public function setPreviousPage($request) : void
    {
        if( empty($request->user()->id) )
            Session::flash('previousPage', url()->previous());
        else 
            Session::flash('previousPage', '/home');
    }

    /**
     * Display login form   
     * 
     * @return View
     */
    public function index(Request $request) : View
    {
        $this->setPreviousPage($request);

        return view('ui.login');
    }

    /**
     * Determinate where user should go
     * after login.
     * 
     * @param Request $request
     * @return string
     */
    public function redirectPath(Request &$request) : string 
    {
        if( $request->user()->isAdmin() || $request->user()->isSecretary() )
            return $this->getPreviousPage();
        
        return '/users/update/' . $request->user()->id;
    }

    /**
     * Handle login process
     * 
     * @param LoginUserRequest $request
     * @return RedirectResponse
     */
    public function login(LoginUserRequest $request) : RedirectResponse
    {
        if( Auth::attempt( $request->only(['email', 'password']), $request->remember ?? false ) )
        {
            event( new UserLoginEvent( Auth::user() ) );
            return redirect()->to( $this->redirectPath($request) )->with('alert-success-message', $request->email . ' ' . __('auth.welcome'));
        }
        else 
        {
            event( new UserLoginFailedEvent($request->validated()) );
            return redirect()->back()->withErrors('');
        }
    }

    /**
     * @return RedirectResponse
     */
    public function logout() : RedirectResponse
    {
        Auth::logout();
        return redirect()->to('/home');
    }
}
