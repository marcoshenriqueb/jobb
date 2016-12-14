<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplication extends FormRequest
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
            'name'=>'string|max:255',
            'email'=>'email|max:255',
            'message'=>'string',
            'cv'=>'required|file|mimes:pdf,doc,docx,rtf,odt|max:3000',
            'job_id'=>'required|integer'
        ];
    }
}
