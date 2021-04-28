<?php

function MontarTabuleiro($y){
	$labelColuna = [0,1,2,3,4,5,6,7];

	$labelLinha = [0,1,2,3,4,5,6,7];

	echo '<table class="table table-bordered table-hover table-stripped " style="text-align:center; font-size: 30px">';
	$teste = 0;
	for ($i = 0; $i<8; $i++){
		echo '<tr>';
		if ($i % 2 == 0){
			$teste = 0;
		}
		else{
			$teste = 1;
		}
		for ($j = 0; $j<8; $j++){


			if ($teste == 1 ){
				echo '<td style="background-color:#aaa">';

				echo '<div style="font-size:10px; font-weight:bold">'.$i . '-' . $j . '</div>';
				$teste = 0;
			}

			else {
				$teste = 1;
				echo '<td style="background-color:#fff">';
			}

			if ($y[$i][$j] == '0' || $y[$i][$j] == 'D'){
				echo "<img width='40' src='resources/images/black.png' >";

			}
			else if ($y[$i][$j] == 'X' || $y[$i][$j] == 'C'){
				echo "<img width='40' src='resources/images/white.png'>";
			}
			else{
				echo '<div style="height:50px">';
				echo '</div>';
			}

			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	echo '<div class="row">';
	echo '</div>';
	
}


function fazerMovimento($y, $origemLinha, $origemColuna, $destinoLinha, $destinoColuna){

	$y[$destinoLinha][$destinoColuna] = $y[$origemLinha][$origemColuna];
	$y[$origemLinha][$origemColuna] = '-';
	if ($destinoColuna - $origemColuna == 2 || $destinoColuna - $origemColuna == -2){

		$ColunaCapturada = (($destinoColuna - $origemColuna)/2) + $origemColuna;
		$LinhaCapturada  = (($destinoLinha - $origemLinha)/2) + $origemLinha;
		$y[$LinhaCapturada][$ColunaCapturada] = '-';

	}

	
	return $y;
}

function validaMovimento($y, $origemLinha, $origemColuna, $destinoLinha, $destinoColuna){
	
	if (

		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha][$destinoColuna] == '-'
		&& $destinoColuna == $origemColuna + 1  
		&& $destinoLinha == $origemLinha - 1 

		|| 

		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha][$destinoColuna] == '-'
		&& $destinoColuna == $origemColuna - 1  
		&& $destinoLinha == $origemLinha - 1

		||


		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha][$destinoColuna] == '-'
		&& $destinoColuna == $origemColuna + 1  
		&& $destinoLinha == $origemLinha + 1 

		|| 

		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha][$destinoColuna] == '-'
		&& $destinoColuna == $origemColuna - 1  
		&& $destinoLinha == $origemLinha + 1)
		
	{

		

		return true;

	}
	else if(
		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha-1][$destinoColuna-1] == 'X'
		&& $destinoColuna == $origemColuna + 2
		&& $destinoLinha == $origemLinha+2){


		$y[$destinoLinha-1][$destinoColuna-1] = '-';
		return true;

	}
	else if(
		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha-1][$destinoColuna+1] == 'X'
		&& $destinoColuna == $origemColuna - 2
		&& $destinoLinha == $origemLinha+2){

		$y[$destinoLinha-1][$destinoColuna+1] = '-';
		return true;

	}
	else if(
		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha+1][$destinoColuna-1] == '0'
		&& $destinoColuna == $origemColuna + 2
		&& $destinoLinha == $origemLinha-2){

		$y[$destinoLinha+1][$destinoColuna-1] = '-';
		return true;

	}
	else if(
		$y[$origemLinha][$origemColuna] == $_SESSION['turn']
		&& $y[$destinoLinha+1][$destinoColuna+1] == '0'
		&& $destinoColuna == $origemColuna - 2
		&& $destinoLinha == $origemLinha-2){

		$y[$destinoLinha+1][$destinoColuna+1] = '-';
		return true;

	}
	echo($y[$origemLinha][$origemColuna]);
	if($y[$origemLinha][$origemColuna] == 'D' || $y[$origemLinha][$origemColuna] == 'C'){
		if (abs($origemLinha - $destinoLinha) - abs($origemColuna - $destinoColuna) == 0){ 
			if($_SESSION['turn'] == 'X'){
				if($y[$origemLinha][$origemColuna] == 'C'){
					return true;
				}
			}
			else if($_SESSION['turn'] == '0'){
				if($y[$origemLinha][$origemColuna] == 'D'){
					return true;
				}
			}
		}
	}
	else
	{
		return false;
	}



}

function movimentarComBot($y){

	for ($j = 0; $j < 8; $j++ ){
		for ($i = 0; $i < 8; $i++){
			if ($y[$j][$i] == '0'){
				if ($i + 2 < 7){	
					if($y[$j + 1][$i + 1] == 'X' && $y[$j + 2][$i +2] == '-'){
						return fazerMovimento($y, $j, $i, $j+2, $i+2);
					}
				}
				else if($i - 2>0){
					if($y[$j + 1][$i - 1] == 'X' && $y[$j + 2][$i -2] == '-'){
						return fazerMovimento($y, $j, $i, $j+2, $i-2);

					}
				}
			}
		}
	}
	for ($j = 0; $j < 8; $j++ ){
		for ($i = 0; $i < 8; $i++){
			if ($y[$j][$i] == '0'){
				if ($i + 1 < 7 && $i - 1 > 0){					
					if($y[$j + 1][$i + 1] == '-'){
						return fazerMovimento($y, $j, $i, $j+1, $i+1);
					}
					else if($y[$j + 1][$i - 1] == '-'){
						return fazerMovimento($y, $j, $i, $j+1, $i-1);

					}

				}
			}
		}
	}

}




?>