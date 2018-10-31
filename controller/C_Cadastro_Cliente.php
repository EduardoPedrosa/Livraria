<?php
	include_once("../model/cliente.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/clienteDAO.php");
	
	//Capturar dados
	$nome = $_POST["Cnome"];
	$cpf = $_POST["Ccpf"];
	$email = $_POST["Cemail"];
	$senha = $_POST["Csenha"];
	$rua = $_POST["Crua"];
	$numero = $_POST["Cnumero"];	
	$bairro = $_POST["Cbairro"];
	$cidade = $_POST["Ccidade"];	
	$telefone = $_POST["Ctelefone"];
	
	//Instanciar objeto
	$f1 = new Cliente($nome, $cpf, $email, $senha, $rua, $numero, $bairro, $cidade, $telefone);
	echo $f1->getNome()."<br>";
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "aluno", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$funcDAO = new ClienteDAO();
	$funcDAO->cadastrar($link, $f1);
?>
