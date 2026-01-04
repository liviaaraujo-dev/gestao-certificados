<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'activities' => 'required|array|min:1',
            'activities.*' => 'required|string|max:255',
        ];
    }

    /**
     * Optional: Custom error messages
     * @return array
     */
    public function messages(): array
    {
        return [
            'student_id.required' => 'O estudante é obrigatório.',
            'student_id.exists' => 'O estudante selecionado não existe.',
            'activities.required' => 'Você precisa adicionar pelo menos uma atividade.',
            'activities.array' => 'Atividades devem estar em formato de lista.',
            'activities.min' => 'Adicione pelo menos uma atividade.',
            'activities.*.required' => 'O título da atividade não pode estar vazio.',
            'activities.*.string' => 'O título da atividade deve ser um texto.',
            'activities.*.max' => 'O título da atividade não pode ter mais de 255 caracteres.',
        ];
    }
}
