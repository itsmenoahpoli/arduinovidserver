<?php

namespace App\Http\Requests\Videos;

use Illuminate\Foundation\Http\FormRequest;

class CreateVideoRequest extends FormRequest
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
            'title'             => 'string|required',
            'description'       => 'string|required',
            'thumbnail_file'    => 'file|required',
            'video_file'        => 'file|required',
        ];
    }
}
