<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdatePostRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts')->ignore($this->post),
                'image' => ['image', 'mimes:jpg, png']
            ],
            'description' => ['required', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'A title must be at least 3 characters',
            'title.unique' => 'A title must be unique',
            'description.required' => 'A description is required',
            'description.min' => 'A description must be at least 10 characters',
            //'image.required' => 'image is required',
            'image.image' => 'image is not an image',
            'image.mimes' => 'invalid image extensions'
        ];
    }
}
