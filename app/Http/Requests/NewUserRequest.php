<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only administrators can create new user, but
     * if there is no registered users first user can access
     * to signup form.
     *
     * @return bool
     */
    public function authorize()
    {
        if( null !== $this->user() )
        {
            if( $this->user()->can('create', User::class) )
            {
                return true;
            }
        }
        else 
        {
            if( sizeof( User::all() ) === 0 )
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'email|required|unique:users,username',
            'username'  => 'required|unique:users,username',
            'password'  => 'required|min:8',
            'agreed'    => 'required',
            'role'      => 'sometimes'
        ];
    }
}
