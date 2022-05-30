<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'deadline' => ['required', 'date'],
            'task_status' => 'required',
            'user_id' => 'required',
            'client_id' => 'required',
            'project_id' => 'required'
        ];
    }
}
