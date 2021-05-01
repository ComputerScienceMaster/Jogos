<?php

function move(){
	$n = rand(2,1000);
	if(!isset($_SESSION['game'])){
		$l1 = [2, "-", 2 ,"-" ];
		$l2 = [2, $n, 2 ,"-" ];
		$l3 = [2, "-", 2 ,"-" ];
		$l4 = [2, "-", 2 ,"-" ];
		$_SESSION['game'] = [$l1,$l2,$l3,$l4]; 
	}

	echo getTable();

}

function getTable(){
	$y =  $_SESSION['game']; 
	var_dump($y[0][0]);
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
}


move();

?>