<?php

require_once '../Util.php';
session_start();
function moveDown(){
	$y = $_SESSION['game']; 


	for($j=0; $j<4; $j++){
		for ($i=3; $i >= 0; $i--) { 
			if ($y[$i][$j] != "-"){
				for($k=3; $k >= $i; $k--){
					$check = true;
					if($y[$k][$j] == "-"){
						$y[$k][$j] = $y[$i][$j];
						$y[$i][$j] = "-";
						$_SESSION['game'] = $y;
						break;
					}
					else if($y[$k][$j] == $y[$i][$j] && $i != $k){
						for ($l = $k-1; $l > $i && $l <$k; $l--)
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

moveDown();

$u = $_SESSION['game'];

if ($v != $u){
	addNumero();
}

echo getTable();

?>