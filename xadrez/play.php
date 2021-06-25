<html>
<?php
session_start();
if (isset($_POST['acao']) && $_POST['acao'] == 'restart') {
    unset($_SESSION['tabuleiro']);
}
?>

<head>
    <title>Chess</title>
    <?php
    require_once 'elements/head.php';
    require_once 'functions.php';
    ?>
</head>

<body>
    <div class='container'>
        <?php
        echo '<div class="voltar-container"><a class="voltar" href="index.php"> Leave</a></div>';

        if (isset($_SESSION['tabuleiro']) && $_SESSION['tabuleiro'] != NULL) {
            if (isset($_POST['start']) && isset($_POST['end'])) {
                $start = $_POST['start'];
                $end = $_POST['end'];
                $_SESSION['tabuleiro'] = move($_SESSION['tabuleiro'], $start, $end, $_SESSION['quemjoga']);
            }
        } else {
            $linha1 = ['r1', 'k1', 'b1', 'q1', 'x1', 'b1', 'k1', 'r1'];
            $linha2 = ['p1', 'p1', 'p1', 'p1', 'p1', 'p1', 'p1', 'p1'];
            $linha3 = ['-', '-', '-', '-', '-', '-', '-', '-'];
            $linha4 = ['-', '-', '-', '-', '-', '-', '-', '-'];
            $linha5 = ['-', '-', '-', '-', '-', '-', '-', '-'];
            $linha6 = ['-', '-', '-', '-', '-', '-', '-', '-'];
            $linha7 = ['p2', 'p2', 'p2', 'p2', 'p2', 'p2', 'p2', 'p2'];
            $linha8 = ['r2', 'k2', 'b2', 'x2', 'q2', 'b2', 'k2', 'r2'];
            $tabuleiro = [$linha1, $linha2, $linha3, $linha4, $linha5, $linha6, $linha7, $linha8];
            $_SESSION['tabuleiro'] = $tabuleiro;
            $_SESSION['quemjoga'] = 'white';
        }
        echo '<div class="tabuleiro-outline">';
        desenharTabuleiro($_SESSION['tabuleiro']);
        echo '</div>';
        //header('location:localhost:Chess/index.php');
        ?>
    </div>
    <fieldset class='form-fieldset'>
        <legend class='form-legend'>Move</legend>
        <form method='post'>
            <input class='input' type='text' placeholder='Start (Example: a2)' name='start'>
            <input class='input inputright' type='text' placeholder='Where to go? (Example: a4)' name='end'>
            <br>
            <input class='enter' type='submit' value='Move!' name='submit'>
        </form>
        <form class='form' method='post'>
            <input class='enter enter-restart' type='submit' value='Restart Game' name='restart'>
            <input type='hidden' name='acao' value='restart'>
        </form>
    </fieldset>
    <p class='reminder'><?= $_SESSION['quemjoga'] ?>'s turn</p>
    </div>
</body>

</html>