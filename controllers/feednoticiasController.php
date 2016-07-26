<?php

class feednoticiasController extends controller {

	public function __construct() {
		parent::__construct();

	}

	public function index() {
		$dados = array();
		$feednoticias = new feednoticias();
		$dados['feednoticias'] = $feednoticias->listarFeedTodosOsAmigos();
		$this->loadTemplate("feednoticias", $dados);
	}

	public function postar(){
		if (!isset($_POST['texto'])){
			$this->loadView('feednoticias', $dados);
		} else {
			$texto = addslashes($_POST['texto']);
			$diaDeHoje = date("dmY");
			$horaDeHoje = date("His");
			$usuarioLogado = $_SESSION['idusuario'];

			$feednoticias = new feednoticias();
			$feednoticias->criarFeed($texto, $diaDeHoje, $usuarioLogado, $horaDeHoje);

			header("Location: /");
		}
	}

	public function curtirPost($idPostCurtir) {
		$feednoticias = new feednoticias();
		$feednoticias->curtirPostagemDosAmigos($idPostCurtir);

		header("Location: /");
	}

	public function excluirPost($idPostExcluir) {
		$feednoticias = new feednoticias();
		$feednoticias->excluirPostagemMinha($idPostExcluir);
		header("Location: /");
	}
}