<?php
	include_once("../model/livro.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/livroDAO.php");
	
    //Capturar dados
    $id = $_POST["identificador"];
    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];
    $condicao = $_POST["condicao"];
    $preco = $_POST["preco"];

	
	//Instanciar objeto
	$l = new livro($nome, $autor, $preco, $condicao, $descricao, "", $quantidade); //no lugar de uma imagem na capa foi enviado "" pois não há como alterar a imagem
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$livDao = new LivroDAO();
    $livDao->alterar($link, $l, $id);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/tabelaLivros.php';window.alert('Alterado com sucesso');</script>";
?>
