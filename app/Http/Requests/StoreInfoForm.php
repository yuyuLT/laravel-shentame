<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoForm extends FormRequest
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
            'title' => 'required',
            'link' => 'required|url|starts_with:https://www.youtube.com/watch',
            'thought' => 'required'
        ];
        
    }
    
    public function messages()
    {
        return  [
        'link.starts_with' => '正しい形式のURLを貼り付けてください'];
    }

}
