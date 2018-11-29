<!DOCTYPE html>
<?php
    session_start();
    include_once("../persistence/connection.php");
    include_once("../persistence/livroDAO.php");
    include_once("../persistence/compraDAO.php");
    include_once("../persistence/transportadoraDAO.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Meus Pedidos | Livraria</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
	<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img class="icone" src="images/book-icon.png" alt="" />
                                <span class="fa titulo"> Livraria </span>
                            </a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php
								if(isset($_SESSION["login"])){
									$vet = $_SESSION["login"];
									$nome = $vet[1];
									echo "<li><a href='conta.php'><i class='fa fa-user'></i>".$nome."</a></li>";
									echo "<li><a href='cart.php'><i class='fa fa-shopping-cart'></i> Carrinho</a></li>";
								} else {
									if(isset($_SESSION["admin"])){
										echo "<li><a href='cadastrarLivro.php'><i class='fa fa-lock'></i> Cadastrar Livro</a></li>";
									} else {
										echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login</a></li>";
										echo "<li><a href='admin.php'><i class='fa fa-lock'></i> Admin</a></li>";
									}
								}
								if((isset($_SESSION["login"])) or (isset($_SESSION["admin"]))){
									echo "<li><a href='../controller/sair.php'><i class='fa fa-user'></i> Sair</a></li>";
								}
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>  
		</div><!--/header-middle-->
	
	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
                        <?php
                            $idPedido = $_GET["id"];
                            echo '<h3>Pedido Nº'.$idPedido.'</h3>';
                        ?>
                        <h4> Produtos do Pedido </h4>
                        <section id="cart_items">
                            <div class="container">
                                <div class="table-responsive cart_info">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="cart_menu">
                                                <td class="image">Item</td>
                                                <td class="description"></td>
                                                <td class="price">Preço</td>
                                                <td class="quantity">Quantidade</td>
                                                <td class="condition">Condição</td>
                                                <td class="description"></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $connection = new Connection("localhost", "root", "", "Livraria");
                                            $link = $connection->getLink();
                    
                                            $livDAO = new livroDAO();
                                            $result = $livDAO->consultarPorPedido($link,$idPedido);
                                            while($row = mysqli_fetch_array($result)){
                                                echo '<tbody><tr>';
                                                    echo'<td class="cart_product">';
                                                        echo'<a href=""><img class="cart-img" src="data:image/jpeg;base64,' . base64_encode( $row[0]) . '"/>';
                                                    echo '</td>';
                                                    echo'<td class="cart_description">';
                                                        echo'<h4 style = "margin-left:60px">'.$row[1].'</h4>';
                                                        echo'<p style = "margin-left:63px">'.$row[2].'</p>';
                                                    echo'</td>';
                                                    echo'<td class="cart_price">';
                                                        echo'<p>R$'.number_format($row[3], 2, ',', '').'</p>';
                                                    echo'</td>';
                                                    echo'<td class="cart_price">';
                                                        echo '<p>'.$row[4].'</p>';                  
                                                    echo'</td>';
                                                    echo'<td class="cart_price">';
                                                        echo'<p>'.$row[5].'</p>';
                                                    echo'</td>';
                                                    echo'<td class="cart_delete">';
                                                        echo'<a class="cart_quantity_delete" style="margin-left:10px" href="../controller/C_Excluir_Livro.php?id='.$idPedido.'"><i class="fa fa-times"></i></a>';
                                                    echo'</td>';
                                                echo'</tr></body>';
                                            }
                                        ?>
                                        <tfoot>
                                            <td>
                                                <th>
                                                    <h4>Preço Total:
                                                    <?php
                                                        $connection = new Connection("localhost", "root", "", "Livraria");
                                                        $link = $connection->getLink();
                                                        $compraDAO = new compraDAO();
                                                        $precoTotal = $compraDAO->calcularPrecoTotal($link, $idPedido);
                                                        echo number_format($precoTotal, 2, '.', '').'</h4>';
                                                    ?>
                                                    <h4>Data de Realização do Pedido: 
                                                    <?php
                                                        $pedido = $compraDAO->consultarPorId($link, $idPedido);
                                                        echo $pedido[7].'</h4>';
                                                    ?>    
                                                </th>                                           
                                            </td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <form enctype="multipart/form-data" action="" method = "POST">
                            <?php
                                echo '<input type="hidden" name = "identificador" value = "'.$idPedido.'"/>';
                                echo '<h4>Dados do cartão</h4>';
                                echo 'Número <input type="text" name="nCartao" value="'.$pedido[2].'"/>';
								echo 'Nome: <input type="text" name="nomeCartao" value="'.$pedido[3].'"/>';
								echo 'Código de Segurança: <input type="text" name="cvv" value="'.$pedido[4].'"/><br>';
                                echo '<h4>Dados de Transporte</h4>';    
                                $transportadoras = new TransportadoraDAO();
								$transport = $transportadoras->consultar($link);
								while($transportadora = mysqli_fetch_array($transport)){
                                    if($transportadora[0] == $pedido[6]){
                                        echo  $transportadora[1].' - R$'.number_format($transportadora[2], 2, ',', '').'
                                        - '.$transportadora[3].' dias uteis<br>';
                                        echo '<input type="radio" style="height:20px; margin-left:-350px; margin-top:-20px" name="transportadora" value="'.$transportadora[0].'"checked required/>'; 
							
                                    } else {
                                        echo $transportadora[1].' - R$'.number_format($transportadora[2], 2, ',', '').'
                                            - '.$transportadora[3].' dias uteis<br>';
                                        echo '<input type="radio" style="height:20px; margin-left:-350px; margin-top: -20px"name="transportadora" value="'.$transportadora[0].'"  required/>';
                                    }
								}
                            ?>
                            
                            <div class="btn-group">
                                <button type="submit" class="btn btn-default">Alterar pedido</button>
                                <button type="button" onclick="window.location=" class="btn btn-default">Excluir pedido</button>
                            </div>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>