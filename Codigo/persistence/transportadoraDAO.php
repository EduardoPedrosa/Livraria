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
		
		function consultarPorId($link, $id){
			$select = "SELECT * from transportadora WHERE idTransportadora=".$id;
			$r = mysqli_query($link, $select);
			if(!$r){
				die("Não foi possível consultar a transportadora".mysqli_error($link));
			}
			return $r;
		}
	}
?>