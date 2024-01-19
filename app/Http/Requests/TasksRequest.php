<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->user()?->is_admin) {
            return [
                'user_id' => 'required|exists:users,id',
                'status_id' => 'required|exists:statuses,id',
                'title' => 'required|max:255',
                'description' => 'required|max:2000',
                'image' => 'nullable|image',
                'note' => 'max:2000',
            ];
        } else {
            return [
                'note' => 'max:2000',
            ];
        };
    }
}
