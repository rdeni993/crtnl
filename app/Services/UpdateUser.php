<?php 

namespace App\Services;

use App\Models\User;

/**
 * 
 * Handle Update user process.
 * 
 */

class UpdateUser 
{
    /**
     * @param User $user
     * @param array $userData
     * 
     * @return bool
     */
    public function update(User $user, array $userData) : bool 
    {
        return (bool) $user->update($userData);
    }
}