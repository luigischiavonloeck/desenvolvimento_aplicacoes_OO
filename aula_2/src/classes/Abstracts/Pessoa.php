<?php
namespace Tsi\Aula2\classes\Abstracts;

abstract class Pessoa{
  public $nome, $idade;

  public abstract function __toString(): string;

  public function __destruct(){
    echo "\n ($this->nome)Objeto destruido";
  }

  public function __get($name){
    return $this->$name;
  }
}
