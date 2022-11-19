<?php 

namespace App\Services;

use App\Models\User;

/**
 * 
 * Clear Notifications
 * 
 */

class ClearNotifications
{
    /**
     * @param User $user
     * @return bool
     */
    public function clear( User $user ) : bool
    {
        foreach( $user->unreadNotifications as $notification )
        {
            $notification->markAsRead();
        }

        return true;
    }
}