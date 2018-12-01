<?php
    include_once("../persistence/livroDAO.php");
    include_once("../persistence/connection.php");
    session_start();

    $idPedido = $_GET["id"];

	$connection = new Connection("localhost", "root", "", "Livraria");
    $link = $connection->getLink();
    $livDAO = new livroDAO();
    $result = $livDAO->consultarPorPedido($link, $idPedido);
    while($row = mysqli_fetch_array($result)){
        if(isset($_SESSION[$row[6].$idPedido.'*'])){
            unset($_SESSION[$row[6].$idPedido.'*']);
        }
    }
    header('Location: ../view/pedidos.php?');
?>