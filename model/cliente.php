<?php
	class Cliente{
		var $nome, $cpf, $email, $senha, $rua, $numero, $bairro, $cidade, $telefone;
		function __construct($nome, $cpf, $email, $senha, $rua, $numero, $bairro, $cidade, $telefone){
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->email = $email;
			$this->senha = $senha;
			$this->rua = $rua;
			$this->numero = $numero;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->telefone = $telefone;
		}
		function getNome(){
			return $this->nome;
		}
		function getCpf(){
			return $this->cpf;
		}
		function getEmail(){
			return $this->email;
		}
		function getSenha(){
			return $this->senha;
		}
		function getRua(){
			return $this->rua;
		}
		function getNumero(){
			return $this->numero;
		}
		function getBairro(){
			return $this->bairro;
		}
		function getCidade(){
			return $this->cidade;
		}
		function getTelefone(){
			return $this->telefone;
		}
	}
?>
