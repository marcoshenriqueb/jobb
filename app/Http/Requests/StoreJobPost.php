<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobPost extends FormRequest
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
            'title'=>'required|string|max:255',
            'type'=>'required|integer',
            'category'=>'required|integer',
            'city'=>'required|integer',
            'summary'=>'string|max:255',
            'description'=>'required|string',
            'company'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'url'=>'url|max:255',
        ];
    }
}
