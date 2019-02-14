<?php

namespace App\Http\Requests\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'type_id'       => ['required', 'numeric'],
            'state_id'      => ['required', 'numeric'],
            'city_id'       => ['required', 'numeric'],
            'name'          => ['required'],
            'school_name'   => ['required'],
            'reason'        => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'type_id.required'  => 'O tipo é obrigatório.',
            'type_id.numeric'   => 'O tipo escolhido é inválido.',
            'state_id.required' => 'O estado é obrigatório.',
            'state_id.numeric'  => 'O estado escolhido é inválido.',
            'city_id.required'  => 'A cidade é obrigatória.',
            'city_id.numeric'   => 'O cidade escolhida é inválida.',
            'name.required'     => 'O nome é obrigatório.',
            'school_name.required' => 'O nome da escola é obrigatório.',
            'reason.required'   => 'O motivo é obrigatório.',
        ];
    }
}
