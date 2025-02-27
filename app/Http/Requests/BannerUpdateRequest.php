<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdateRequest extends FormRequest
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
            'titulo' => 'required|string', 
            'subtitulo' => 'required|string', 
            'link' => 'required|string', 
            'link_name' => 'required|string', 
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipo' => 'required|string', 
            'order' => 'required|integer', 
            'data_inicio' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'data_termino' => 'required|date|after_or_equal:data_inicio',
            'hora_termino' => 'required|date_format:H:i', 
            'publicado' => 'nullable|boolean',
        ];
    }

    public function valid(): array
    {
        return [
            'id' => $this->request->get('id'),
            'titulo' => $this->request->get('titulo'),
            'subtitulo' => $this->request->get('subtitulo'),
            'link' => $this->request->get('link'),
            'link_name' => $this->request->get('link_name'),
            'tipo' => $this->request->get('tipo'),
            'order' => $this->request->get('order'),
            'data_inicio' => $this->request->get('data_inicio'),
            'hora_inicio' => $this->request->get('hora_inicio'),
            'data_termino' => $this->request->get('data_termino'),
            'hora_termino' => $this->request->get('hora_termino'),
            'publicado' => $this->request->get('publicado', 0),
        ];
    }
}
