<?php

function string_aleatoria($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function oracao($tamanho = 10) {
    $oracao = '';

    for ($i = 0; $i < $tamanho; $i++) {

        $oracao .= string_aleatoria(rand(2, 10));

        if ((rand(0, 10)) == 8) { // 1 chance em 10
            $oracao .= ',';
        }

        if($i != $tamanho - 1) {
            $oracao .= ' ';
        }

    }

    $oracao .= '.';
    return $oracao;
}

/*
 * Ai usa essa função texto passando quantas frases precisa
 */

function texto($num_oracoes) {
    $texto = '';

    for($i = 0; $i < $num_oracoes; $i++) {
        $texto.= oracao(rand(5, 60));
        if($i != $num_oracoes - 1) {
            $texto .= ' ';
        }
    }

    return $texto;
}
