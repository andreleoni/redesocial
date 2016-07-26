<?php

class todososusuariosController extends controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$idUsuarioLogado = $_SESSION['idusuario'];

		if (isset($_POST['usuarioPesquisado'])){
			$usuarioDoPesquisar = $_POST['usuarioPesquisado'];	
			$sql = "SELECT * FROM usuarios where (usuarios_nomecompleto like '%$usuarioDoPesquisar%') AND !(usuarios_id like $idUsuarioLogado)";
		} else {
			$sql = "SELECT * FROM usuarios WHERE !(usuarios_id like $idUsuarioLogado)";
		}
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$todososusuarios['todososusuarios'] = $sql->fetchAll();
		} else {
			$todososusuarios['todososusuarios'] = '';
		}
		$this->loadTemplate("todososusuarios", $todososusuarios);
	}
}

