<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'titulo' => 'required|string', 
            'texto' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'data_publicacao' => 'required|date',
            'fonte' => 'required|string',  
            'tipo_postagem_id' => 'required|integer',  
            'autor_id' => 'nullable|integer',  
            'categoria_id' => 'required|string',  
            // 'ativo' => 'nullable|boolean',
            'publicado' => 'nullable|boolean',
        ];
    }

    public function valid(): array
    {
        return [
            'titulo' => $this->request->get('titulo'),
            'texto' => $this->request->get('texto'),
            'data_publicacao' => $this->request->get('data_publicacao'),
            'fonte' => $this->request->get('fonte'),
            'tipo_postagem_id' => $this->request->get('tipo_postagem_id'),
            'autor_id' => $this->request->get('autor_id'),
            'categoria_id' => $this->request->get('categoria_id'),
            // 'ativo' => $this->request->get('ativo'),
            'publicado' => $this->request->get('publicado'),
        ];
    }
}
