<?php

class alterarsenhaController extends controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$dados = array ();
		$this->loadTemplate("alterarsenha", $dados);
	}

	public function alterarSenha() {
		$senhaOriginal = addslashes($_POST['senhaOriginal']);
		$senhaConfirmacao = addslashes($_POST['senhaConfirmacao']);
		$usuario = new usuario();

		if ($senhaOriginal == $senhaConfirmacao){
			$usuario->alterarSenha($senhaOriginal);	
		} else {
			echo "Dados nao conferem.";
		}
		header("Location: /meuperfil");
	}
}