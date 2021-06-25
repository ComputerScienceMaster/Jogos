<?php
class King
{
    static function VerificaMovimento($movimento, $tabuleiro, $quemjoga)
    {
        // Move
        if (((($movimento[2] - $movimento[0] == 1 || $movimento[2] - $movimento[0] == -1) //cima baixo
                || ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1)) //lados
                || ($movimento[2] - $movimento[0] == 1 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1) || $movimento[2] - $movimento[0] == -1 && ($movimento[1] - $movimento[3] == -1 || $movimento[1] - $movimento[3] == 1))) //Diagonal 
            && $tabuleiro[$movimento[2]][$movimento[3]][0] == '-' //Onde ta indo -
        ) {
            return true;
        }
        //Eat
        if (((($movimento[2] - $movimento[0] == 1 || $movimento[2] - $movimento[0] == -1) //cima baixo
                || ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1)) //lados
                || ($movimento[2] - $movimento[0] == 1 && ($movimento[1] - $movimento[3] == 1 || $movimento[1] - $movimento[3] == -1) || $movimento[2] - $movimento[0] == -1 && ($movimento[1] - $movimento[3] == -1 || $movimento[1] - $movimento[3] == 1))) //Diagonal 
            && ($tabuleiro[$movimento[0]][$movimento[1]][1] == 2 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 1 //Branco
                || $tabuleiro[$movimento[0]][$movimento[1]][1] == 1 && $tabuleiro[$movimento[2]][$movimento[3]][1] == 2) //preto 
        ) {
            return true;
        } else {
            return false;
        }
    }
}
