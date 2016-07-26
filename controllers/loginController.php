<?php

class loginController extends controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		if((!empty($email)) && (!empty($senha))) {
			$usuario = new usuario();
			
			$resultado = $usuario->verificarlogin($email, $senha);
			if ($resultado == true) {
				header("Location: /");
			} else {
				$_SESSION['userinvalido'] = 'Usuário ou Senha Incorretos';
				header("Location: /");
			}
		} else {
			$_SESSION['userinvalido'] = 'Usuário ou Senha Incorretos';
			header("Location: /");
		}
	}
}