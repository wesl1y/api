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
        $totalDays = Carbon::parse($this->start)->diffInDays(
            Carbon::parse($this->end)
        );

        $days_left = ceil(Carbon::now()->diffInDays($this->end));
        $message = null;
        if( $days_left ==0){
                $message = "Alert: The certificate ends today!";
        }
        
        return [
            "id" => $this->id,
            "process" => $this->process,
            "status" => $this->status,
            "start" => $this->start,
            "end" => $this->end,
            "total_days" => $totalDays,
            "days_left" => ceil(Carbon::now()->diffInDays($this->end)),
            "message" => $message,
            "user" => new UserResource($this->whenLoaded("user")),
            "server" => new ServerResource($this->whenLoaded("server")),
        ];
    }
}
