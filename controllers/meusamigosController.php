<?php

class meusamigosController extends controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$dados = array();
		$relacionamentos = new relacionamentos();
		$usuariosAmigos['meusamigos'] = $relacionamentos->verificarQuemSaoMeusAmigos();
		$this->loadTemplate("meusamigos", $usuariosAmigos);
	}

	public function desfazerAmizade($idDoUsuarioQueSeraExcluido) {
		$idUsuarioLogadoExcluirAmizade = $_SESSION['idusuario'];
		$sql = "DELETE FROM relacionamentos WHERE (relacionamentos_idadicionado = $idDoUsuarioQueSeraExcluido OR relacionamentos_idadicinou = $idDoUsuarioQueSeraExcluido) AND (relacionamentos_idadicionado = $idUsuarioLogadoExcluirAmizade OR relacionamentos_idadicinou = $idUsuarioLogadoExcluirAmizade)";
		$sql = $this->db->query($sql);
		header("Location: /meusamigos");

	}

	public function adicionarAmigos($idDoUsuarioASerAmigo) {
		$idUsuarioLogadoFazerAmizade = $_SESSION['idusuario'];
		$diaDeHoje = date("dmY");
		$relacionamentos = new relacionamentos();
		$relacionamentos->adicionarNovoAmigo($idUsuarioLogadoFazerAmizade, $idDoUsuarioASerAmigo, $diaDeHoje);
		header("Location: /meusamigos");
	}

	public function aprovarAmizade($idRelacionamento) {
		$relacionamentos = new relacionamentos();
		$relacionamentos->aprovarNovaAmizade($idRelacionamento);
		header("Location: /meusamigos");
	}
}