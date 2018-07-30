<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:addresses,name|min:1|max:255',
            'city' => 'required|string|exists:cities,name',
            'area' => 'required|string|exists:areas,name',
            'street' => 'sometimes|nullable|string|min:1|max:255',
            'house' => 'sometimes|nullable|string|min:1|max:255',
            'additional_info' => 'sometimes|nullable|string'
        ];
    }
}
