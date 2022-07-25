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
            'hp' => 'required'|'min:10'|'max:13',
            'address' => 'required',
            'total' => 'required',
            'bayar' => 'required',
            'selisih' => 'required',
            'package_name' => 'required',
            'package_price' => 'required',
            'berat' => 'required',
            'jumlah' => 'required',
            'description' => 'required'|'min:10',
        ];
    }
}
