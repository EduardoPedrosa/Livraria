<?php
	session_start();
	include_once("../persistence/carrinhoDAO.php");
	include_once("../persistence/connection.php");
	if(!isset($_SESSION["login"])){
			echo "<script>alert('Voce precisa estar logado para fazer compras');window.location.href='../view/login.php';</script>";
	} else {
		$quantidade = $_POST["qtd"];
		$login = $_SESSION["login"];
		$idCliente = $login[0];
		$idProduto = $_GET["id"];
		$qtdDisponivel = $_GET["quant"];
		if($qtdDisponivel >= $quantidade){
			$connection = new Connection("localhost", "root", "", "Livraria");
			$link = $connection->getLink();

			$carrinhoDAO = new CarrinhoDAO();
			$carrinhoDAO->cadastrar($link, $quantidade, $idCliente, $idProduto);
		} else {
			echo"<script language='javascript' type='text/javascript'>window.location.href='../view/product-details.php?id=".$idProduto."';window.alert('A quantidade de produtos requeridos nao esta disponivel no estoque');</script>";
			
		}
	}
?>