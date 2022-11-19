<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * 
 * Search Key using unique ID
 * 
 */

class SearchUserByUniqueId
{
    /**
     * Search user based on unique_id
     * 
     * @param string $searchKey
     * @return Paginator
     */
    public function search(string $searchKey) : Paginator
    {
        return User::where('unique_id', $searchKey)->paginate(15);
    }
}