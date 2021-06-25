<?php
require_once 'functions.php';
function testeCavaloCima()
{
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', '-', '-', 'k1', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', 'x2', '-', '-', 'x1', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return = check($tabuleiro, 'white');
    if ($return[1] == true) {
        echo 'passou no teste cima direita<br>';
    } else {
        echo 'falhou no teste cima direita<br>';
    }
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', 'k2', '-', '-', 'x2',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', 'x1', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return2 = check($tabuleiro, 'black');
    if ($return2[1] == true) {
        echo 'passou no teste cima esquerda<br>';
    } else {
        echo 'falhou no teste cima esquerda<br>';
    }
}
function testeCavaloBaixo()
{
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', 'x1', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', '-', 'x2', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', '-', '-', 'k1', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return = check($tabuleiro, 'white');
    if ($return[1] == true) {
        echo 'passou no teste baixo esquerda<br>';
    } else {
        echo 'falhou no teste baixo esquerda<br>';
    }
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', 'x2', '-', '-', 'x1', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', '-', '-', 'k1', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return2 = check($tabuleiro, 'white');
    if ($return2[1] == true) {
        echo 'passou no teste baixo direita<br>';
    } else {
        echo 'falhou no teste baixo direita<br>';
    }
}
function testeCavaloEsquerda()
{
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', 'x1', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', 'x2', '-'];
    $linha6 = ['-', '-', '-', '-', 'k1', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return = check($tabuleiro, 'white');
    if ($return[1] == true) {
        echo 'passou no teste esquerda cima<br>';
    } else {
        echo 'falhou no teste esquerda cima<br>';
    }
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', 'x1', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', '-', '-', 'k1', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', 'x2', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return2 = check($tabuleiro, 'white');
    if ($return2[1] == true) {
        echo 'passou no teste esquerda baixo<br>';
    } else {
        echo 'falhou no teste esquerda baixo<br>';
    }
}
function testeCavaloDireita()
{
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', '-', 'k1', '-', '-', '-'];
    $linha5 = ['-', '-', 'x2', '-', '-', '-', '-', '-'];
    $linha6 = ['-', '-', '-', '-', '-', '-',  '-', 'x1'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return = check($tabuleiro, 'white');
    if ($return[1] == true) {
        echo 'passou no teste direita cima <br>';
    } else {
        echo 'falhou no teste direita cima<br>';
    }
    $linha1 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha2 = ['-', '-', '-', '-', '-', '-', '-', 'x2'];
    $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha4 = ['-', '-', '-', 'x1', '-', '-', '-', '-'];
    $linha5 = ['-', '-', '-', '-', '-', 'k2', '-', '-'];
    $linha6 = ['-', '-', '-', '-', '', '-',  '-', '-'];
    $linha7 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $linha8 = ['-', '-', '-', '-', '-', '-', '-', '-'];
    $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
    $return2 = check($tabuleiro, 'white');
    if ($return2[1] == true) {
        echo 'passou no teste direita baixo <br>';
    } else {
        echo 'falhou no teste direita baixo<br>';
    }
}
testeCavaloDireita();
testeCavaloEsquerda();
testeCavaloBaixo();
testeCavaloCima();
