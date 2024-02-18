<?php

namespace App\Http\Resources;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "cpf" => $this->cpf,
            "cid" => $this->cid,
            "rg" => $this->rg,
            "endereco" => $this->endereco,
            "email" => $this->email,
            "telefone" => $this->telefone,
            "matricula_1" => $this->matricula_1,
            "carga_horaria_1" => $this->carga_horaria_1,
            "matricula_2" => $this->matricula_2,
            "carga_horaria_2" => $this->carga_horaria_2,
            "lotacao" => ServidoresCompletarResource::collection($this->whenLoaded("servidoresCompletar")),
            "certificates" => CertificateResource::collection($this->whenLoaded("certificatesServer")),

        ];
    }
}
