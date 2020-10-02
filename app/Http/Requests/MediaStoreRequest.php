<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaStoreRequest extends FormRequest
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
            'name' => 'required',
            'data' => 'required|image|dimensions:max_width=1920,max_height=1920|max:4096'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'data.required' => 'Image is required',
            'data.image' => 'Invalid image',
            'data.dimensions' => 'Image resolution exceed the permitted size',
            'data.max' => 'File size exceeded the permitted size'
        ];
    }
}
