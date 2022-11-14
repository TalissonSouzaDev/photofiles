<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotofileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
        'titulo'=>'required|min:3|max:100',
        'autor'=>'required|min:3|max:100',
        'imagem'=>"required|file|mimes:png,jpg,jpeg",
        'descricao'=>'required|min:3|max:300'
        ];
    }

    public function messages(){
        return[
            'required'=>'Campo Obrigatorio',
            'min'=>'o minimo de caractes é 3 ',
            'max'=>'ops, atingiu o maximo de caracters',
            'mimes'=> 'Ops, formatado não permitido apenas suporta png,jpg,jpeg'

        ];
    }
}
