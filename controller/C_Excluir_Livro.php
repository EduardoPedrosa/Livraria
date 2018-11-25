<?php
	include_once("../persistence/connection.php");
    include_once("../persistence/livroDAO.php");
    
    $id = $_GET["id"];

	//Conectar BD
	$connection = new Connection("localhost", "root", "", "Livraria");
	$link = $connection->getLink();
	
	//Realizar Operação
	$livDao = new LivroDAO();
	$livDao->excluir($link, $id);
	echo"<script language='javascript' type='text/javascript'>window.location.href='../view/tabelaLivros.php';window.alert('Excluido com sucesso');</script>";
?>
