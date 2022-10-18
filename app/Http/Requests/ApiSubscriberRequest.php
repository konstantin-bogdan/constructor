<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiSubscriberRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'status' => 'new'
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
            'status' => 'required|string'
        ];
    }
}
