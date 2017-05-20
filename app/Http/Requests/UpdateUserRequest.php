<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'user_name'             => 'min:6|max:20|required',
                'first_name'            => 'min:4|required',
                'last_name'             => 'min:4|required',
                'married_surname'       => 'min:4',
                'email'                 => 'min:6|required',
                'password'              => 'min:4'
            ];
    }
}
