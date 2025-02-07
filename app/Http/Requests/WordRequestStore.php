<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequestStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'word'      => ['required', 'string', 'min:2'],
            'arabic'    => ['required', 'string', 'min:2'],
            'example'   => ['required', 'array', 'min:1'],
            'example.*' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'word.required'      => 'please enter word',
            'word.string'        => 'please enter string',
            'word.min'           => 'please enter more than 2 character',
            'arabic.required'    => 'please enter arabic',
            'arabic.string'      => 'please enter string',
            'arabic.min'         => 'please enter more than 2 character',
            'example.required'   => 'please enter example',
            'example.array'      => 'please enter array',
            'example.min'        => 'please enter more than 1 example',
            'example.*.required' => 'please enter example',
            'example.*.string'   => 'please enter string',
        ];
    }
}
