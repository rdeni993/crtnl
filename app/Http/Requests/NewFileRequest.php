<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id'     => 'required|exists:users,id',
            'document'    => [
                'required',
                'max:' . config('filesystems.max_file_size'),
                'mimes:' . config('filesystems.supported_files')
            ]
        ];
    }
}
