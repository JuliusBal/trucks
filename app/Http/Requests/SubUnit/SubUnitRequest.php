<?php

namespace App\Http\Requests\SubUnit;

use Illuminate\Foundation\Http\FormRequest;

class SubUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_truck' => 'required|integer',
            'subunit'    => 'required|integer',
            'start_date' => 'required|date|after:yesterday',
            'end_date'   => 'required|date|after:start_date'
        ];
    }
}
