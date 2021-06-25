<?php
class Queen
{
    static function VerificaMovimento($movimento, $tabuleiro, $quemjoga)
    {

        // cima direita
        if ($movimento[1] - $movimento[3] < 0 && $movimento[0] - $movimento[2] == abs($movimento[1] - $movimento[3])) {
            echo 'cima direita';
            $movimentou = 'cimaDireita';
            $retorno = Bishop::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        //baixo direita
        if ($movimento[0] - $movimento[2] < 0 && $movimento[1] - $movimento[3] < 0 && abs($movimento[0] - $movimento[2]) == abs($movimento[1] - $movimento[3])) {
            echo 'baixo direita';
            $movimentou = 'baixoDireita';
            $retorno = Bishop::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        //cima esquerda
        if ($movimento[0] - $movimento[2] == $movimento[1] - $movimento[3]) {
            echo 'cima esquerda';
            $movimentou = 'cimaEsquerda';
            $retorno = Bishop::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        //baixo esquerda
        if ($movimento[0] - $movimento[2] < 0 && abs($movimento[0] - $movimento[2]) == $movimento[1] - $movimento[3]) {
            echo 'baixo esquerda';
            $movimentou = 'baixoEsquerda';
            $retorno = Bishop::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        // lado
        if ($movimento[0] == $movimento[2]) {
            echo 'lados';
            $movimentou = 'lados';
            $retorno = Rook::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        //cima
        if ($movimento[1] == $movimento[3]) {
            echo 'cima';
            $movimentou = 'cima';
            $retorno = Rook::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        }
        return false;
    }
    static function PecaNoMeio($movimentou, $movimento, $tabuleiro)
    {
        $cima = $movimento[0] - $movimento[2];
        $lados = $movimento[1] - $movimento[3];
        //cima
        if ($movimentou == 'cima') {
            if ($cima < 0) {
                echo 'cima';
                for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                    if ($tabuleiro[$movimento[0] + $i][$movimento[1]][0] != '-') {
                        return true;
                    }
                }
                //baixo
            } else {
                echo 'baixo';
                for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                    if ($tabuleiro[$movimento[0] - $i][$movimento[1]][0] != '-') {
                        return true;
                    }
                }
            }
        }
        //direita
        if ($movimentou == 'lados') {
            echo 'direita';
            if ($lados < 0) {
                for ($i = 1; $i < abs($movimento[1] - $movimento[3]); $i++) {
                    if ($tabuleiro[$movimento[0]][$movimento[1] + $i][0] != '-') {
                        return true;
                    }
                }
            } //esquerda
            else {
                echo 'esquerda';
                for ($i = 1; $i < abs($movimento[1] - $movimento[3]); $i++) {
                    if ($tabuleiro[$movimento[0]][$movimento[1] - $i][0] != '-') {
                        return true;
                    }
                }
            }
        }
        if ($movimentou == 'cimaDireita') {
            echo 'cima direita';
            for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                if ($tabuleiro[$movimento[0] - $i][$movimento[1] + $i][0] != '-') {
                    return true;
                }
            }
        }
        if ($movimentou == 'cimaEsquerda') {
            echo 'cima esquerda';
            for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                if ($tabuleiro[$movimento[0] - $i][$movimento[1] - $i][0] != '-') {
                    return true;
                }
            }
        }
        if ($movimentou == 'baixoDireita') {
            echo 'baixo direita';
            for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                if ($tabuleiro[$movimento[0] + $i][$movimento[1] + $i][0] != '-') {
                    return true;
                }
            }
        }
        if ($movimentou == 'baixoEsquerda') {
            echo 'baixo esquerda';
            for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                if ($tabuleiro[$movimento[0] + $i][$movimento[1] - $i][0] != '-') {
                    return true;
                }
            }
        }
        return false;
    }
}
