<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        return $request->user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string'],
            'product_description' => ['required', 'min:10', 'max:255'],
            'price' => ['required', 'decimal:2'],
            'image_url' => ['required', 'file', 'mimes:jpg,png,jpeg']
        ];
    }

    public function messages()
    {
        return [
            'image_url.uploaded' => "The image failed to upload"
        ];
    }

    public function attributes()
    {
        return [
            'image_url' => 'image',
        ];
    }
}
