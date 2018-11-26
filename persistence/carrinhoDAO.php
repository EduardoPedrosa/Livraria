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
			$select = "SELECT * FROM carrinho WHERE idProduto=".$idProduto." and idCliente=".$idCliente;
			$verifica = mysqli_query($link, $select);
			if (mysqli_num_rows($verifica)<=0){
				$insert = "insert into carrinho (quantidade,idCliente,idProduto) values(".$quantidade.", ".$idCliente.", ".$idProduto.")";
				if(!mysqli_query($link, $insert)){
					die("Não foi possivel adicionar item".mysqli_error($link));
				}
				echo "<script language='javascript' type='text/javascript'>window.location.href='../view/index.php'</script>";
			} else {
				echo"<script language='javascript' type='text/javascript'>window.location.href='../view/cart.php';window.alert('Item já está no carrinho');</script>";
			}
		}

		function alterar($link, $qtd, $idProduto, $idCliente){
			$select = "SELECT quantidade FROM produto WHERE idProduto=".$idProduto;
			$result = mysqli_query($link, $select);
			$array = mysqli_fetch_array($result);
			if($array[0] >= $qtd){
				$alterar = "update carrinho set quantidade=".$qtd." where idProduto=".$idProduto." and idCliente=".$idCliente;
				if(!mysqli_query($link, $alterar)){
					die("Não foi possivel alterar a quantidade".mysqli_error($link));
				}
			} else {
				echo "<script>alert('Quantidade de produtos requeridos nao disponivel no estoque');window.location.href='../view/cart.php';</script>";
			}
		}

		function excluir($link, $idProduto, $idCliente){
			$delete = "delete from carrinho where idProduto = '".$idProduto."' and idCliente = '".$idCliente."'";
			if(!mysqli_query($link, $delete)){
				die("Não foi possivel excluir".mysqli_error($link));
			}
		}
	}
?>