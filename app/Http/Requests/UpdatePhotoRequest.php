<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'description' => 'nullable',
            'image' => 'nullable|image|max:1300',
            'in_evidence' => 'nullable',
            'is_published' => 'nullable',
        ];
    }
}
