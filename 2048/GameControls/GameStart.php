<?php

require_once 'Util.php';

function criarTable(){
	$l1 = ["-", "-", "-" ,"-" ];
	$l2 = ["-", "-", "-" ,"-" ];
	$l3 = ["-", "-", "-" ,"-" ];
	$l4 = ["-", "-", "-" ,"-" ];
	$y = [$l1,$l2,$l3,$l4];
	$_SESSION['game'] = $y; 
	

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

	return getTable();
}

?>