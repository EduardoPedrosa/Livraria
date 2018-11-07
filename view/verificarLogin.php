<?php
	if(!isset($_SESSION["login"])){
			echo "<script>alert('Voce precisa estar logado para fazer compras');window.location.href='login.php';</script>";
	}
?>