<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHaqqimizdaRequest extends FormRequest
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
            'src'=>'nullable|max:2048',
            'name_az'=>'nullable|max:255',
            'name_en'=>'nullable|max:255',
            'name_ru'=>'nullable|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Photo',
            'name_az'=>'Name(AZ)',
            'name_en'=>'Name(EN)',
            'name_ru'=>'Name(RU)',
        ];
    }
}
