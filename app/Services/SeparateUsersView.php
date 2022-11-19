<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * 
 * Separate Users is class
 * that, based on role, return collection
 * 
 */
class SeparateUsersView
{

    /**
     * @var int
     */
    private int $resultPerPage = 5;

    /**
     * @param Request $request
     * 
     * @return Collection
     */
    public function view(Request $request) : LengthAwarePaginator
    {
        if( $request->user()->can('viewAll', User::class) )
        {
            return User::paginate($this->resultPerPage);
        }
        
        if( $request->user()->can('viewOnlyClients', User::class) )
        {
            return User::where('role', 'client')->paginate($this->resultPerPage);
        }

        abort(403);
    }
}