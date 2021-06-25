<?php
class Pawn
{
    static function VerificaMovimento($movimento, $tabuleiro, $quemjoga)
    {   //first move
        if ($movimento[0] == 6 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2 || $movimento[0] == 1 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1) {
            //Move
            if ((($movimento[2] - $movimento[0] == -2 || $movimento[2] - $movimento[0] == -1) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2 //cima baixo branco
                    || ($movimento[2] - $movimento[0] == 2 || $movimento[2] - $movimento[0] == 1) && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1) //up/down preto
                && $tabuleiro[$movimento[2]][$movimento[3]][0] == '-' //Ir para lugar vazio
            ) {
                return true;
            } //Comer peça
            else if ($movimento[2] - $movimento[0] == -1 && $tabuleiro[$movimento[2]][$movimento[3]][0] != '-' && $tabuleiro[$movimento[2]][$movimento[3]][1] != 2 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1) || $movimento[2] - $movimento[0] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][0] != '-' && $tabuleiro[$movimento[2]][$movimento[3]][1] != 1 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1)) {
                return true;
            } else {
                return false;
            }
        }
        //other moves
        else {
            //move
            if (($movimento[2] - $movimento[0] == -1 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2 || $movimento[2] - $movimento[0] == 1 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1) && $tabuleiro[$movimento[2]][$movimento[3]][0] == '-') {
                return true;
            } else if ($movimento[2] - $movimento[0] == -1 && $tabuleiro[$movimento[2]][$movimento[3]][0] != '-' && $tabuleiro[$movimento[2]][$movimento[3]][1] != 2 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1) || $movimento[2] - $movimento[0] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][0] != '-' && $tabuleiro[$movimento[2]][$movimento[3]][1] != 1 && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
