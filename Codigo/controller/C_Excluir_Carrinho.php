<?php 
    include_once("../persistence/connection.php");
    include_once("../persistence/carrinhoDAO.php");
    
    $idProduto = $_GET["idProduto"];
    $idCliente =  $_GET["idCliente"];
    
    $connection = new Connection("localhost", "root", "", "Livraria");
    $link = $connection->getLink();
    
    $carrinhoDAO = new CarrinhoDAO();
    $carrinhoDAO->excluir($link, $idProduto, $idCliente);
    echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cart.php';window.alert('Excluido com sucesso');</script>";
?>