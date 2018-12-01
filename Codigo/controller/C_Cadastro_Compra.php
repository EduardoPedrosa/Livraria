<?php
	session_start();
	include_once("../model/compra.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/compraDAO.php");
	include_once("../persistence/carrinhoDAO.php");
	
	//Capturar dados
	$numCartao = $_POST["numCartao"];
	$nomCartao = $_POST["nomCartao"];
	$codigoSeguranca = $_POST["codigoSeguranca"];
	$numParcelas = $_POST["numParcelas"];
	$idTransportadora = $_POST["transportadora"];
	$login = $_SESSION["login"];
	$idCliente = $login[0];
	$data = date ("Y-m-d");

	//Instanciar objeto
	$c1 = new Compra($idCliente, $numCartao, $nomCartao, $codigoSeguranca, $numParcelas, $idTransportadora, $data);
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$compraDAO = new CompraDAO();
	$compraDAO->cadastrar($link, $c1);

	$carrinhoDAO = new CarrinhoDAO();
	$carrinhoDAO->limparCarrinho($link, $idCliente);
	
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/index.php';window.alert('Compra realizada com sucesso');</script>";

?>
