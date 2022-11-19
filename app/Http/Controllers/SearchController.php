<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SearchUserByUniqueId;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends UserBaseController
{
    public function index(Request $request, SearchUserByUniqueId $service) : View
    {
        if( $request->user()->can('search', User::class) )
        {
            return view('ui.search',[
                'users' =>  $service->search($request->q),
                'pageTitle' => "Search"
            ]);
        }

        abort(403);
    }
}
