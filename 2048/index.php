<?php 

session_start(); 



?>

<!DOCTYPE html>
<html>
<head>
	<title>2048 Game!</title>
	<?php require_once 'elements/head.php' ?>
</head>
<body>

	<h1 class="title" >2048</h1>

	<div id="game">

		<div id="buttonStart" class="row">
			<div class="col-md-12" style="text-align: center; margin-bottom: 20px">

				<button onclick="startGame()" class="btn btn-success">Click to start the game</button>

			</div>
		</div>
		
		<table id="game-table" border="1" class="game-table-format">

		</table>
	</div>

</body>

<footer class="footer" >Desenvolvido por ComputerScienceMaster - Creative Commons Attribution-ShareAlike 4.0 International License</footer>
</html>