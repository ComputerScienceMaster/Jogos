<?php
class Knight
{
    static function VerificaMovimento($movimento, $tabuleiro, $quemjoga)
    {
        //checar esquerda 2 e 1 cima
        //checar esquerda 2 e 1 baixo

        //checar direita 2 e 1 cima
        //checar direita 2 e 1 baixo
        if ((($movimento[1] - $movimento[3] == 2 || $movimento[1] - $movimento[3] == -2) && ($movimento[2] - $movimento[0] == 1 || $movimento[2] - $movimento[0] == -1))
            && ((($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1) || (($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || $tabuleiro[$movimento[2]][$movimento[3]][1] == 1) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2))
        ) {
            return true;
        }
        //checar cima 2 e 1 direita
        //checar cima 2 e 1 esquerda

        //checar baixo 2 e 1 direita
        //checar baixo 2 e 1 esquerda
        if ((($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1) && ($movimento[2] - $movimento[0] == 2 || $movimento[2] - $movimento[0] == -2))
            && ((($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1) || (($tabuleiro[$movimento[2]][$movimento[3]][0] == '-' || $tabuleiro[$movimento[2]][$movimento[3]][1] == 1) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2))
        ) {
            return true;
        }
    }
}
