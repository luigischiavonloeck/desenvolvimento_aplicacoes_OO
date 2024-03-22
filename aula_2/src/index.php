<?php
require "../vendor/autoload.php";

use Tsi\Aula2\classes\Medico;
use Tsi\Aula2\classes\Atleta;
use Tsi\Aula2\classes\Logs\Relatorio;

$med1 = new Medico("Dr. House", "123456", "Clínico Geral", 45);
$jog1 = new Atleta("Usain Bolt", 35, 1.95, 90);

$relatorio = new Relatorio();
$relatorio->addPessoa($med1);
$relatorio->addPessoa($jog1);
$relatorio->imprime();

echo $med1->mostrarSal()."\n";
echo $med1->mostrarTempContrato();