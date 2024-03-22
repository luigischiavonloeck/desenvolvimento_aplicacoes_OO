<?php 
namespace classes;

class IMC {

    public static function calc(Paciente $paciente){
        return $paciente->peso/(pow($paciente->altura,2));
    }

    public static function imcClasf($imc,$var){
        match (true) {
            $imc <= $var+18.5 => $result = 'Abaixo do peso',
            $imc <= $var+25 => $result = 'Sal',
            $imc <= $var+30 => $result = 'Sobre',
            $imc > $var+30 => $result = 'Obe',
        };

        return $result;
    }

    public static function classifica(Paciente $paciente){
        $userImc = self::calc($paciente);
        $userIdade = $paciente->idade;

        match (true) {
            $userIdade <= 18 => $classifica = 'Menor 18 não se considera na classificação',
            $userIdade <= 24 => $classifica = self::imcClasf($userImc,0),
            $userIdade <= 34 => $classifica = self::imcClasf($userImc,1),
            $userIdade <= 44 => $classifica = self::imcClasf($userImc,2),
            $userIdade <= 54 => $classifica = self::imcClasf($userImc,3),
            $userIdade <= 64 => $classifica = self::imcClasf($userImc,4),
            $userIdade > 65 => $classifica = self::imcClasf($userImc,5),
        };

        return $classifica;
    }
}