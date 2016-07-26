<?php
class homeController extends controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$dados = array();
		
		if (!isset($_SESSION['idusuario'])){
			$this->loadView("loginview", $dados);
			
		} else {
			$feednoticias = new feednoticias();
			$dados['feednoticias'] = $feednoticias->listarFeedTodosOsAmigos();
			
			$this->loadTemplate("feednoticias", $dados);
		}
	}
}