<?php
	include_once("../model/livro.php");
	include_once("../persistence/livroDAO.php");
	include_once("../persistence/connection.php");
	
	$nome = $_POST["nome"];
	$autor = $_POST["autor"];
	$descricao = $_POST["descricao"];
	$condicao = $_POST["condicao"];
	$preco = $_POST["preco"];
	$quantidade = $_POST["quantidade"];
	$capa = $_FILES["capa"]['tmp_name'];
	$tamanho = $_FILES["capa"]["size"];

	if ( $capa != "none" )
	{
		$fp = fopen($capa, "rb");
		$conteudo = fread($fp, $tamanho);
		$conteudo = addslashes($conteudo);
		fclose($fp);

		$l1 = new Livro($nome, $autor, $preco, $condicao, $descricao, $conteudo, $quantidade);
		
		$connection = new Connection("localhost", "root", "", "Livraria");
		$link = $connection->getLink();
		
		$livDAO = new LivroDAO();
		$livDAO->cadastrar($link, $l1);
		echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cadastrarLivro.php';window.alert('Cadastro realizado com sucesso');</script>";
	} else {
		echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cadastrarLivro.php';window.alert('Não foi possível realizar cadastro');</script>";
	}
?>