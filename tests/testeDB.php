<?php

class testeDB extends PHPUnit_Extensions_Database_TestCase {

	private $conexao = null;

	public function getConnection() {
		if(!$this->conexao) {
			global $config;
			$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
			$this->conexao = $this->createDefaultDBConnection($db, "redesocial");
		}
		return $this->conexao;     
	}

	public function getDataSet() {
		return $this->createXMLDataSet("xmlTesteDB.xml");
	}

	public function consultaDeDadosDeTeste() {
		$conexao = $this->getConnection()->getConnection();

		$query = $conexao->query('SELECT * FROM usuarios');
		$dados = $query->fetchAll(PDO::FETCH_ASSOC);

		$this->assertCount(1, $dados);
		$this->assertEquals('Andre', $dados[0]['usuarios_nomecompleto']);
	}	
}
