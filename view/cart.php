<!DOCTYPE html>
<?php
	session_start();
	include_once("../persistence/connection.php");
	include_once("../persistence/carrinhoDAO.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrinho | Livraria</title>
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
									echo "<li><a href='sair.php'><i class='fa fa-user'></i> Sair</a></li>";
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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Início</a></li>
				  <li class="active">Carrinho de compras</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Preço</td>
							<td class="quantity">Quantidade</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
						$vet = $_SESSION["login"];
						$idCliente = $vet[0];
						$connection = new Connection("localhost", "root", "", "Livraria");
						$link = $connection->getLink();

						$carrinho = new CarrinhoDAO();
						$itensCarrinho = $carrinho->buscarItens($link,$idCliente);
						
						if (mysqli_num_rows($itensCarrinho)<=0){
							echo '<tr>';
								echo '<td class="cart_product">O carrinho está vazio</td>';
							echo '</tr>';
						}
						while($row = mysqli_fetch_array($itensCarrinho)){
							echo '<tr>';
								echo '<td class="cart_product">';
									echo '<a href="product-details.php?id='.$row[0].'"><img class="cart-img" src="data:image/jpeg;base64,' . base64_encode($row[4]) . '"/>';
								echo '</td>';
								echo '<td class="cart_description">';
									echo '<h4 style="margin-left:50px"><a href="product-details.php?id='.$row[0].'">'.$row[1].'</a></h4>';
									echo '<p style="margin-left:52px">'.$row[2].'</p>';
									echo '</td>';
									echo '<td class="cart_price">';
										echo '<p>'.number_format($row[3], 2, ',', '').'</p>';
										echo '</td>';
										echo '<td class="cart_quantity">';
											echo '<div class="cart_quantity_button">';
												echo '<a class="cart_quantity_up" href=""> + </a>';
												echo '<input class="cart_quantity_input" type="text" name="quantity" value="'.$row[5].'" autocomplete="off" size="2">';
												echo '<a class="cart_quantity_down" href=""> - </a>';
											echo '</div>';
										echo '</td>';
										echo '<td class="cart_total">';
											echo '<p class="cart_total_price">R$50,00</p>';
										echo '</td>';
										echo '<td class="cart_delete">';
											echo '<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>';
										echo '</td>';
							echo '</tr>';
						}
					?>					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Sub-total <span>R$ 100,00</span></li>
							<li>Frete <span>R$ 10,00</span></li>
							<li>Total <span>$ 110,00</span></li>
						</ul>
							<a class="btn btn-default update" href="pagamento.php">Seguir compra</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>