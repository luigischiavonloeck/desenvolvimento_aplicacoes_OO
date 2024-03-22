<?php
namespace Tsi\Aula2\classes\Logs;
use Tsi\Aula2\classes\Abstracts\Pessoa;

class Relatorio {
  private $pessoas = [];

  public function addPessoa(Pessoa $pessoa){
    $this->pessoas[] = $pessoa;
  }

  public function log(Pessoa $pessoa){
    echo "\nLog: \n".$pessoa;
    echo "\n--- Fim Log --- \n";
  }

  public function imprime(){
    $log = fopen('log.txt', 'a');
    foreach($this->pessoas as $pessoa){
      fwrite($log, "\nLog: \n".$pessoa);
    }
    fclose($log);
    echo "\n--- Relatorio --- \n";
    foreach($this->pessoas as $pessoa){
      $this->log($pessoa);
    }
    echo "\n--- Fim Relatorio --- \n";
  }
}