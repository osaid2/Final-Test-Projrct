<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThesisRequest extends FormRequest
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
            'title' => ['required','max:50'],
            'description' => 'nullable',
            'date' => ['nullable','date','date-format:Y-m-d'],
            'category_id' => ['required','exists:categories,id'],
            'student_id' => ['nullable','exists:students,id'],
            // 'active' => ['nullable'],
            'Supervisors_id' => ['nullable','exists:students,id'],
        ];
    }
}
