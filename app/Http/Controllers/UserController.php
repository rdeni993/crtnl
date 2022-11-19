<?php

namespace App\Http\Controllers;

use App\Events\UserRemovedEvent;
use App\Events\UserUpdatedEvent;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\RemoveUser;
use App\Services\SeparateUsersView;
use App\Services\UpdateUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * 
 * Handle User control process
 * 
 */

class UserController extends UserBaseController
{
    /**
     * Show user control table
     * 
     * @param Request $request
     * @return View
     */
    public function index(Request $request, SeparateUsersView $service) : View
    {
        return view('ui.users', [
            'pageTitle' => 'Users',
            'userData' => $service->view($request)
        ]);
    }

    /**
     * Display form for creating
     * new user 
     * 
     * @return View
     */
    public function create() : View
    {
        return view('ui.new-user', [
            'pageTitle' => "Create New User"
        ]);
    }

    /**
     * Return User profile
     * 
     * @param Request $request
     * @param User $user
     * @return View
     */
    public function view(Request $request, User $user) : View
    {
        if( $request->user()->can('view', $user) )
        {
            return view('ui.profile', [
                'pageTitle' => "UserProfile",
                'user'      => $user
            ]);
        }

        abort(403);
    }

    /**
     * Form for update user
     * 
     * @param User $user
     * @return View
     */
    public function edit(Request $request, User $user) : View
    {
        if( $request->user()->can('update', $user) )
        {
            return view('ui.edit', [
                'pageTitle' => 'Edit user', 
                'user' => $user
            ]);
        }

        abort(403);
    }

    /**
     * Delete user from database
     * 
     * @param Request $request
     * @param RemoveUser $service
     * @param User $user
     * @return RedirectResponse
     */
    public function delete(Request $request, RemoveUser $service, User $user) : RedirectResponse
    {
        if( $request->user()->can('delete', User::class) )
        {
            if( $service->remove($user) )
            {
                event( new UserRemovedEvent($user) );

                return redirect()->to('/users')->with('alert-success-message', 'User removed! All filef belongs to user are removed!');
            }
        }

        // Error occured while deleting
        return redirect()->back()->with('alert-danger-message', 'User not removed');
    }

    public function update(UpdateUserRequest $request, UpdateUser $service) : RedirectResponse
    {
        // Abort if we did not find
        // requested user...
        if( ! $user = User::find($request->user_id) )
            abort(404);

        // Update process
        if( $request->user()->can('update', $user) )
        {   
            if( $service->update( $user, $request->only(['name', 'username']) ) )
            {
                event( new UserUpdatedEvent( $user ) );

                return redirect()->back()->with('alert-success-message', "User is updated!");
            }
        }

        // Go back
        return redirect()->back()->withErrors("User is not updated");
    }
}
