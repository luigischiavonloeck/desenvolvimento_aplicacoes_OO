<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome','email','cpf','cidade','cep'];

    public function postos(){
        return $this->belongsToMany(Posto::class);
    }
}
