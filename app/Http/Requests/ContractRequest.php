<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
     * @return array<string, mixed>
     */
     public function rules()
    {
        return [
            'contactNo' => 'required|unique:contracts,contactNo,'.$this->id,

        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => 'رقم سجل العقد موجود مسبقا',

        ];
    }
}
