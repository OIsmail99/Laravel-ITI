<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OnlyThree;

class StorePostRequest extends FormRequest
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
        if ($this->is('api/*')) {
            return [
                'title' => ['required', 'min:3', 'unique:posts', new OnlyThree],
                'description' => ['required', 'min:10'],
                'image' => ['nullable', 'image', 'mimes:jpg,png'],
            ];
        }
        return [
            'title' => ['required', 'min:3', 'unique:posts', new OnlyThree],
            'description' => ['required', 'min:10'],
            'image' => ['required', 'image', 'mimes:jpg, png'],
        ];

    }
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title must be at least 3 characters',
            'title.unique' => 'Title must be unique',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 5 characters',
            'image.mimes' => 'invalid image extension'
        ];
    }
}
