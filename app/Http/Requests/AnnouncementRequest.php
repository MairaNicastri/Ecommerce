<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title'=>'required|max:70',
            'description'=>'required',
            'price'=>'required',

            'categoria'=>'required'
        ];
    }
    public function messages(){
        return[
        'title.required'=>'Il titolo ė obbligatorio',
        'description.required'=>'la descrizione ė obbligatoria',
        'price.required'=>'il prezzo ė obbligatorio',

        'categoria.required' =>'devi selezionare una categoria'
        ];
    }
}
