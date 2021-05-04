<?php

require_once 'Util.php';

session_start();

function move(){
	$y = $_SESSION['game']; 
	

	for($i=0; $i<2; $i++){


		$primeiraLinha = random_int(0,3);
		$primeiraColuna = random_int(0,3);
		if ($y[$primeiraLinha][$primeiraColuna]){
			$y[$primeiraLinha][$primeiraColuna] = 2;
		}
		else{
			$primeiraLinha = random_int(0,3);
			$primeiraColuna = random_int(0,3);
			$y[$primeiraLinha][$primeiraColuna] = 2;
		}


	}

	$_SESSION['game'] = $y;


	echo getTable();
	

}

move();




?>