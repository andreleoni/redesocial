<?php

	/*
		Variável utilizada verificar qual banco de dados está sento utilizado, neste caso, está sendo utilizado o em "Desenvolvimento", quando o sistema for para o servidor em operação, o status será alterado para "Em operação", e no arquivo db.php ele irá utilizar o outro nome do banco de dados setado. 
	*/

	define("AMBIENTE", "development");
?>