<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'process',
        'status',
        'start',
        'end',
        'user_id',
        'server_id'
    ];

    public function server(){
        return $this->belongsTo(Server::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
