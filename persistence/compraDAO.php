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
				$resultado = mysqli_query($link, $select);
				$array = mysqli_fetch_array($resultado);
				$qtd = $array[0];
				
				$alterar = "update produto set quantidade='".($qtd - $row[0])."' where idProduto='".$row[1]."'";
				if(!mysqli_query($link, $alterar)){
					die("Não foi possivel alterar o livro".mysqli_error($link));
				}
			}
		}

		function consultarComprasCliente($link,$id){
			$select = "SELECT * from compra WHERE idCliente =".$id;
			$r = mysqli_query($link, $select);
			if(!$r){
				die("Não foi possível encontrar suas compras".mysqli_error($link));
			}
			return $r;
		}
		
		function calcularPrecoTotal($link, $idCompra){
			$select = "SELECT cp.quantidade, p.preco, t.preco from compra_produto as cp join produto as p 
					join compra as c join transportadora as t on (cp.idProduto = p.idProduto AND cp.idCompra = c.idCompra
					AND c.idTransportadora = t.idTransportadora) WHERE cp.idCompra =".$idCompra;
			$result = mysqli_query($link, $select);
			if(!$result){
				die("Não foi possível calcular preço".mysqli_error($link));
			}
			$vet = mysqli_fetch_array($result);
			$precoTotal = $vet[2]; //preco transportadora
			do{
				$quantidade = $vet[0];
				$precoLivro = $vet[1];
				$precoTotal += ($quantidade*$precoLivro);
			}while($vet = mysqli_fetch_array($result));
			return $precoTotal;
		}

		function consultarPorId($link, $id){
			$select = "SELECT * from compra WHERE idCompra=".$id;
			$r = mysqli_query($link, $select);
			if(!$r){
				die("Não foi possível consultar pedido".mysqli_error($link));
			}
			$row = mysqli_fetch_array($r);
			return $row;
		}

		function alterar($link, $idPedido, $compra, $livros){
			//primeiro verificar se há um livro excluido do pedido
			session_start();
			while($row = mysqli_fetch_array($livros)){
				if(isset($_SESSION[$row[6].$idPedido.'*'])){
					//primeiro pegando a quantidade para adicionar ao estoque
					$selectQuantidade = "SELECT quantidade FROM compra_produto WHERE idCompra=".$idPedido." AND idProduto=".$row[6];
					$r = mysqli_query($link, $selectQuantidade);
					if(!$r){
						die("Não foi possível realizar a alteração".mysqli_error($link));
					}
					$quantidade = mysqli_fetch_array($r);
					$updateProd = "UPDATE produto SET quantidade = quantidade + ".$quantidade[0]." WHERE idProduto =".$row[6];
					if(!mysqli_query($link, $updateProd)){
						die("Não foi possível alterar a quantidade de estoque dos livros".mysqli_error($link));
					} 
					//excluindo a coluna de compra_produto
					$deleteCP = "DELETE FROM compra_produto WHERE idCompra=".$idPedido." AND idProduto=".$row[6];
					if(!mysqli_query($link, $deleteCP)){
						die("Não foi possível realizar a alteração de compra_produto".mysqli_error($link));
					}
					unset($_SESSION[$row[6].$idPedido.'*']);
				}
			}
			//alterando os dados em compra
			$update = "UPDATE compra SET numeroCartao='".$compra->getNumCartao()."', nomeCartao = '".$compra->getNomCartao()."',
					codigoSeguranca='".$compra->getCodigoSeguranca()."', idTransportadora=".$compra->getIdTransportadora()."
					WHERE idCompra=".$idPedido;
			if(!mysqli_query($link, $update)){
				die("Não foi possível realizar a alteração".mysqli_error($link));
			}	
		}
		
		function excluir($link, $idCompra){
			$select = "SELECT p.idProduto, cp.quantidade from compra as c join compra_produto as cp join produto as p
					on (c.idCompra = cp.idCompra AND p.idProduto = cp.idProduto) WHERE c.idCompra=".$idCompra;
			$r = mysqli_query($link, $select);
			if(!$r){
				die("Não foi possível encontrar os produtos do pedido".mysqli_error($link));
			}
			//excluindo de compra_produto e atualizando estoque de produtos
			while($row = mysqli_fetch_array($r)){
				$idProduto = $row[0];
				$delete = "DELETE FROM compra_produto WHERE idCompra =".$idCompra." AND idProduto=".$idProduto;
				if(!mysqli_query($link, $delete)){
					die("Não foi possível excluir o produto".mysqli_error($link));
				}
				$quantidade = $row[1];
				$updateProd = "UPDATE produto SET quantidade = quantidade + ".$quantidade." WHERE idProduto =".$idProduto;
				if(!mysqli_query($link, $updateProd)){
					die("Não foi possível alterar a quantidade de estoque".mysqli_error($link));
				} 
			}
			//finalmente excluindo a compra
			$deleteCompra = "DELETE FROM compra WHERE idCompra=".$idCompra;
			if(!mysqli_query($link, $deleteCompra)){
				die("Não foi possível excluir a compra".mysqli_error());
			}
		}
	}
?>