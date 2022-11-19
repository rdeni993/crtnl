<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Only admins can view
     * all registered users
     * 
     * @param User $user
     * @return bool
     */
    public function viewAll( User $user ) : bool 
    {
        return (bool) $user->isAdmin();
    }

    /**
     * Secretary can view only clients.
     * 
     * @param User $user
     * @return bool
     */
    public function viewOnlyClients( User $user ) : bool 
    {
        return (bool) $user->isSecretary();
    }

    /**
     * Determinate View
     * 
     * @param User $user
     * @param User $profile
     * @return bool
     */
    public function view(User $user, User $profile) : bool
    {
        // Admin can view everybody
        if( $user->isAdmin() )
            return true;

        // Secretary can view only clients
        if( $user->isSecretary() && $profile->role == 'client' )
            return true;

        // Everybody can view his profile..
        if( $user->id == $profile->id )
            return true;

        return false;
    }

    /**
     * Only administrator can create new user
     * 
     * @param User $user
     * @return bool
     */
    public function create(User $user) : bool 
    {
        return (bool) $user->isAdmin();
    }

    /**
     * Only administrator can remove user
     * 
     * @param User $user
     * @return bool
     */
    public function delete(User $user) : bool
    {
        return (bool) $user->isAdmin();
    }

    /**
     * Update policy
     * 
     * @param User $user
     * @param User $profile
     * @return bool
     */
    public function update(User $user, User $profile) : bool 
    {
        // Admin can do everyhtin
        if( $user->isAdmin() )
        {
            return true;
        }

        // Another case is if profile is client 
        // and user is secretary
        if( $user->isSecretary() && ( $profile->role == 'client' ) )
        {
            return true;
        }        

        // Last thing every user can change his data.
        // If user is not admin 
        // he can change only his data
        if( $user->id == $profile->id )
        {
            return true;
        }

        return false;
    }

    
    /**
     * Client cannot see some parts
     * 
     * @param User $user
     * @return bool
     */
    public function cannotView(User $user) : bool 
    {
        return $user->role === 'client';
    }

    /**
     * Client cannot user search
     * 
     * @param User $user
     * @return bool
     */
    public function search(User $user) : bool
    {
        if( $user->isAdmin() )
            return true;

        if( $user->isSecretary() )
            return true;

        return false;
    }
}
