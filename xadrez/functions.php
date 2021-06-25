<div>
    <?php
    require_once 'models/Bishop.php';
    require_once 'models/King.php';
    require_once 'models/Knight.php';
    require_once 'models/Pawn.php';
    require_once 'models/Queen.php';
    require_once 'models/Rook.php';
    ?>
</div>
<?php
function ConverterMovimento($start, $end)
{
    //start
    //coluna
    switch ($start[0]) {
        case 'a':
            $start2 = 0;
            break;
        case 'b':
            $start2 = 1;
            break;
        case 'c':
            $start2 = 2;
            break;
        case 'd':
            $start2 = 3;
            break;
        case 'e':
            $start2 = 4;
            break;
        case 'f':
            $start2 = 5;
            break;
        case 'g':
            $start2 = 6;
            break;
        case 'h':
            $start2 = 7;
            break;
    }

    //linha
    $start1 = 8 - $start[1];

    //end
    //coluna
    switch ($end[0]) {
        case 'a':
            $end2 = 0;
            break;
        case 'b':
            $end2 = 1;
            break;
        case 'c':
            $end2 = 2;
            break;
        case 'd':
            $end2 = 3;
            break;
        case 'e':
            $end2 = 4;
            break;
        case 'f':
            $end2 = 5;
            break;
        case 'g':
            $end2 = 6;
            break;
        case 'h':
            $end2 = 7;
            break;
    }

    //linha
    $end1 = 8 - $end[1];
    return [$start1, $start2, $end1, $end2];
}
function move($tabuleiro, $start, $end, $quemjoga)
{
    $movimento = ConverterMovimento($start, $end);

    if ($tabuleiro[$movimento[0]][$movimento[1]][0] != '-' && ($quemjoga == 'white' && $tabuleiro[$movimento[0]][$movimento[1]][1] == 2) || ($quemjoga == 'black' && $tabuleiro[$movimento[0]][$movimento[1]][1] == 1)) {
        $valido = false;
        switch ($tabuleiro[$movimento[0]][$movimento[1]][0]) {
            case "b":
                $valido = Bishop::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
            case "x":
                $valido = King::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
            case "k":
                $valido = Knight::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
            case "p":
                $valido = Pawn::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
            case "q":
                $valido = Queen::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
            case "r":
                $valido = Rook::VerificaMovimento($movimento, $tabuleiro, $quemjoga);
                break;
        }

        if ($valido) {
            $tabuleiro[$movimento[2]][$movimento[3]] = $tabuleiro[$movimento[0]][$movimento[1]];
            $tabuleiro[$movimento[0]][$movimento[1]] = '-';
            if ($quemjoga == 'white') {
                $_SESSION['quemjoga'] = 'black';
            }
            if ($quemjoga == 'black') {
                $_SESSION['quemjoga'] = 'white';
            }
            /*
            $check = check($tabuleiro, $quemjoga);
            $reis = acharRei($tabuleiro, $quemjoga);
            $rei = [];
            if ($quemjoga == 'black') {
                array_push($rei, $reis[1][0], $reis[1][1], $reis[1][2]);
            }
            if ($quemjoga == 'white') {
                array_push($rei, $reis[0][0], $reis[0][1], $reis[0][2]);
            }
            if ($check == false) {
                echo 'false';
            } else {
                echo 'true';
            }
            //make color red
            echo '<pre>';
            print_r($rei);
            echo '</pre>';
            if ($check == true) {
                echo 'check true';
                if ($rei[2] == 'x1') {
                    $tabuleiro[$rei[0]][$rei[1]] = 'x11';
                } else if ($rei[2] == 'x2') {
                    $tabuleiro[$rei[0]][$rei[1]] = 'x12';
                }
            } else if ($check == false) {
                echo 'oi';
                if ($reis[0][2] == 'x11') {
                    echo 'oi';
                    $tabuleiro[$reis[0][0]][$reis[0][1]] = 'x1';
                } else if ($reis[1][2] == 'x12') {
                    echo 'oi';
                    $tabuleiro[$reis[1][0]][$reis[2][1]] = 'x2';
                }
            }*/
            return $tabuleiro;
        } else {
            echo '<p class="warning">Invalid movement</p>';
            return $tabuleiro;
        }
    } else {
        echo '<p class="warning">You can\'t move that piece</p>';
        return $tabuleiro;
    }
}
function desenharTabuleiro($tabuleiro)
{
    $alterna = 0;
    $labelColuna = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    $labelLinha = [8, 7, 6, 5, 4, 3, 2, 1];
    echo '<div class="linha">';
    for ($i = 0; $i < 8; $i++) {
        echo '<p>' . $labelLinha[$i] . '</p>';
    }
    echo '</div>'; //linha
    echo '<table class="tabuleiro">';
    for ($i = 0; $i < 8; $i++) {
        echo '<tr>';
        for ($a = 0; $a < 8; $a++) {
            if ($alterna == 0) {
                echo '<td class="whitespot"><img class="images" src="resources/images/' . $tabuleiro[$i][$a] . '.png"></td>';
                $alterna++;
            } else {
                echo '<td class="blackspot"><img class="images" src="resources/images/' . $tabuleiro[$i][$a] . '.png"></td>';
                $alterna--;
            }
        }
        echo '</tr>';
        if ($alterna == 0) {
            $alterna = 1;
        } else {
            $alterna = 0;
        }
    }
    echo '</table>';


    echo '<div class="coluna">';
    for ($i = 0; $i < 8; $i++) {
        echo '<p>' . $labelColuna[$i] . '</p>';
    }
    echo '</div>'; //coluna
}
function check($tabuleiro, $quemjoga)
{
    $reis = acharRei($tabuleiro);
    //Knight
    if (0 == 0) {
        $rei = [];
        $return = 'x1';
        $true = [$return, true];
        array_push($rei, $reis[0][0], $reis[0][1], $reis[0][2]);
        $a = 1;
        $l = 2;
        $k = 2;
        for ($x = 0; $x < 2; $x++) {
            for ($i = 1; $i < 3; $i++) {
                if ($rei[0] - $a > 0 && $rei[1] - $l > 0) {
                    if ($tabuleiro[$rei[0] - $a][$rei[1] - $l] == 'k' . $k) {
                        return $true;
                    }
                }
                if ($rei[0] + $a < 8 && $rei[1] + $l < 8) {
                    if ($tabuleiro[$rei[0] + $a][$rei[1] + $l] == 'k' . $k) {
                        return $true;
                    }
                }
                if ($rei[0] + $a < 8 && $rei[1] - $l > 0) {
                    if ($tabuleiro[$rei[0] + $a][$rei[1] - $l] == 'k' . $k) {
                        return $true;
                    }
                }
                if ($rei[0] - $a > 0 && $rei[1] + $l < 8) {
                    if ($tabuleiro[$rei[0] - $a][$rei[1] + $l] == 'k' . $k) {
                        return $true;
                    }
                }
                $a++;
                $l--;
            }
            $k--;
            $a--;
            $l++;
            $return = 'x2';
            $true = [$return, true];

            $rei = [$reis[1][0], $reis[1][1], $reis[1][2]];
        }
        $false = ['', 'false'];
        return $false;
    }
}
function acharRei($tabuleiro)
{
    $rei = [];
    $rei2 = [];
    for ($i = 0; $i < 8; $i++) {
        for ($a = 0; $a < 8; $a++) {
            if ($tabuleiro[$i][$a] == 'x1') {
                array_push($rei, $i, $a, 'x1');
            }
            if ($tabuleiro[$i][$a] == 'x11') {
                array_push($rei, $i, $a, 'x11');
            }
            if ($tabuleiro[$i][$a] == 'x2') {
                array_push($rei2, $i, $a, 'x2');
            }
            if ($tabuleiro[$i][$a] == 'x22') {
                array_push($rei2, $i, $a, 'x22');
            }
        }
    }
    $reis = [$rei, $rei2];
    return $reis;
}
