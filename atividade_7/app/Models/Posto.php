Novidade! Atalhos do teclado … Os atalhos de teclado do Drive foram atualizados para oferecer navegação por letras iniciais
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    use HasFactory;
    protected $table = 'postos';
    protected $fillable = ['nome','cnpj','endereco','cep','cidade','cordX','cordY','bandeira_id'];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }

    public function bandeira(){
        return $this->belongsTo(Bandeira::class);
    }
}