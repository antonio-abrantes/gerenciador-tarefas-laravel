<?php

namespace App\Http\Requests;

use App\Rules\Dash;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=> ['required', 'max:100', 'min:5', new Dash],
            'email'=>['required', 'email', 'unique:clients'],
            'age'=>['required', 'integer'],
            'photo'=>['required','mimes:jpeg,jpg,bmp,png']
        ];
    }


    public function withValidator($validator){
        $validator->after(function ($validator){
            if(strpos($this->name, '-')){
                $validator->errors()->add('name', 'O campo não pode ter -');
            }
        });
    }


    public function messages()
    {
        return [
          'name.required'=>'O campo nome deve ser preenchido!'
        ];
    }
}
