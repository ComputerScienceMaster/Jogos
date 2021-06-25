<?php
class Rook
{
    static function VerificaMovimento($movimento, $tabuleiro, $quemjoga)
    {
        if ($movimento[0] == $movimento[2]) {
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
        if ($movimento[1] == $movimento[3]) {
            $movimentou = 'cima';
            $retorno = Rook::PecaNoMeio($movimentou, $movimento, $tabuleiro);
            if ($retorno == false) {
                if ($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) || ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1)) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    static function PecaNoMeio($movimentou, $movimento, $tabuleiro)
    {
        $cima = $movimento[0] - $movimento[2];
        $lados = $movimento[1] - $movimento[3];
        if ($movimentou == 'cima') {
            if ($cima < 0) {
                for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                    if ($tabuleiro[$movimento[0] + $i][$movimento[1]][0] != '-') {
                        return true;
                    }
                }
            } else {
                for ($i = 1; $i < abs($movimento[0] - $movimento[2]); $i++) {
                    if ($tabuleiro[$movimento[0] - $i][$movimento[1]][0] != '-') {
                        return true;
                    }
                }
            }
        }
        if ($movimentou == 'lados') {
            if ($lados < 0) {
                for ($i = 1; $i < abs($movimento[1] - $movimento[3]); $i++) {
                    if ($tabuleiro[$movimento[0]][$movimento[1] + $i][0] != '-') {
                        return true;
                    }
                }
            } else {
                for ($i = 1; $i < abs($movimento[1] - $movimento[3]); $i++) {
                    if ($tabuleiro[$movimento[0]][$movimento[1] - $i][0] != '-') {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
