<?php 
include 'autoload_namespaces.php';

use classes\IMC;
use classes\Paciente;


$p1 = new Paciente('Joao', 29, '12312354677', 1.76, 87.8);
$calculatorImc = new IMC();

// Calcular IMC
$imc = $calculatorImc->calc($p1);
echo "\nIMC do $p1->nome : $imc\n";

// Mostrar classificação
$clasf = $calculatorImc->classifica($p1);
echo "\nClassificação do $p1->nome: $clasf\n";


