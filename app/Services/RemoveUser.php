<?php 

namespace App\Services;

use App\Models\User;

/**
 * 
 * Handle user delete
 * process
 * 
 */

class RemoveUser
{
    public function remove(User &$user) : bool 
    {
        return (bool) $user->remove();
    }
}