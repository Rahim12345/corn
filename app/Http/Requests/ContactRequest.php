<?php

namespace App\Http\Requests;

use App\Models\Contact;
use GuzzleHttp\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'nullable|max:30',
            'email' => 'required|email',
            'subject' => 'nullable|max:10000',
            'message' => 'required|max:10000'
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('menu.name'),
            'email' => __('menu.email'),
            'subject' => __('menu.subject'),
            'message' => __('menu.message')
        ];
    }
}
