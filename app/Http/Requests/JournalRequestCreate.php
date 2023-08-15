<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class JournalRequestCreate extends FormRequest
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
        $rules =  [
            'register' => 'required',
            'title' => 'required',
            'description' => 'required',  
        ];

        foreach($this->request->get('accounts') as $key => $val)
        {
         
            $rules['accounts'.$key] = 'required';
          
        }

        foreach($this->request->get('types') as $key => $val)
        {
         
            $rules['types'.$key] =[
                'required',
                // Rule::in(['debit', 'credit']),
            ];
          
        }
        
            // foreach($this->request->get('amount') as $key => $val)
            // {
            // $rules['amount.'.$key] ='required';
            // }

        return $rules;
    }
}
