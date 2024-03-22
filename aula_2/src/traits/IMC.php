<?php
namespace Tsi\Aula2\traits;

trait IMC {
  protected float | null $imc;

  public function calcImc(){
    $this->imc = $this->peso/(pow($this->altura,2));
  }
  
  public function classifica(){

    $userIdade = $this->idade;
    
    match (true) {
      $userIdade <= 18 => $classifica = 'Menor 18 não se considera na classificação',
      $userIdade <= 24 => $classifica = $this->imcClasf(0),
      $userIdade <= 34 => $classifica = $this->imcClasf(1),
      $userIdade <= 44 => $classifica = $this->imcClasf(2),
      $userIdade <= 54 => $classifica = $this->imcClasf(3),
      $userIdade <= 64 => $classifica = $this->imcClasf(4),
      $userIdade > 65 => $classifica = $this->imcClasf(5),
    };
    
    return $classifica;
    }

    public function imcClasf($var){
      match (true) {
        $this->imc <= $var+18.5 => $result = 'Abaixo do peso',
        $this->imc <= $var+25 => $result = 'Sal',
        $this->imc <= $var+30 => $result = 'Sobre',
        $this->imc > $var+30 => $result = 'Obe',
      };

      return $result;
    }

    public function isNormal(){
      if($this->classifica() == 'Sal'){
        return true;
      } else {
        return false;
      }
    }
}