<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CategoryStoreRequests extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'edit_value'  => 'required|integer',
            'name'        => 'required|max:191',
            'description' => 'required',
        ];
    }

    public function failedValidation( Validator $validator )
    {
        //write your bussiness logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json([
            'success' => false, 'message' => $validator->errors()->first()
        ], 422));
    }
}
