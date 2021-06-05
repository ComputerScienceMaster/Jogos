<?php

function getTable(){
	if(isset($_SESSION)){
		$y = $_SESSION['game'];
		return  "<tr>
		<td>" . $y[0][0] . "</td>
		<td>" . $y[0][1] . "</td>
		<td>" . $y[0][2] . "</td>
		<td>" . $y[0][3] . "</td>
		</tr>
		<tr>
		<td>" . $y[1][0] . "</td>
		<td>" . $y[1][1] . "</td>
		<td>" . $y[1][2] . "</td>
		<td>" . $y[1][3] . "</td>
		</tr>
		<tr>
		<td>" . $y[2][0] . "</td>
		<td>" . $y[2][1] . "</td>
		<td>" . $y[2][2] . "</td>
		<td>" . $y[2][3] . "</td>
		</tr>
		<tr>
		<td>" . $y[3][0] . "</td>
		<td>" . $y[3][1] . "</td>
		<td>" . $y[3][2] . "</td>
		<td>" . $y[3][3] . "</td>
		</tr>";	
	}else{
		"<p>Session not started</p>";
	}
}



function addNumero(){

	$y = $_SESSION['game']; 
	$vazios = [];

	for($i=0; $i<4; $i++){
		for($j = 0; $j<4; $j++){
			if ($y[$i][$j] == "-"){
				$coords =[$i, $j];
				array_push($vazios, $coords);
			}
		}
	}

	$tamanho = count($vazios);
	$add = $vazios[random_int(0, $tamanho - 1)];
	$y[$add[0]][$add[1]] = "2";

	$_SESSION['game'] = $y;
	var_dump($_SESSION['game']) ;

}


?>