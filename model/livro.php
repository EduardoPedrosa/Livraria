<?php 
	class Livro{
		var $nome, $autor, $preco, $condicao, $descricao, $capa, $quantidade;
		function __construct($nome, $autor, $preco, $condicao, $descricao, $capa, $quantidade){
			$this->nome = $nome;
			$this->autor = $autor;
			$this->preco = $preco;
			$this->condicao = $condicao;
			$this->descricao = $descricao;
			$this->capa = $capa;
			$this->quantidade = $quantidade;
		}
		function getNome(){
			return $this->nome;
		}
		function getAutor(){
			return $this->autor;
		}
		function getPreco(){
			return $this->preco;
		}
		function getCondicao(){
			return $this->condicao;
		}
		function getDescricao(){
			return $this->descricao;
		}
		function getCapa(){
			return $this->capa;
		}
		function getQuantidade(){
			return  $this->quantidade;
		}
	}
?>