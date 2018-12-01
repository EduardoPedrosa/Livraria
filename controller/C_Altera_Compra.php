<?php
	include_once("../model/livro.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/compraDAO.php");
    include_once("../persistence/livroDAO.php");

    //Capturar dados
    $id = $_POST["identificador"];
    $nCartao = $_POST["nCartao"];
    $nomeCartao = $_POST["nomeCartao"];
    $cvv = $_POST["cvv"];
    $idTransp = $_POST["transportadora"];

	//Instanciar objeto
	$compra = new compra('', $nCartao, $nomeCartao, $cvv, '', $idTransp, ''); //no lugar dos itens que não são capazes de ser alterados foi colocado aspas
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
    $livDAO = new livroDAO();
    $livroPed = $livDAO->consultarPorPedido($link, $id);

	$compraDAO = new compraDAO();
    $compraDAO->alterar($link, $id, $compra, $livroPed);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/pedidos.php';window.alert('Alterado com sucesso');</script>";
?>
