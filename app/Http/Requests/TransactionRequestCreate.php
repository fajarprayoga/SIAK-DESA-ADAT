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
            'material_id.*' => 'required',
            'price_material.*' => 'required',
            // 'cost_of_goods' => 'required',
            'quantity.*' => 'required',
            'date' => 'date|required',
            'discount.*' => 'numeric',
        ];
    }
}
