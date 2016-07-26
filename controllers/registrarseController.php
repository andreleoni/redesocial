<?php
class registrarseController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array();
		$model = new model();
		$usuario = new usuario();

		if (isset($_SESSION["userinvalido"])) {
			unset($_SESSION["userinvalido"]); 
		}
		
		if (!isset($_POST['registrarse'])){
			$this->loadView('registrarse', $dados);
		} else {
			if (empty($_POST['nomecompleto'])) {
				$_SESSION["statusNovoRegistro"] = "Por favor, preencha o seu nome.";
				header("Location: /registrarse");
			} else if (($model->verificarEnderecoEmail($_POST['email'])) || empty($_POST['email'])) {
				$_SESSION["statusNovoRegistro"] = "Preencha um E-mail válido.";
				header("Location: /registrarse");
			} else if ($usuario->verificarSeEmailJaExiste(addslashes($_POST['email']))) {
				$_SESSION["statusNovoRegistro"] = "Email já existe em nosso banco de dados, favor cadastrar outro e-mail.";
				header("Location: /registrarse");
			}
			 else if((($_POST['dia'] < 0) || ($_POST['dia'] > 31)) || empty($_POST['dia'])) { 
				$_SESSION["statusNovoRegistro"] = "Preencha um dia válido.";
				header("Location: /registrarse");
			} else if ((($_POST['mes'] < 0) || ($_POST['mes'] > 12)) || empty($_POST['mes'])) {
				$_SESSION["statusNovoRegistro"] = "Preencha um mês válido.";
				header("Location: /registrarse");
			} else if ((($_POST['ano'] < 1900) || ($_POST['ano'] > 2015)) || empty($_POST['ano'])) {
				$_SESSION["statusNovoRegistro"] = "Preencha um ano válido.";
				header("Location: /registrarse");
			} else if (empty($_POST['senha'])){
				$_SESSION["statusNovoRegistro"] = "Por favor, preencha uma senha válida.";
				header("Location: /registrarse");
			} else {			
				$nomecompleto = addslashes($_POST['nomecompleto']);
				$email = addslashes($_POST['email']);
				$dia = addslashes($_POST['dia']);
				$mes = addslashes($_POST['mes']);
				$ano = addslashes($_POST['ano']);
				$senha = addslashes($_POST['senha']);	
				$usuario->criarnovousuario($nomecompleto, $email, $senha, $dia, $mes, $ano);

				$_SESSION['userinvalido'] = "Usuário criado com sucesso.";
				header("Location: /");
			}
		}
	}
}