<?php

namespace App\Http\Requests;


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
        $postId = $this->route('id');

        return [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts', 'title')->ignore($postId),
            ],
            'content' => ['required','min:10'],
        ];
    }

    public function messages():array{
        return [
            'title.required' => 'The title field is required.',
            'title.unique' => 'The title must be unique.',
            'title.min' => 'The title must be at least 3 characters.',
            'content.required' => 'The content field is required.',
        ];
    }
}
