<?php

require_once '../Util.php';
session_start();
function moveUp(){
	$y = $_SESSION['game']; 
	$moveu = 0;

	for($j=0; $j<4; $j++){
		for ($i=0; $i <= 3; $i++) { 
			if ($y[$i][$j] != "-"){
				for($k=0; $k <= $i; $k++){
					$check = true;
					if($y[$k][$j] == "-"){
						$y[$k][$j] = $y[$i][$j];
						$y[$i][$j] = "-";
						$_SESSION['game'] = $y;
						$moveu += 1;
						break;
					}
					else if($y[$k][$j] == $y[$i][$j] && $i != $k){
						for ($l = $k+1; $l < $i && $l>$k; $l++)
							{	
								if ($y[$l][$j] != '-'){
									$check = false;

								}
							}
						if ($check == true){
							$y[$k][$j] *= 2;
							$y[$i][$j] = "-";
							$_SESSION['game'] = $y;
							break;
						}
					}
				}
			}
		}
	}
}

$v = $_SESSION['game'];

moveUp();

$u = $_SESSION['game'];

if ($v != $u){
	addNumero();
}

echo getTable();

?>
