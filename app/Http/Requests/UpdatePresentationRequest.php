<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePresentationRequest extends FormRequest
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
            'text_az'=>'nullable|max:255',
            'text_en'=>'nullable|max:255',
            'text_ru'=>'nullable|max:255',
            'pdf'=>'nullable|max:30000',
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Cover',
            'text_az'=>'Name(AZ)',
            'text_en'=>'Name(EN)',
            'text_ru'=>'Name(RU)',
            'pdf'=>'PDF',
        ];
    }
}
