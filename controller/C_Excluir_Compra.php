<?php
	include_once("../model/cliente.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/compraDAO.php");
    
	$id = $_GET["id"];
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
    $compraDAO = new compraDAO();
	$compraDAO->excluir($link, $id);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/pedidos.php';window.alert('Excluido com sucesso');</script>";
?>
