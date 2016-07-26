<?php

class feednoticias extends model {

	public function __construct() {
		parent::__construct();
	}

	public function criarFeed($texto, $diaDeHoje, $usuarioLogado, $horaDeHoje){
		$sql = "INSERT INTO posts SET posts_id_usuario = '$usuarioLogado', posts_datacriacao = '$diaDeHoje', posts_texto = '$texto', posts_hora = '$horaDeHoje'";
		$this->db->query($sql);
	}

	public function listarFeedTodosOsAmigos(){
		$idUsuarioLogado = $_SESSION['idusuario'];
		$relacionamentos = new relacionamentos();
		$dados = $relacionamentos->verificarUsuariosAmigos();

		$usuariosPesquisar = "";
		foreach ($dados as $usuarios_amigos) {
			$usuariosamigosadicionou = $usuarios_amigos['relacionamentos_idadicinou'];
			$usuariosamigosadicionado = $usuarios_amigos['relacionamentos_idadicionado'];
			
			if ($usuariosPesquisar == ""){
				$usuariosPesquisar = $usuariosamigosadicionou .",".$usuariosamigosadicionado;
			} else{
				$usuariosPesquisar = $usuariosPesquisar.",". $usuariosamigosadicionou .",".$usuariosamigosadicionado;
			}
		}

		if ($usuariosPesquisar == "") {
			$sql = "SELECT * FROM posts where (posts_id_usuario IN ($idUsuarioLogado)) order by (posts_hora + posts_datacriacao)  desc";
		} else {
			$sql = "SELECT * FROM posts where (posts_id_usuario IN ($usuariosPesquisar)) order by (posts_hora + posts_datacriacao)  desc";
		}
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0){
			$feeds = $sql->fetchAll();
			return $feeds;
		} else {
			return $feeds = array();
		}
	}

	public function excluirPostagemMinha($idMinhaPostagem){
		$usuarioLogado = $_SESSION['idusuario'];

		$sql = "DELETE FROM posts where posts_id = '$idMinhaPostagem' AND posts_id_usuario = '$usuarioLogado'";
		$sql = $this->db->query($sql);
	}

	public function curtirPostagemDosAmigos($idDaPostagem){
		$sql = "UPDATE FROM posts SET posts_like = 'posts_like + 1' WHERE posts_id = '$idDaPostagem'";
		$sql = $this->db->query($sql);
	}
}