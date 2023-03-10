<?php

namespace App\Http\Requests\Api\Trip;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'source' => 'required|string',
            'destination' => 'required|string|unique:trips,destination,NULL,id,source,' . $this->source,
            'stations' => 'nullable|array',
            'stations.*' => 'nullable|string|min:5|max:50'
        ];
    }
}
