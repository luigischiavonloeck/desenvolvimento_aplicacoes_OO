<?php
namespace Tsi\Aula2\classes;

use Tsi\Aula2\classes\Abstracts\Pessoa;
use Tsi\Aula2\interfaces\iFuncionario;

class Medico extends Pessoa implements iFuncionario {
    private $crm, $especialidade;

    public function __construct($nome, $crm,$especialidade,$idade=null)
	{
		$this->nome = $nome;
		$this->crm = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
	}

	public function getCRM(){
		return $this->crm;
	}

    public function mostrarSal(): string{
			return "Salario: R$ 10.000,00";
    }

    public function mostrarTempContrato(): string{
      return "Tempo de contrato: 40 horas semanais";
    }


	public function __toString(){
		$string = "Nome: $this->nome\n
        Idade: $this->idade\n
        CRM: $this->crm\n
        Especialidade: $this->especialidade\n
        ";
		return $string;
	}
}
