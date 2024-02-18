<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServidoresCompletar extends Model
{
    use HasFactory;

    protected $table = "servidores_complementar";

    protected $fillable = [
        "servidor_id",
        "matricula",
        "gee",
        "cargo",
        "funcao",
        "escola",
        "materia_concurso",
        "materia_leciona",
        "carga_horaria",
    ] ;

    public function servidores(){
        return $this->belongsTo(Server::class,"servidor_id");
    }
}
