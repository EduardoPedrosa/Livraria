<?php
	class Compra{
		var $idCliente, $numCartao, $nomCartao, $codigoSeguranca, $numParcelas, $idTransportadora, $data;
		function __construct($idCliente, $numCartao, $nomCartao, $codigoSeguranca, $numParcelas, $idTransportadora, $data){
			$this->idCliente = $idCliente;
			$this->numCartao = $numCartao;
			$this->nomCartao = $nomCartao;
			$this->codigoSeguranca = $codigoSeguranca;
			$this->numParcelas = $numParcelas;
			$this->idTransportadora = $idTransportadora;
			$this->data = $data;
		}
		function getIdCliente(){
			return $this->idCliente;
		}
		function getNumCartao(){
			return $this->numCartao;
		}
		function getNomCartao(){
			return $this->nomCartao;
		}
		function getCodigoSeguranca(){
			return $this->codigoSeguranca;
		}
		function getNumParcelas(){
			return $this->numParcelas;
		}
		function getIdTransportadora(){
			return $this->idTransportadora;
		}
		function getData(){
			return $this->data;
		}
	}
?>
