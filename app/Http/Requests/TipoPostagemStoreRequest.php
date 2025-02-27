<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoPostagemStoreRequest extends FormRequest
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
            'tipo_postagem' => 'required|string', 
            // 'ativo' => 'nullable|boolean',
            'publicado' => 'nullable|boolean',
        ];
    }

    public function valid(): array
    {
        return [
            'tipo_postagem' => $this->request->get('tipo_postagem'),
            // 'ativo' => $this->request->get('ativo'),
            'publicado' => $this->request->get('publicado'),
        ];
    }
}
