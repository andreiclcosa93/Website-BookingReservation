<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomAddRequest extends FormRequest
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
            'name'=>['required','max:100'],
            'number'=>['required','integer'],
            // 'description'=>['max:3000'],
            'position'=>'required|integer',
            'photo'=>'nullable|image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'name.max'=>'Numarul de caractere permis este de maxim 100 caractere',
            'description.max'=>'Numarul de caractere permis este de maxim 3000 caractere',
            'photo.max'=>'Imaginea camerei nu poate avea mai mult de 1 MB'
        ];
    }
}
