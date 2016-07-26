<?php
class controller {

	protected $db;

	public function __construct() {
		global $config;
		$this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	}
	
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		$idUsuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM usuarios WHERE usuarios_id = '$idUsuarioLogado'";
		$sql = $this->db->query($sql);

		$dadosUsuarioLogado = array();
		if($sql->rowCount() > 0) {
			$dadosUsuarioLogado = $sql->fetch();
		}
		include 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}
}