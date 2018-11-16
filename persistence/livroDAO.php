<?php
	include_once("../model/livro.php");
	
	class LivroDAO{
		function __construct(){
		}
		function cadastrar($link, $l){
			$insert = "insert into produto (nome, autor, preco, condicao, descricao, capa, quantidade)
						values ('".$l->getNome()."', '".$l->getAutor()."', ".$l->getPreco().", '".$l->getCondicao()."', '".$l->getDescricao()."', '".$l->getCapa()."', '".$l->getQuantidade()."')";
			if(!mysqli_query($link, $insert)){
				die("Não foi possível salvar o cadastro do livro".mysqli_error($link));
			}
		}
	}
?>