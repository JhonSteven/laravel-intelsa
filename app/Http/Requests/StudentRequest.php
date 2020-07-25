<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST':
                return [
                    "names" => "required|string|min:4",
                    "surnames" => "required|string|min:4",
                    "identification_number" => "required|string|min:6",
                    "date_of_birth" => "required|date|date_format:Y-m-d",
                    "identification_type_id" => "required|integer|exists:identification_types,id",
                    "genre_id" => "required|integer|exists:genres,id",
                    "career_id" => "required|integer|exists:careers,id",
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    "names" => "nullable|string|min:4",
                    "surnames" => "nullable|string|min:4",
                    "identification_number" => "nullable|string|min:6",
                    "date_of_birth" => "nullable|date|date_format:Y-m-d",
                    "identification_type_id" => "nullable|integer|exists:identification_types,id",
                    "genre_id" => "nullable|integer|exists:genres,id",
                    "career_id" => "nullable|integer|exists:careers,id",
                ];
            default:break;
        }
    }
}
