<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandeira extends Model
{
    use HasFactory;
    protected $fillable = ['nome','imagem'];

    public function postos(){
        return $this->hasMany(Posto::class);
    }
}
