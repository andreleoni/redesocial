<?php

class usuario extends model{

	public function __construct() {
		parent::__construct();
	}
	
	public function verificarlogin($email, $senha) {
		$sql = "SELECT * FROM usuarios WHERE usuarios_email = '$email' AND usuarios_senha = MD5('$senha')";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
			$_SESSION['idusuario'] = $dados['usuarios_id']; 
			return true;
		} else {
			return false;
		}
	}

	public function verificarSeEmailJaExiste($emailDigitadoPeloUsuarioAoCriarLogin){
		$sql = "SELECT usuarios_email FROM usuarios WHERE usuarios_email = '$emailDigitadoPeloUsuarioAoCriarLogin'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			return true;
		} else {
			return false;
		}

	}

	public function criarnovousuario($nomecompleto, $email, $senha, $dia, $mes, $ano) {
		$dianascimento = $dia.$mes.$ano;
		$senha = md5($senha);
		$sql = "INSERT INTO usuarios SET usuarios_nomecompleto = '$nomecompleto', usuarios_email = '$email', usuarios_senha = '$senha', usuarios_datanascimento = '$dianascimento', usuarios_imagem = 'padrao.jpg'";
		$this->db->query($sql);
	}

	public function selecionarDonoDoPost($idDoDonoDoPost) {
		$sql = "SELECT * FROM usuarios where usuarios_id = '$idDoDonoDoPost'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$dados = $sql->fetch();
			return $dados;
		} else {
			return $dados = array();
		}
	}

	public function listarInformacoesPessoasMeuPerfil() {
		$usuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM usuarios where usuarios_id = '$usuarioLogado'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$dados = $sql->fetch();
			return $dados;
		}
	}

	public function alterarSenha($senha){
		$usuarioLogado = $_SESSION['idusuario'];
		$sql = "UPDATE usuarios SET usuarios_senha = MD5('$senha') WHERE usuarios_id = '$usuarioLogado'";
		$sql = $this->db->query($sql);
	}

	public function excluirConta(){
		if (isset($_SESSION['idusuario'])){
			$usuarioLogado = $_SESSION['idusuario'];
			$sql = "DELETE FROM posts where posts_id_usuario = '$usuarioLogado'";
			$this->db->query($sql);
			
			$sql = "DELETE FROM usuarios where usuarios_id = '$usuarioLogado'";
			$this->db->query($sql);

			$sql = "DELETE FROM relacionamentos where (relacionamentos_idadicinou = '$usuarioLogado' OR relacionamentos_idadicionado = '$usuarioLogado')";
			$this->db->query($sql);
			if (isset($_SESSION["userinvalido"])) {
				unset($_SESSION["userinvalido"]);
			}
		}
	}

	public function atualizarInformacoes($nomecompleto, $email, $descricao, $dia, $mes, $ano, $fotoperfil){
		$usuarioLogado = $_SESSION['idusuario'];
		$datadenascimento = $dia.$mes.$ano;
		if ($fotoperfil == ""){
			$sql = "UPDATE usuarios SET usuarios_nomecompleto = '$nomecompleto', usuarios_email = '$email', usuarios_descricao = '$descricao', usuarios_datanascimento = '$datadenascimento' WHERE usuarios_id = '$usuarioLogado'";
		} else {
			$sql = "UPDATE usuarios SET usuarios_nomecompleto = '$nomecompleto', usuarios_email = '$email', usuarios_descricao = '$descricao', usuarios_datanascimento = '$datadenascimento', usuarios_imagem = '$fotoperfil' WHERE usuarios_id = '$usuarioLogado'";
		}
		$sql = $this->db->query($sql);
	}
}