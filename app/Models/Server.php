<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'cid',
        'workload',
        'email',
        'phone',
        'cep',
        'place',
        'number',
        'neighborhood',
        'county',
        'uf',
        'complement',
    ];

    public function certificatesServer(){
        return $this->hasMany(Certificate::class);
    }
    
}
