<?php 
namespace Tsi\Aula2\classes;

use Tsi\Aula2\classes\Abstracts\Pessoa;
use Tsi\Aula2\traits\IMC;

class Atleta extends Pessoa {

    use IMC;
    public $altura, $peso;
    
    public function __construct($nome, $idade, $altura, $peso) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->calcImc();
    }

    public function setAltura($altura){
		$this->altura = $altura;
		$this->calcImc();
	}

	public function setPeso($peso){
		$this->peso = $peso;
		$this->calcImc();
	}

    public function getImc(){
        return $this->imc;
    }

    public function __set($name, $value){
        $this->$name = $value;
        $this->calcImc();
    }

    public function __toString(){
		$string = "Nome: $this->nome\n
        Idade: $this->idade\n
        Altura: $this->altura\n
        Peso: $this->peso\n
        IMC: $this->imc\n
        Classificação: ".$this->classifica()."\n";
		return $string;
	}
}

