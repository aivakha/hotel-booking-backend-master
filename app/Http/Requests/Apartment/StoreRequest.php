<?php

namespace App\Http\Requests\Apartment;

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
            'title' => 'required|max:255',
            'full_description' => 'required|max:2000',
            'short_description' => 'required|max:500',
            'star_rate' => 'required',
            'address' => 'required',
            'preview_image' => 'image|nullable',
            'gallery.*' => 'image|nullable',
            'meals' => 'nullable',
            'leisure_activities' => 'nullable',
            'manager_id' => 'required',
            'city_id' => 'required',
            'distance_id' => 'required',
            'type_id' => 'required'
        ];
    }
}