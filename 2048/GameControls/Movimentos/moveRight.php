<?php 
require_once '../Util.php';
session_start();
function moveRight(){
	$y = $_SESSION['game']; 
	for($i=0; $i<4; $i++){
		for ($j=3; $j >= 0; $j--) { 
			if ($y[$i][$j] != "-"){
				for($k=3; $k > $j; $k--){
					$check = true;
					if($y[$i][$k] == "-"){
						$y[$i][$k] = $y[$i][$j];
						$y[$i][$j] = "-";
						$_SESSION['game'] = $y;
						break;
					}
					else if($y[$i][$k] == $y[$i][$j] && $j != $k){
						for ($l = $k-1; $l > $j && $l <$k; $l--)
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

moveRight();

$u = $_SESSION['game'];

if ($v != $u){
	addNumero();
}

echo getTable();

?>