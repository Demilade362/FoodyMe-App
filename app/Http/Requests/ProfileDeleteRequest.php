<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $user = User::find($request->user()->id);
        return $user->id == $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password_delete' => ['required', 'current_password']
        ];
    }

    public function messages()
    {
        return [
            'password_delete.required' => 'Password field is required to delete account'
        ];
    }
}
