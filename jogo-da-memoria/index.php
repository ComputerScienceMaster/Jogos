<html>

<head>
    <title>Jogo da memória</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<h1 class="game-title">Jogo da memória</h1>

<?php

session_start();


if (isset($_POST['acao']) && $_POST['acao'] == "reset") {
    // pq??
    session_destroy();
    session_start();
    unset($_GET['l']);
    unset($_GET['c']);
    header("Location: index.php");
}


require_once 'tabuleiros.php';



if ((isset($_POST['acao']) && $_POST['acao'] == "reset") || isset($_POST['acao']) && $_POST['acao'] == "start") {
    
    $tabEscolhido = rand(0,2);
    $_SESSION['tabEscolhido'] = $tabEscolhido;


    $_SESSION['tabResultado'] = [
        [false, false, false, false],
        [false, false, false, false],
        [false, false, false, false],
        [false, false, false, false]
    ];
}



// limita as jogadas apenas até 2
if (!isset($_SESSION['numero_jogadas']) || $_SESSION['numero_jogadas'] >= 2) {
    $_SESSION['numero_jogadas'] = 1;
} else {
    $_SESSION['numero_jogadas'] = $_SESSION['numero_jogadas'] + 1;
}



// Aqui nós setamos para TRUE quando o usuário acerta a carta!
if (isset($_SESSION['numero_jogadas']) && $_SESSION['numero_jogadas'] == 2 &&  !isset($_POST['acao'])) {
    if (isset($_GET['l']) && isset($_GET['c']) && isset($_SESSION['valorLinha']) && isset($_SESSION['valorColuna']) &&  $tabuleiros[$_SESSION['tabEscolhido']][$_GET['l']][$_GET['c']] == $tabuleiros[$_SESSION['tabEscolhido']][$_SESSION['valorLinha']][$_SESSION['valorColuna']]) {
        $_SESSION['tabResultado'][$_GET['l']][$_GET['c']] = true;
        $_SESSION['tabResultado'][$_SESSION['valorLinha']][$_SESSION['valorColuna']] = true;
    }
}


// valores da jogada atual 
// $_GET['l']
// $_GET['c']

// valores da jogada anterior
// $_SESSION['valorLinha']
// $_SESSION['valorColuna']

// verifica se você já fez 1 jogada
if (
    isset($_GET["l"]) && isset($_GET["c"])
    && isset($_SESSION['numero_jogadas']) && $_SESSION['numero_jogadas'] == 1
) { // verifica se você já fez uma jogada
    $_SESSION['valorLinha'] = $_GET['l'];
    $_SESSION['valorColuna'] = $_GET['c'];
}

?>

<?php if (isset($_SESSION['tabResultado'])) {  ?>

    <div class="tabuleiro-container">
        <table class="table">

            <?php for ($l = 0; $l < 4; $l++) {    ?>
                <tr>
                    <?php for ($c = 0; $c < 4; $c++) {    ?>

                        <!-- mostra uma carta com conteúdo DA JOGADA ATUAL -->
                        <?php if (isset($_GET["l"]) && isset($_GET["c"]) && $_GET['l'] == $l && $_GET['c'] == $c) { ?>
                            <td>
                                <!-- mostra uma CARTA VIRADA PARA cima -->
                                <a href="?l=<?= $l ?>&c=<?= $c ?>">
                                    <img src="images/<?= $tabuleiros[$_SESSION['tabEscolhido']][$l][$c] ?>.png ">
                                </a>
                            </td>
                            <!-- mostra uma carta com conteúdo da jogada ANTERIOR -->
                        <?php } else if (
                            $_SESSION['numero_jogadas'] >= 1
                            && (isset($_SESSION['valorLinha']) && (isset($_SESSION['valorColuna'])))
                            && ($_SESSION['valorLinha'] == $l && $_SESSION['valorColuna'] == $c)
                        ) { ?>

                            <!-- mostra uma CARTA VIRADA PARA CIMA -->
                            <td>
                                <a href="?l=<?= $_SESSION['valorLinha'] ?>&c=<?= $_SESSION['valorColuna'] ?>">
                                    <img src="images/<?= $tabuleiros[$_SESSION['tabEscolhido']][$_SESSION['valorLinha']][$_SESSION['valorColuna']] ?>.png ">
                                </a>
                            </td>
                        <?php }
                        else
                        if (isset($_SESSION['tabResultado']) && $_SESSION['tabResultado'][$l][$c] == true) {
                            ?>

                            <!-- mostra uma CARTA VIRADA PARA CIMA -->
                            <td>
                                <img src="images/<?= $tabuleiros[$_SESSION['tabEscolhido']][$l][$c] ?>.png ">
                            </td>

                        <?php } else { ?>

                            <!-- mostra uma CARTA VIRADA PARA BAIXO -->
                            <td><a href="?l=<?= $l ?>&c=<?= $c ?>">
                                    <img src="images/Carta.png ">
                            </td>
                        <?php } ?>

                    <?php } ?>
                </tr>
            <?php } ?>
        </table>

    </div>

<?php } ?>


<?php if (isset($_SESSION['tabResultado'])) { ?>
    <div style="text-align: center;padding:2em">
        <form method="POST">
            <input type="hidden" name='acao' value="reset" />
            <input type="submit" value="Reset" style="font-size: 1.8em; background-color:red; color: white;" />
        </form>
    </div>

<?php } else { ?>


    <div style="text-align: center;padding:2em">
        <form method="POST">
            <input type="hidden" name='acao' value="start" />
            <input type="submit" value="Start" style="font-size: 1.8em; background-color:green; color: white;" />
        </form>
    </div>

<?php } ?>


</div>

</html>