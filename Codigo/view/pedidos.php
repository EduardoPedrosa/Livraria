<!DOCTYPE html>
<?php
	session_start();
	include_once("../persistence/compraDAO.php");
	include_once("../persistence/connection.php");
	include_once("../persistence/transportadoraDAO.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Meus Pedidos | Livraria</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="css/price-range.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<link href="css/responsive.css" rel="stylesheet" type="text/css">
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
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<nav class="menu2">
							<ul>
								<li class="conta"><a href="conta.php">Perfil</a></li>
								<li class="pedido"><a href="pedidos.php">Meus pedidos</a></li>
								<hr />
							</ul>
						</nav>
					</div>	
				</div>
			</div>
		</div> 
	</header>
		
	
	<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
    </header><!--/header-->
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="description">Número da compra</td>
                            <td class="price">Data</td>
							<td class="price">Preço</td>
                            <td class="condition">Transportadora</td>
							<td class="description"></td>
							<?php 
								$vet = $_SESSION["login"];
								$idCliente = $vet[0];
								$connection = new Connection("localhost", "root", "", "Livraria");
								$link = $connection->getLink();
								$compraDAO = new compraDAO();
								$transpDAO = new transportadoraDAO();
								//pegando dados da compra
								$compras = $compraDAO->consultarComprasCliente($link,$idCliente);
								if (mysqli_num_rows($compras)<=0){
									echo '<tr>';
										echo '<td class="cart_product">Você ainda não realizou nenhum pedido</td>';
									echo '</tr>';
								}
								while($row = mysqli_fetch_array($compras)){
									$idCompra = $row[0];
									echo '<body><tr>';
										echo '<td class="cart_description">';
											echo '<h4>'.$idCompra.'</h4>';
										echo'</td>';
										echo '<td class="cart_price">';
											echo '<p>'.$row[7].'</p>';
										echo'</td>';
										//calculando preco total da compra
										$preco = $compraDAO->calcularPrecoTotal($link, $idCompra);
										echo '<td class="cart_price">';
											echo '<p>R$'.number_format($preco, 2, ',', '').'</p>';
										echo '</td>';
										//consultando transportadora
										$result = $transpDAO->consultarPorId($link, $row[6]);
										$transp = mysqli_fetch_array($result);
										$nomeTransp = $transp[1];
										echo '<td class="cart_description">';
											echo'<p>'.$nomeTransp.'</p>';
										echo '</td>';
										echo '<td class="cart_delete">';
											echo'<a href="detalhesPedido.php?id='.$idCompra.'"type="submit"  style="margin-top: 20px" class = "btn btn-default add-to-cart"  >Ver Detalhes</a>';
										echo '</td>';
									echo '</tr></body>';
								}
							?>	
						</tr>
					</thead>
				</table>
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