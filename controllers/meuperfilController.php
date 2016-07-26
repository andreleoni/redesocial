<?php

class meuperfilController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array();
		$usuario = new usuario();
		$dados['meuperfil'] = $usuario->listarInformacoesPessoasMeuPerfil();

		$this->loadTemplate("meuperfil", $dados);
		unset($_SESSION["statusAlterarRegistro"]);
	}

}