<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<div style="font-size:50px; text-align:center; margin-top:50px">
    <?php
    session_start();


    $ganhou = false;

    // oppções do jogo
    $jogandoComBot = true;



    if (!isset($_SESSION['tabuleiro']) || (isset($_GET['acao']) && $_GET['acao'] == "reset")) {
        // Cria uma nova matriz - Inicia o jogo
        $linha1  = [' ', ' ', ' '];
        $linha2  = [' ', ' ', ' '];
        $linha3  = [' ', ' ', ' '];
        $matriz = [$linha1, $linha2, $linha3];
        $_SESSION['tabuleiro'] = $matriz;
        $_SESSION['quemjoga'] = "X";
    } else {
        // Esse trecho do código atribui X ou O para a matriz
        if (isset($_GET['j1']) && isset($_GET['j2'])) {
            if ($_SESSION['tabuleiro'][$_GET['j1']][$_GET['j2']] == ' ') {
                $_SESSION['tabuleiro'][$_GET['j1']][$_GET['j2']] = "X";
                $ganhou = verificaGanhador();

                if ($jogandoComBot == true) {
                    // aqui o bot estará jogando..,
                    $jogada = jogadaDoBot();
                    if ($_SESSION['tabuleiro'][$jogada[0]][$jogada[1]] == ' ') {
                        $_SESSION['tabuleiro'][$jogada[0]][$jogada[1]] = "O";
                        $_SESSION['quemjoga'] = "X";
                        $ganhou = verificaGanhador();
                    }
                } else {
                    $_SESSION['quemjoga'] = "O";
                }
            } else {
                echo '<div style="color:red; background-color:yellow">Isso e ilegal</div><br><br>';
            }
        } else if ($jogandoComBot == false) {
            // aqui acontece a "pessoa real" jogando...
            if (isset($_GET['j3']) && isset($_GET['j4'])) {
                if ($_SESSION['tabuleiro'][$_GET['j3']][$_GET['j4']] == ' ') {
                    $_SESSION['tabuleiro'][$_GET['j3']][$_GET['j4']] = "O";
                    $_SESSION['quemjoga'] = "X";
                    $ganhou = verificaGanhador();
                } else {
                    echo '<div style="color:red; background-color:yellow">Isso e ilegal</div><br><br>';
                }
            }
        }
    }

    function verificaGanhador()
    {
        // verifica quem venceu:
        $m  = $_SESSION['tabuleiro'];

        $ganhou = false;
        // VERIFICA AS HORIZONTAIS
        if (($m[0][0] == "X" && $m[0][1] == "X" && $m[0][2] == "X") || ($m[0][0] == "O" && $m[0][1] == "O" && $m[0][2] == "O")) {
            $ganhou = true;
        }
        if (($m[1][0] == "X" && $m[1][1] == "X" && $m[1][2] == "X") || ($m[1][0] == "O" && $m[1][1] == "O" && $m[1][2] == "O")) {
            $ganhou = true;
        }
        if (($m[2][0] == "X" && $m[2][1] == "X" && $m[2][2] == "X") || ($m[2][0] == "O" && $m[2][1] == "O" && $m[2][2] == "O")) {
            $ganhou = true;
        }
        // VERIFICA AS VERTICAIS
        if (($m[0][0] == "X" && $m[1][0] == "X" && $m[2][0] == "X") || ($m[0][0] == "O" && $m[1][0] == "O" && $m[2][0] == "O")) {
            $ganhou = true;
        }
        if (($m[0][1] == "X" && $m[1][1] == "X" && $m[2][1] == "X") || ($m[0][1] == "O" && $m[1][1] == "O" && $m[2][1] == "O")) {
            $ganhou = true;
        }
        if (($m[0][2] == "X" && $m[1][2] == "X" && $m[2][2] == "X") || ($m[0][2] == "O" && $m[1][2] == "O" && $m[2][2] == "O")) {
            $ganhou = true;
        }
        //VERIFICA AS DIAGONAIS 
        if (($m[0][0] == "X" && $m[1][1] == "X" && $m[2][2] == "X") || ($m[0][0] == "O" && $m[1][1] == "O" && $m[2][2] == "O")) {
            $ganhou = true;
        }
        if (($m[0][2] == "X" && $m[1][1] == "X" && $m[2][0] == "X") || ($m[0][2] == "O" && $m[1][1] == "O" && $m[2][0] == "O")) {
            $ganhou = true;
        }
        return $ganhou;
    }

    function jogadaDoBot()
    {
        $jogadaValida = false;
        while ($jogadaValida == false) {
            $linha = rand(0, 2);
            $coluna = rand(0, 2);
            if ($_SESSION['tabuleiro'][$linha][$coluna] == ' ') {
                $jogadaValida = true;
            }
        }
        return [$linha, $coluna];
    }





    /*
echo '<pre>';
print_r($matriz);
echo '</pre>';
*/

    // imprime sua matriz do jogo da velha:
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo '[' . $_SESSION['tabuleiro'][$i][$j] . ']';
        }
        echo '<br>';
    }

    if ($ganhou == true) {
        echo "GAME OVER";
    }


    ?>

    <form>
        <input type="hidden" name='acao' value="reset" />
        <input type="submit" value="Reset" />
    </form>

    <?php if ($_SESSION['quemjoga'] == "X") { ?>
        <form>
            <div style="margin-top:40px;">
                <h3>Jogada do X</h3>
                <input type="text" placeholder="coluna" name="j1" />
                <input type="text" placeholder="linha" name="j2" />
                <input type="submit" />
        </form>
    <?php } ?>
    <?php if ($_SESSION['quemjoga'] == "O") { ?>
        <form>
            <br>
            <h3>Jogada da O</h3>
            <input type="text" placeholder="coluna" name="j3" />
            <input type="text" placeholder="linha" name="j4" />
            <input type="submit" />
        </form>
    <?php } ?>
</div>


</div>

</html>