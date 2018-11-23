<?php
	class TransportadoraDAO{
		function consultar($link){
			$consulta = "select * from transportadora";
			$r = mysqli_query($link,$consulta);
			if(!$r){
				die("Não foi possivel consultar as transportadoras".mysqli_error($link));
			}
			return $r;
		}
	}
?>