<?php



// verifica se a letra está na palavra
function aPalavraTem($palavra, $letra)
{
    for ($i = 0; $i < strlen($palavra); $i++) {
        if ($palavra[$i] == $letra) {
            return true;
        }
    }
    return false;
}


// "machado" -> retorno [1,4]

function localizaLetras($palavra, $letra)
{

    $posicoes = array();

    for ($i = 0; $i < strlen($palavra); $i++) {
        if ($palavra[$i] == $letra) {
            array_push($posicoes, $i);
        }
    }

    return $posicoes;
}


function mostrarPalavraEscolhida()
{

    echo " <br><span>Palavra Escolhida: </span><div class='tentativas'>";

    for ($a = 0; $a < count($_SESSION['palavra']); $a++) {
        echo $_SESSION['palavra'][$a] . " ";
    }
    echo  " <br> </div>";
}

function mostrarTentativasErradas()
{

    echo "<br><span>Tentativas erradas: </span><div class='tentativas'>";

    for ($a = 0; $a < 6; $a++) {
        echo $_SESSION['palpites'][$a] . " ";
    }
    echo  "<br> </div>";
}


function inicializarJogo($palavras)
{
    // verifica se tem algo dentro de "palpites" e não apaga se houver.
    if (!isset($_SESSION['palpites']) || (isset($_GET['acao']) && $_GET['acao'] == "reset")) {
        $_SESSION['palpites'] = ["_", "_", "_", "_", "_", "_"];
        $_SESSION['i'] = 0;
    }


    // vamos inicializar o jogo....

    if (!isset($_SESSION['palavra']) || (isset($_GET['acao']) && $_GET['acao'] == "reset")) {
        $_SESSION['numeroEscolhido'] = rand(0, 9);

        // define um array novo chamado "palavraEscolhida
        $palavraEscolhida = array();
        // iterar de zero até a quantidade de letras que tem a palavra escolhida
        for ($i = 0; $i < strlen($palavras[$_SESSION['numeroEscolhido']]); $i++) {
            // insere a quantidade de underlines de acordo com a quantidade de letras
            array_push($palavraEscolhida, "_");
        }

        $_SESSION['palavra'] = $palavraEscolhida;
    }
}

function palpitar($palavras)
{
    // fala qual palpite foi feito

    if (isset($_GET['n1']) && $_GET['n1'] != "") {
        $jogada = $_GET["n1"];
        echo "<h4> O seu palpite foi:" . $jogada . "</h4><br><br>";

        // verifica se a letra que foi digitada está na palavra / ou não.
     
        if ($_SESSION['i'] >= 6 ||  aPalavraTem(implode("", $_SESSION['palavra']), "_") == false ) {
            echo '<div class="alert alert-info"> GAME OVER </div>';
        }else{
            if (aPalavraTem($palavras[$_SESSION['numeroEscolhido']], $jogada) == true) {
                // G  _  _  _

                echo "<div class='alert alert-success'>A Palavra contém essa letra, Parabéns!</div>";
                // aqui você precisa: colocar a letra digitada no lugar certo


                $posicoes = localizaLetras($palavras[$_SESSION['numeroEscolhido']], $jogada);

                for ($j = 0; $j < count($posicoes); $j++) {
                    $_SESSION['palavra'][$posicoes[$j]] = $jogada;
                }
            } else {
                echo "<div class='alert alert-danger'>A palavra NÃO contém essa letra, desculpe, tente novamente</div>";
                $_SESSION['palpites'][$_SESSION['i']] = $jogada;
                $_SESSION['i'] = $_SESSION['i'] + 1;
            }
        }
    }
}
