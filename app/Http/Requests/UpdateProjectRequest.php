<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            //Mettere regole
            'name' => ['required',  'min:3', 'max:150'],  //Rule::unique("projects")->ignore($this->route("project")) per fare valere unique.
            'note' => ['max:1000'],
            'project_created_at' => ['required', 'date'],
            'type_id' => ['required'],
            'technologies' => ['required', 'array', 'exists:technologies,id'],
        ];
    }

}
