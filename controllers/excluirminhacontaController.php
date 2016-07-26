<?php

class excluirminhacontaController extends controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index(){
		$dados = array();

		$this->loadTemplate("excluirminhaconta", $dados);
	}

	public function excluirConta(){
		$dados = array();
		$usuario = new usuario();
		$usuario->excluirConta();
		session_destroy();
		$this->loadView("loginview", $dados);
	}
}