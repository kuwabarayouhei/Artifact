<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'theft_car.title' => 'required|string|max:100',
            'theft_car.model' => 'required|string|max:50',
            'theft_car.number' => 'required|string|max:50',
            'theft_car.color' => 'required|string|max:50',
            'theft_car.location' => 'required|string|max:100',
            'theft_car.time' => 'required|string|max:50',
            'theft_car.situation' => 'required|string|max:200',
            'theft_car.information' => 'required|string|max:200',
        ];
    }
}
