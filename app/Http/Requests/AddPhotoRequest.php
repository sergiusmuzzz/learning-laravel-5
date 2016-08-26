<?php

namespace App\Http\Requests;

use App\Tour;
use App\Http\Requests\Request;

class AddPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Tour::where([
            'title' => $this->title,
            'user_id' => $this->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'photo' => 'required|mimes:jpg, jpeg, png, bpm'
        ];
    }
}
