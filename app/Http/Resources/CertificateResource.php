<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "process" => $this->process,
            "status" => $this->status,
            "start" => $this->start,
            "end" => $this->end,
            "days_left" => ceil(Carbon::now()->diffInDays($this->end)),
            "user" => new UserResource($this->whenLoaded("user")),
            "server" => new ServerResource($this->whenLoaded("server")),
        ];
    }
}
