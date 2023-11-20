<?php

namespace App\Http\Requests\Truck;

use Illuminate\Foundation\Http\FormRequest;

class TruckUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit_number' => 'required|max:255|unique:trucks,unit_number,' . $this->truck->id,
            'year'        => 'required|digits:4|integer|min:1900|max:'.(date('Y')+5),
            'notes'       => 'nullable'
        ];
    }
}
