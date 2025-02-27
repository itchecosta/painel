<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CorpoClinicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'curriculo' => $this->curriculo,
            'foto' => $this->foto,
            'link' => $this->link,
            'link_name' => $this->link_name,
            'contato_1' => $this->contato_1,
            'contato_wpp' => $this->contato_wpp,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'ativo' => $this->ativo,
            'publicado' => $this->publicado,
            'created_at' => $this->created_at,
            'especialidades' => new EspecialidadeResource($this
        ];
    }
}
