<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str as StringHandler;

/**
 * 
 * This Services should be used to
 * create new user in system.
 * 
 */

class CreateNewUser
{
    /**
     * If this is first registered user
     * in system giv him a administrator
     * privilegies.
     * 
     * @return string
     */
    private function determinateRole() : string 
    {
        if( ! sizeof(User::all()) )
            return 'administrator';
        return 'client';
    }

    /**
     * Use this method to update user data 
     * bofore we proceed to store it to database.
     * 
     * @param array $userData
     * 
     * @return void
     */
    private function updateData(array &$userData) : void 
    {
        // Set role for user
        // based on first visit or administrator decision
        $userData['role']       =   $userData['role'] ?? $this->determinateRole();

        // Hash password for user
        $userData['password']   =   Hash::make($userData['password']);

        // Create unique id for
        // user.
        $userData['unique_id']  =   StringHandler::random(6);
    }

    /**
     * Create store user in database
     * 
     * @param array $userData
     * 
     * @return User
     */
    public function store( array $userData ) : User | bool
    {
        // Call updateData method to
        // add all data to user model
        $this->updateData($userData);

        // Return created instance
        return User::create($userData);
    }
}