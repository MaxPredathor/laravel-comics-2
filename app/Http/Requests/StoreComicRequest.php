<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            'title'=>'required|min:5|max:255|unique:comics',
            'description'=>'required|max:1000',
            'price'=>'required|numeric',
            'series'=>'required|max:50',
            'sale_date'=>'required|date_format:Y-m-d',
            'type'=>'required|max:50',
        ];
    }
    public function messages(){
        return [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.required' => 'Il titolo è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'series.required' => 'La serie è obbligatoria',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è obbligatoria',
            'type.max' => 'Il tipo deve avere massimo :max caratteri',
            'type.required' => 'Il tipo è obbligatorio',
            'sale_date.date_format' => 'Data non valida',
        ];
    }
}
