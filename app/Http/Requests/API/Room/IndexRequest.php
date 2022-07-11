<?php

namespace App\Http\Requests\API\Room;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'meals' => 'nullable|array',
            'prices' => 'nullable|array',
            'features' => 'nullable|array',
            'bed_types' => 'nullable|array',
            'apartment_types' => 'nullable|array',
            'distances' => 'nullable|array',
            'star_rates' => 'nullable|array',
            'leisure_activities' => 'nullable|array',
            'page' => 'required|integer',
        ];
    }
}
