<?php

namespace App\Http\Requests\Student;

use App\Rules\ValidCpf;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'cpf' => [
                'required',
                new ValidCpf,
                'unique:students,cpf',
            ],

        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do estudante é obrigatório.',
            'name.min'      => 'O nome precisa ter pelo menos 3 caracteres.',
            'name.max'      => 'O nome pode ter no máximo 255 caracteres.',
            'cpf.required'  => 'O CPF é obrigatório.',
            'cpf.unique'    => 'Este CPF já está cadastrado.',
        ];
    }
}
