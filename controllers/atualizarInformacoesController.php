<?php

class atualizarinformacoesController extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$dados = array();
		$usuario = new usuario();
		$dados['atualizarinformacoes'] = $usuario->listarInformacoesPessoasMeuPerfil();

		$this->loadTemplate("atualizarinformacoes", $dados);
	}

	public function atualizarInformacoes(){
		$model = new model();
		if (empty($_POST['nomecompleto'])) {
			$_SESSION["statusAlterarRegistro"] = "Por favor, preencha o seu nome.";
			header("Location: /atualizarInformacoes");
		} else if (($model->verificarEnderecoEmail($_POST['email'])) || empty($_POST['email'])) {
			$_SESSION["statusAlterarRegistro"] = "Preencha um E-mail válido.";
			header("Location: /atualizarInformacoes");
		} else if((($_POST['dia'] < 0) || ($_POST['dia'] > 31)) || empty($_POST['dia'])) { 
			$_SESSAION["statusAlterarRegistro"] = "Preencha um dia válido.";
			header("Location: /atualizarInformacoes");
		} else if ((($_POST['mes'] < 0) || ($_POST['mes'] > 12)) || empty($_POST['mes'])) {
			$_SESSION["statusAlterarRegistro"] = "Preencha um mês válido.";
			header("Location: /atualizarInformacoes");
		} else if ((($_POST['ano'] < 1900) || ($_POST['ano'] > 2015)) || empty($_POST['ano'])) {
			$_SESSION["statusAlterarRegistro"] = "Preencha um ano válido.";
			header("Location: /atualizarInformacoes");
		} else {
			$nomecompleto = addslashes($_POST['nomecompleto']);
			$email = addslashes($_POST['email']);
			$dia = addslashes($_POST['dia']);
			$mes = addslashes($_POST['mes']);
			$ano = addslashes($_POST['ano']);
			$descricao = addslashes($_POST['descricao']);
			$usuario = new usuario();

			if (isset($_FILES['fotoperfil']['name']) && $_FILES['fotoperfil']['error'] == 0 ) { 
				$arquivo_tmp = $_FILES['fotoperfil']['tmp_name'];
				$nome = $_FILES['fotoperfil']['name'];
				
				$extensao = pathinfo($nome, PATHINFO_EXTENSION);
				$extensao = strtolower($extensao);
				
				if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
					$novoNome = uniqid(time()).".".$extensao;
					$destino = 'assets/images/usuarios/'.$novoNome;
					move_uploaded_file($arquivo_tmp, $destino);
				}
			}
			$_SESSION["statusAlterarRegistro"] = "Dados Alterados com Sucesso.";
			$usuario->atualizarInformacoes($nomecompleto, $email, $descricao, $dia, $mes, $ano, $novoNome);
			header("Location: /meuperfil");		
		}
	}
}