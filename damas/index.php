<?php 

require_once "functions.php";


session_start();


?>
<!DOCTYPE html>
<html>

<?php require_once 'elements/head.php';?>

<body class="container background">

	<div class="row">
		<div class="col-md-2 controllers">
			<h2 >Controllers</h2>
			<form method="POST" class="block-options">
				<h3>Move</h3>
				<div class="form-group">
					<input class="form-control" type="text" placeholder="Origem Linha" name="origemLinha"/>
					<input class="form-control" type="text" placeholder= "Origem Coluna" name="origemColuna"/>
					<input class="form-control" type="text" placeholder = "Destino Linha" name="destinoLinha"/>
					<input class="form-control" type="text" placeholder="Destino Coluna" name="destinoColuna"/>
				</div>
				<input class="btn btn-light"type="submit" value="Move!">
			</form>
		</div>
		<div class="col-md-8">

			<div class="alert alert-info"> 
		<?php
			if ($_SESSION['turn'] == 'X') {
				echo "Turn: White";
			}else{
				echo "Turn: Black";}


				?>
				
			</div>
			<?php

			





			$x1 = ['-','0','-','0','-','0','-','0'];
			$x2 = ['0','-','0','-','0','-','0','-'];
			$x3 = ['-','0','-','0','-','0','-','0'];
			$x4 = ['-','-','-','-','-','-','-','-'];
			$x5 = ['-','-','-','-','-','-','-','-'];
			$x6 = ['X','-','X','-','X','-','X','-'];
			$x7 = ['-','X','-','X','-','X','-','X'];
			$x8 = ['X','-','X','-','X','-','X','-'];

			$y = [$x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8];


			if(isset($_POST['action']) && $_POST['action'] == "ResetGame"){
				session_destroy();
				session_start();
				$_SESSION["turn"] = 'X';
				$_SESSION['tabuleiro'] = $y;
			}


			if(isset($_POST['origemLinha']) && isset($_POST['origemColuna']) && isset($_POST['destinoLinha']) && isset($_POST['destinoColuna'])){
				$origemLinha = $_POST['origemLinha'];
				$origemColuna = $_POST['origemColuna'];
				$destinoLinha = $_POST['destinoLinha'];
				$destinoColuna = $_POST['destinoColuna'];

				$y = $_SESSION["tabuleiro"];
				$isValid = validaMovimento($y, $origemLinha, $origemColuna, $destinoLinha, $destinoColuna);
				if($isValid){
					if($_SESSION['turn'] == 'X')
					{
						$_SESSION['turn'] = "0";

					}
					else
					{
						$_SESSION['turn'] = 'X';
					}
					$_SESSION["tabuleiro"] = fazerMovimento($y, $origemLinha, $origemColuna, $destinoLinha, $destinoColuna);
				}else{
					echo '<div class="alert alert-danger">Esse movimento não é válido</div>';
				}


			}

			if(!isset($_SESSION['tabuleiro'])){
				$_SESSION['tabuleiro'] = $y;
				MontarTabuleiro($_SESSION['tabuleiro'] );
			}else{
				MontarTabuleiro($_SESSION['tabuleiro']);
			}


			?>
		</div>

		<div class="col-md-2 options">
			<h2>Game options</h2>
			<form method="POST" class="block-options"> 
				<input type="hidden" name='action' value="ResetGame"/>
				<input class="btn btn-light" type="submit" value="Reset Game!">
			</form>
		</div>
	</div>



	



</body>
</html>