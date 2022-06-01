<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'intro_az'=>'nullable|max:60000',
            'intro_en'=>'nullable|max:60000',
            'intro_ru'=>'nullable|max:60000',
            'text_az'=>'nullable|max:60000',
            'text_en'=>'nullable|max:60000',
            'text_ru'=>'nullable|max:60000',
            'pdf'=>'nullable|max:30000',
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Cover',
            'intro_az'=>'Intro(AZ)',
            'intro_en'=>'Intro(EN)',
            'intro_ru'=>'Intro(RU)',
            'text_az'=>'Text(AZ)',
            'text_en'=>'Text(EN)',
            'text_ru'=>'Text(RU)',
            'pdf'=>'PDF',
        ];
    }
}
