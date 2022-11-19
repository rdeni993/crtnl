<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
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
     * Assign document to user
     * 
     * @param User $user
     * @return bool
     */
    public function assign(User $user) : bool 
    {
        return (bool) $user->isAdmin();
    }

    /**
     * Determinate who can remove 
     * file from filesystem
     * 
     * @param User $user
     * @return bool
     */
    public function delete(User $user) : bool 
    {
        return $user->isAdmin();
    }

    /**
     * Client cannot see uploaded files
     * 
     * @param User $user
     * @return bool
     */
    public function cannotView(User $user) : bool 
    {
        return $user->role === 'client';
    }

    /**
     * Determinate who can download 
     * file
     * 
     * @param User $user
     * @return bool
     */
    public function download(User $user) : bool
    {
        if($user->isAdmin())
            return true;

        if($user->isSecretary())
            return true;

        return false;
    }
}
