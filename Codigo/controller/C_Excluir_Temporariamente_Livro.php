<?php
    include_once("../persistence/connection.php");
    include_once("../persistence/livroDAO.php");
    session_start();
    $idProduto = $_GET["idProduto"];
    $idPedido = $_GET["idPedido"];

    $idProduto = $idProduto.$idPedido.'*';
    $_SESSION[$idProduto] = true;
    header('Location: ../view/detalhesPedido.php?id='.$idPedido);
?>