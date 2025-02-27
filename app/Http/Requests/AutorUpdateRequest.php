<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorUpdateRequest extends FormRequest
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
            'id' => 'required|integer', 
            'autor' => 'required|string', 
            'perfil' => 'required|string', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email', 
            // 'ativo' => 'nullable|boolean',
            'publicado' => 'nullable|boolean',
        ];
    }

    public function valid(): array
    {
        return [
            'id' => $this->request->get('id'),
            'autor' => $this->request->get('autor'),
            'perfil' => $this->request->get('perfil'),
            'email' => $this->request->get('email'),
            // 'ativo' => $this->request->get('ativo'),
            'publicado' => $this->request->get('publicado'),
           
        ];
    }
}
