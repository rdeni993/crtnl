<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SeparateUsersView;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 
 * Use this controller like
 * proxy
 * 
 */

class UserBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware( function(Request $request, Closure $next) {

            // Use benefit of request
            // to share data between views
            view()->share([
                'accountType'   => $request->user()->role,
                'labelName'     => $request->user()->name,
            ]);

            // Continue
            return $next($request);
        });
    }
}
