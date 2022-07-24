<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'name' => 'required',
            'hp' => 'required',
            'address' => 'required',
            'total' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
            'berat' => 'required',
            'jumlah' => 'required',
            'description' => 'required',
        ];
    }
}
