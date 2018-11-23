<?php
	session_start();
	include_once("../persistence/carrinhoDAO.php");
	include_once("../persistence/connection.php");
	if(!isset($_SESSION["login"])){
			echo "<script>alert('Voce precisa estar logado para fazer compras');window.location.href='login.php';</script>";
	} else {
		$quantidade = $_POST["qtd"];
		$login = $_SESSION["login"];
		$idCliente = $login[0];
		$idProduto = $_GET["id"];

		
		$connection = new Connection("localhost", "root", "", "Livraria");
		$link = $connection->getLink();

		$carrinhoDAO = new CarrinhoDAO();
		$carrinhoDAO->cadastrar($link, $quantidade, $idCliente, $idProduto);
	}
?>