<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = "servidores";
    protected $fillable = [
        'nome',
        'cpf',
        'cid',
        'rg',
        'endereco',
        'email',
        'telefone',
        'matricula_1',
        'carga_horaria_1',
        'matricula_2',
        'carga_horaria_2',
    ];

    public function certificatesServer(){
        return $this->hasMany(Certificate::class);
    }

    public function servidoresCompletar(){
        return $this->hasMany(ServidoresCompletar::class,'servidor_id');
    }
    
}
