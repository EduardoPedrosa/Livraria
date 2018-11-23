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

		function cadastrar($link, $quantidade, $idCliente, $idProduto){
			$insert = "insert into carrinho (quantidade,idCliente,idProduto) values(".$quantidade.", ".$idCliente.", ".$idProduto.")";
				if(!mysqli_query($link, $insert)){
					die("Não foi possivel adicionar item".mysqli_error($link));
				}
				echo "<script language='javascript' type='text/javascript'>window.location.href='../view/index.php'</script>";
		}

		function excluir($link, $idProduto, $idCliente){
			$delete = "delete from carrinho where idProduto = '".$idProduto."' and idCliente = '".$idCliente."'";
			if(!mysqli_query($link, $delete)){
				die("Não foi possivel excluir".mysqli_error($link));
			}
		}
	}
?>