<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'checkin_at'=>['required','date','after_or_equal:today'],
            'checkout_at'=>['required','date','after:checkin_at'],
            'observations'=>['max:255']
        ];
    }

    public function messages()
    {
        return[
            'checkin_at.required'=>'Trebuie sa selectati data de inceput',
            'checkout_at.required'=>'Trebuie sa selectati data de final',

            'checkin_at.date'=>'Trebuie sa selectati o data caledaristica de inceput',
            'checkout_at.date'=>'Trebuie sa selectati o data caledaristica de final',

            'checkin_at.after'=>'Data selectata trebuie sa fie ulterioara datei curente',
            'checkout_at.after'=>'Data de final trebuie sa fie ulterioara datei de inceput',
        ];
    }
}
