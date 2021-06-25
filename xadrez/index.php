<html>
<?php
session_start();
if (isset($_SESSION['tabuleiro']) && $_SESSION['tabuleiro'] != NULL) {
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
        <form class='start-form' method='post'>
            <div class="dropdown">
                <a>Play Against Computer</a>
                <div class="dropdown-content">
                    <p>Easy</p>
                    <hr class='dropdown-line'>
                    <p>Medium</p>
                    <hr class='dropdown-line'>
                    <p>Hard</p>
                </div>
            </div>
            <div class="dropdown">
                <a>Play Online</a>
                <div class="dropdown-content">
                    <p>10 Min</p>
                    <hr class='dropdown-line'>
                    <p>5 Min</p>
                    <hr class='dropdown-line'>
                    <p>1 Min</p>
                </div>
            </div>
            <div class="dropdown">
                <a href='play.php'>Play Against Yourself</a>
            </div>
            <p class='page-title'>Play Chess!</p>
        </form>
    </div>
</body>

</html>