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

?>