<?php

namespace App\Http\Requests\API\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'rate' => 'required|integer|max:5|min:1',
            'text' => 'required',
            'user_id' => 'required|integer',
            'apartment_id' => 'required|integer',
        ];
    }
}
