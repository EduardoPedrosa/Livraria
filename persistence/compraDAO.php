<?php
	include_once("../model/compra.php");
	include_once("../persistence/carrinhoDAO.php");

	class CompraDAO{

		function cadastrar($link, $c1){
			$insert = "insert into compra (idCliente, numeroCartao, nomeCartao, codigoSeguranca, numeroParcelas, idTransportadora, data)
					   values('".$c1->getIdCliente()."', '".$c1->getNumCartao()."', '".$c1->getNomCartao()."', '".$c1->getCodigoSeguranca()."', '".$c1->getNumParcelas()."', ".$c1->getIdTransportadora().", '".$c1->getData()."')"; 
			if(!mysqli_query($link, $insert)){
				die("Não foi possivel salvar o cadastro".mysqli_error($link));
			}

			$select = "select max(idCompra) as idCompra from compra";
			$result = mysqli_fetch_array(mysqli_query($link, $select));
			$idCompra = $result[0];

			$select = "select quantidade, idProduto from carrinho where idCliente='".$c1->getIdCliente()."'";
			$result = mysqli_query($link, $select);
			while($row = mysqli_fetch_array($result)){
				$insert = "insert into compra_produto (idCompra, idProduto, quantidade)
							values (".$idCompra.", ".$row[1].", ".$row[0].")";
				if(!mysqli_query($link, $insert)){
					die("Não foi possivel salvar o cadastro".mysqli_error($link));
				}
				$select = "select quantidade from produto where idProduto ='".$row[1]."'";
				$result = mysqli_query($link, $select);
				$array = mysqli_fetch_array($result);
				$qtd = $array[0];
				
				$alterar = "update produto set quantidade='".($qtd - $row[0])."' where idProduto='".$row[1]."'";
				if(!mysqli_query($link, $alterar)){
					die("Não foi possivel alterar o livro".mysqli_error($link));
				}
			}

		}

		function consultar($link, $id){
		}

		function consultarTodos($link,$chave){
		}
		
		function alterar($link, $livro, $id){
		}
		
		function excluir($link, $id){

		}
	}
?>