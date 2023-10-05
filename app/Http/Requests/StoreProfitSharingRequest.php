<?php

namespace App\Http\Requests;

use App\Incomestatement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfitSharingRequest extends FormRequest
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
            "incomestatement_id" => ["required", Rule::exists(Incomestatement::class, "id")],
            "title" => ["required", "string"],
            "descriptions" => ["required", "string"]
        ];
    }
}
