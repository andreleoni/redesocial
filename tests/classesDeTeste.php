<?php

class classesDeTeste {

	function mask($val, $mask){
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k]))
					$maskared .= $val[$k++];
			} else {
				if(isset($mask[$i]))
					$maskared .= $mask[$i];
			}
		}
		return $maskared;
	}

	public function calcularIdade($dataNascimento) {
		list($dia, $mes, $ano) = explode('/', $dataNascimento);
		$diaDeHoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$diaDeNascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
		$idade = floor((((($diaDeHoje - $diaDeNascimento) / 60) / 60) / 24) / 365.25);
		return $idade;
	}	
	
	public function verificarEnderecoEmail($enderecoDeEmail) {  
		if(filter_var($enderecoDeEmail, FILTER_VALIDATE_EMAIL)) { 
			return false; 
		} else { 
			return true; 
		}
	}
}
