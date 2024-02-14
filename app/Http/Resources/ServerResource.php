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
            "name" => $this->name,
            "cpf" => $this->cpf,
            "cid" => $this->cid,
            "registration" => $this->registration,
            "wordload" => $this->workload,
            "email" => $this->email,
            "phone" => $this->phone,
            "cep" => $this->cep,
            "place" => $this->place,
            "number" => $this->number,
            "neighborhood" => $this->neighborhood,
            "county" => $this->county,
            "uf" => $this->uf,
            "complement" => $this->complement,
            "certificates" => CertificateResource::collection($this->whenLoaded("certificatesServer")),
        ];
    }
}
