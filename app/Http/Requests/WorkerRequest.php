<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'position' => 'required',
            'hire_at' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'salary' => 'required',
        ];
    }
}
