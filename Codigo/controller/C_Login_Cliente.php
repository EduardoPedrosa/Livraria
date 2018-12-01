<?php 
    include_once("../persistence/connection.php");
    include_once("../persistence/clienteDAO.php");
    
    $login = $_POST["email"];
    $senha =  $_POST["password"];
    
    $connection = new Connection("localhost", "root", "", "Livraria");
    $link = $connection->getLink();
    
    $clienteDAO = new ClienteDAO();
    $clienteDAO->consultarLogin($link, $login, $senha);
    
?>