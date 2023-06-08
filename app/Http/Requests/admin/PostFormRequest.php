<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules= [
            'category_id'=>[
                'required',
                'integer'
            
            ],
            'name'=>[
                'required',
                'string'
        
            ],


            'slug'=>[
                'required',
                'string'
            
            ],

            'description'=>[
                'required',
                'string'
               
            ],

            
            'y_iframe'=>[
                'nullable',
                'string'
               
            ],

            
            'meta_title'=>[
                'nullable',
                'string',
                'max:200'
               
            ],

            'meta_description'=>[
                'nullable',
                'string'
            
               
            ],

            'meta_keyword'=>[
                'nullable',
                'string'
            
               
            ],

            
            'status'=>[
                'nullable',
            
               
            ],
        ];
        return $rules;
    }
}
