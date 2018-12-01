<?php 
    include_once("../persistence/connection.php");
    include_once("../persistence/adminDAO.php");
    
    $login = $_POST["email"];
    $senha =  $_POST["password"];
    
    $connection = new Connection("localhost", "root", "", "Livraria");
    $link = $connection->getLink();
    
    $adminDAO = new AdminDAO();
    $adminDAO->consultarLogin($link, $login, $senha);
    
?>