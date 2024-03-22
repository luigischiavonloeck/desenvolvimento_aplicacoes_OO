<?php 
namespace Tsi\Aula2\classes;

class Pessoa {
    public $nome, $idade, $cpf, $altura, $peso;

    public function __construct($nome, $idade, $cpf, $altura, $peso) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->altura = $altura;
        $this->peso = $peso;
    }

    public function __destruct() {
        print_r("$this->nome foi deletado");
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setIdade($idade) {
        $this->idade = $idade;
    }
    public function getIdade() {
        return $this->idade;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setAltura($altura) {
        $this->altura = $altura;
    }
    public function getAltura() {
        return $this->altura;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }
    public function getPeso() {
        return $this->peso;
    }
    public function __get($name){
		return $this->$name;
	}
    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString(){
        return "\n-----Dados------"
		 		."\nNome: $this->nome"
				.($this->idade?"\nIdade: $this->idade":"")
                ."\nCPF: $this->cpf"
				."\nPeso: $this->peso"
				."\nAltura: $this->altura";

    }
}
