<?php
	class CarrinhoDAO{
		function buscarItens($link,$idCliente){
			$consulta = "select carrinho.idProduto, nome, autor, preco, capa, carrinho.quantidade from carrinho JOIN produto ON produto.idProduto = carrinho.idProduto where idCliente=".$idCliente;
			$r = mysqli_query($link,$consulta);
			if(!$r){
				die("Não foi possivel consultar os livros".mysqli_error($link));
			}
			return $r;
		}
	}
?>