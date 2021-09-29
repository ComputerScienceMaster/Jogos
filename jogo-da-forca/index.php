<html>

<head>

    <title>Jogo da Forca!</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/style.css">

</head>
<div class = "cabecario"> </div>

<div class="centralizar">

    <h1> Jogo da forca </h1>


    <div class="ladoEsquerdo">

        <img src="resources/images/forca.svg" height="300" width="300"> </img>

    </div>

    <div class="ladoDireito">

        <?php
        require_once 'functions.php';
        session_start();

        $palavras = file_get_contents("substantivos.txt");
        $palavras = explode("\n", $palavras);

        inicializarJogo($palavras);

        palpitar($palavras);

        mostrarPalavraEscolhida();

        mostrarTentativasErradas();


        ?>
        <form>
            <div>Seu Palpite</div>
            <input class="input-form" type="text" name="n1" placeholder="Jogada" /><br>
            <input class="btn btn-primary" type="submit" value="Fazer jogo" />
        </form>


        <form>
            <input type="hidden" name='acao' value="reset" />
            <input class="btn btn-danger" type="submit" value="Reset" />
        </form>
    </div>

</div>
<div class = "rodape"> 
    <div class="textoAutoria"> 
        Esse jogo foi desenvolvido por Fermin
    </div> 
</div>
</html>