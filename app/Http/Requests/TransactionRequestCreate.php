<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequestCreate extends FormRequest
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
            // 'created_at' => 'required',
            'vehicle_number' => 'required',
            'vehicle' =>'required',
            // 'type_material' => 'required',
            'material_id' => 'required',
            'price_material' => 'required',
        ];
    }
}
