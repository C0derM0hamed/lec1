<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('posts', 'title'),
            ],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }

    public function messages():array{
        return [
            'title.required' => 'The title field is required.',
            'title.unique' => 'The title must be unique.',
            'title.min' => 'The title must be at least 3 characters.',
            'content.required' => 'The content field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image must not exceed 2MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
        ];
    }
}
