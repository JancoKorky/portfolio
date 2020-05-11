<?php

namespace App\Http\Requests;

use http\Message;
use Illuminate\Foundation\Http\FormRequest;

class SaveImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'images' => 'required',
            'images.*' => 'mimes:jpeg,png,bmp,gif|max:5120'
        ];
    }

    public function messages()
    {
        $messages = [];
        if ($this->file('images'))
        foreach ($this->file('images') as $key => $val){
            $messages["images.$key.mimes"] = "Všetky súbory musia byť typu: :values";
        }
        return $messages;
    }
}
