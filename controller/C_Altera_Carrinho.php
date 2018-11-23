<?php
	include_once("../persistence/connection.php");
	include_once("../persistence/carrinhoDAO.php");
	
	//Capturar dados
	$qtd = $_POST["qtd"];
	$idProduto = $_GET["idProduto"];
	$idCliente = $_GET["idCliente"];
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$carrinhoDAO = new CarrinhoDAO();
	$carrinhoDAO->alterar($link, $qtd, $idProduto, $idCliente);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cart.php';</script>";
?>
