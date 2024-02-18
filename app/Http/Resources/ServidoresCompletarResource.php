<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServidoresCompletarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $fields = [
            "reducao_carga_horaria_portaria",
            "reducao_carga_vigencia",
            "afastado_temporariamente_portaria",
            "afastado_temporariamente_data_publicacao",
            "afastado_temporariamente_vigencia",
            "aposentado_processo",
            "cedido_decreto_cessao",
            "cedido_processo",
            "cedido_periodo_cessao",
            "permutado_processo",
            "permutado_convenio",
            "readaptado_portaria",
            "readaptado_vigencia"
            ];
    
            $data = [
                "id"=> $this->id,
                "servidor_id" => $this->servidor_id,
                "matricula"=> $this->matricula,
                "gee"=> $this->gee,
                "cargo"=> $this->cargo,
                "funcao"=> $this->funcao,
                "materia_concurso"=> $this->materia_concurso,
                "materia_leciona"=> $this->materia_leciona,
                "escola" => $this->escola,
                "carga_horaria"=> $this->carga_horaria,
                "servidor"=> new ServerResource($this->whenLoaded("servidores")),               
            ];

            foreach ($fields as $field) {
                $data[$field] = $this->filterNotNull($this->$field);
            }

            return $data;
    }
    
    protected function filterNotNull($value)
    {
        return $value !== null ? $value : null;
    }
}
