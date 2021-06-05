<?php

require_once '../Util.php';
session_start();
function moveLeft(){
	$_SESSION['messages'] = "jao";
	$y = $_SESSION['game']; 
	for($i=0; $i<4; $i++){
		for ($j=0; $j <= 3; $j++) { 
			if ($y[$i][$j] != "-"){
				for($k=0; $k <= $j; $k++){
					$check = true;
					if($y[$i][$k] == "-"){
						$y[$i][$k] = $y[$i][$j];
						$y[$i][$j] = "-";
						$_SESSION['game'] = $y;
						break;
					}
					else if($y[$i][$k] == $y[$i][$j] && $j != $k){
						for ($l = $k+1; $l < $j && $l > $k; $l++)
							{	
								if ($y[$i][$l] != '-'){
									$check = false;

								}
							}
						if ($check == true){
							$y[$i][$k] *= 2;
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

moveLeft();

$u = $_SESSION['game'];

if ($v != $u){
	addNumero();
}

echo getTable();
?>
