<?php 

session_start(); 

require_once 'GameControls/GameStart.php';
require_once 'GameControls/Util.php';

if(isset($_GET['start']) && $_GET['start'] == 1){
	criarTable();
	header("Location: play.php");
}

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

		<?php if(isset($_SESSION['messages'])){?>

		<div id="messages" class="alert alert-info"></div>
		<?php }?>
		<div id="buttonStart" class="row">
			<div class="col-md-12" style="text-align: center; margin-bottom: 20px">

				<div class='col-md-12' style='text-align: center; margin-bottom:20px'> <button onclick='reset()' class='btn btn-danger'>Reset game </button></div>

			</div>
		</div>
		
		<table id="game-table" border="1" class="game-table-format">

			<?php echo getTable(); ?>

		</table>
	</div>

</body>

<footer class="footer" >Desenvolvido por ComputerScienceMaster - Creative Commons Attribution-ShareAlike 4.0 International License</footer>
</html>