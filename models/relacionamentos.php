<?php

class relacionamentos extends model {
	
	function __construct() {
		parent::__construct();
	}

	public function verificarUsuariosEmRelacionamento(){
		$idUsuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM relacionamentos WHERE (relacionamentos_idadicinou = $idUsuarioLogado
		OR relacionamentos_idadicionado = $idUsuarioLogado)";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
			return $dados;
		} else {
			return $dados = array();
		}
	}

	public function verificarUsuariosAmigos(){
		$idUsuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM relacionamentos WHERE (relacionamentos_idadicinou = $idUsuarioLogado
		OR relacionamentos_idadicionado = $idUsuarioLogado) AND (relacionamentos_situacao = '1')";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
			return $dados;
		} else {
			return $dados = array();
		}
	}

	public function verificarQuemSaoMeusAmigos(){
		$idUsuarioLogado = $_SESSION['idusuario'];
		$dados = $this->verificarUsuariosEmRelacionamento();
		
		$usuariosPesquisar = array();
		foreach ($dados as $usuarios_amigos) {
			$usuariosPesquisar[] = $usuarios_amigos['relacionamentos_idadicinou'];
			$usuariosPesquisar[] = $usuarios_amigos['relacionamentos_idadicionado'];
		}
		
		if(count($usuariosPesquisar) > 0) {
			$sql = "SELECT usuarios_id,usuarios_id,usuarios_nomecompleto,usuarios_datanascimento,usuarios_descricao,usuarios_imagem FROM usuarios WHERE (usuarios_id IN (".implode(',', $usuariosPesquisar).")) AND !(usuarios_id = '$idUsuarioLogado')";
			$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0) {
				$usuariosAmigos= $sql->fetchAll();
				return $usuariosAmigos;
			} else {
				return $usuariosAmigos = array();
			}
		}  
	}

	public function verificarStatusRelacionamento($idusuarioadicionou) {
		$idUsuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM relacionamentos WHERE (relacionamentos_idadicinou = $idusuarioadicionou
		OR relacionamentos_idadicionado = $idusuarioadicionou) AND (relacionamentos_idadicinou = $idUsuarioLogado
		OR relacionamentos_idadicionado = $idUsuarioLogado)";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$situacaoDoRelacionamento = $sql->fetch();
			return $situacaoDoRelacionamento;
		} else {
			return $situacaoDoRelacionamento = array();
		}
	}

	public function adicionarNovoAmigo ($idUsuarioLogadoFazerAmizade, $idDoUsuarioASerAmigo, $diaDeHoje){
		$sql = "INSERT INTO relacionamentos SET relacionamentos_idadicinou = '$idUsuarioLogadoFazerAmizade', relacionamentos_idadicionado = '$idDoUsuarioASerAmigo', relacionamentos_situacao = '0', relacionamentos_diarelacionamento = '$diaDeHoje'";
		$sql = $this->db->query($sql);
	}

	public function aprovarNovaAmizade($idRelacionamento){
		$sql = "UPDATE relacionamentos SET relacionamentos_situacao = '1' WHERE relacionamentos_id = '$idRelacionamento'";
		$sql = $this->db->query($sql);
	}

	public function listarTresAmigosParaPaginaInicial() {
		$idUsuarioLogado = $_SESSION['idusuario'];
		$dados = $this->verificarUsuariosAmigos();

		$usuariosPesquisar = array();
		foreach ($dados as $usuarios_amigos) {
			$usuariosPesquisar[] = $usuarios_amigos['relacionamentos_idadicinou'];
			$usuariosPesquisar[] = $usuarios_amigos['relacionamentos_idadicionado'];
		}

		if(count($usuariosPesquisar) > 0) {
			$sql = "SELECT usuarios_id,usuarios_id,usuarios_nomecompleto,usuarios_datanascimento,usuarios_descricao,usuarios_imagem FROM usuarios WHERE (usuarios_id IN (".implode(',', $usuariosPesquisar).")) AND !(usuarios_id = '$idUsuarioLogado') order by rand() limit 3";
			$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0) {
				$usuariosAmigos= $sql->fetchAll();
				return $usuariosAmigos;
			} else {
				return $usuariosAmigos = array();
			}
		}  
	}

	public function listarPessoasNoTemplate() {
		$idUsuarioLogado = $_SESSION['idusuario'];
		$sql = "SELECT * FROM usuarios WHERE !(usuarios_id like $idUsuarioLogado) order by rand() limit 8";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$usuariosAmigos= $sql->fetchAll();
			return $usuariosAmigos;
		} else {
			return $usuariosAmigos = array();
		}
	}
}