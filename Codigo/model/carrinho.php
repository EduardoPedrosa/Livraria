<?php 
	class Carrinho{
		var $qtd, $idCliente, $idProduto;
		function __construct($qtd, $idCliente, $idProduto){
			$this->qtd = $qtd;
			$this->idProduto = $idProduto;
			$this->idCliente = $idCliente;
		}
		function getQtd(){
			return $this->qtd;
		}
		function getIdProduto(){
			return $this->idProduto;
		}
		function getIdCliente(){
			return $this->idCliente;
		}
	}
?>