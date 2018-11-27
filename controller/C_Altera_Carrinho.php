<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/carrinhoDAO.php");
	include_once("../model/carrinho.php");
	
	//Capturar dados
	$qtd = $_POST["qtd"];
	$idProduto = $_GET["idProduto"];
	$idCliente = $_GET["idCliente"];
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();

	$c1 = new Carrinho($qtd, $idCliente, $idProduto);

	//Realizar Operação
	$carrinhoDAO = new CarrinhoDAO();
	$carrinhoDAO->alterar($link, $c1);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cart.php';</script>";
?>
