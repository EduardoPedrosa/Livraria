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

		function consultar($link, $id){
			$consulta = "select * from produto where idProduto ='".$id."'";
			$r = mysqli_query($link, $consulta);
			if(!$r){
				die("Não foi possivel consultar o livro".mysqli_error($link));
			}
			$result = mysqli_fetch_array($r);
			return $result;
		}

		function consultarTodos($link,$chave){
			if($chave == ""){
				$consulta = "select idProduto, nome, preco, capa, autor, condicao, quantidade from produto";
				$r = mysqli_query($link,$consulta);
				if(!$r){
					die("Não foi possivel consultar os livros".mysqli_error($link));
				}
			} else {
				$consulta = "select idProduto, nome, preco, capa from produto 
					where nome like '%$chave%' or autor like '%$chave%'";
				$r = mysqli_query($link,$consulta);
				if(!$r){
					die("Não foi possivel consultar os livros".mysqli_error($link));
				}
			}
			return $r;
		}
		
		function alterar($link, $livro, $id){
			$alterar = "UPDATE produto SET nome ='".$livro->getNome()."', autor = '".$livro->getAutor()."',
						preco = '".$livro->getPreco()."', condicao = '".$livro->getCondicao()."', 
						descricao = '".$livro->getDescricao()."', quantidade= '".$livro->getQuantidade()."'
						WHERE idProduto = '".$id."'";
			if(!mysqli_query($link, $alterar)){
				die("Não foi possivel alterar o livro".mysqli_error($link));
			}
		}
		
		function excluir($link, $id){
			$excluir = "DELETE from produto WHERE idProduto = ".$id;
			if(!mysqli_query($link, $excluir)){
				die("Não foi possivel excluir o livro".mysqli_error($link));
			}
		}
	}
?>