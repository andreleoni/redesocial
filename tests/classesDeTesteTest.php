<?php

class classeDeTeste extends PHPUnit_Framework_TestCase {
  
	public function testeDaFuncaoMaskDaClasseModel(){ 
		date_default_timezone_set('America/Sao_Paulo');
		$classesDoSistema = new classesDoSistema();
		$this->assertEquals("08/08/2008", $classesDoSistema->mask("08082008", "##/##/####"));
    }

    public function testeDaFuncaoCalcularIdadeDaClasseModel(){
    	$classesDoSistema = new classesDoSistema();
    	$this->assertEquals("23", $classesDoSistema->calcularIdade("28/08/1992"));
    }
    
    public function testeDaFuncaoVerificarEnderecoEmailDaClasseModel(){
        $classesDoSistema = new classesDoSistema();
        $true = $classesDoSistema->verificarEnderecoEmail("andre@gmail.com");
        $false = $classesDoSistema->verificarEnderecoEmail("andre222");
        $this->assertNotFalse($false);
		$this->assertFalse($true);
	}


}