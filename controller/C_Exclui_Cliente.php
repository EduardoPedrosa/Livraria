<?php
	include_once("../model/cliente.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/clienteDAO.php");
	
	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$clienteDAO = new ClienteDAO();
	session_destroy();
	$login = $_SESSION['login'];
	$email = $login[3];
	$clienteDAO->excluir($link, $email);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/index.php';window.alert('Excluido com sucesso'";
?>
