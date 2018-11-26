<!DOCTYPE html>
<?php
	session_start();
	include_once("../persistence/connection.php");
	include_once("../persistence/transportadoraDAO.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pagamento | Livraria</title>
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
	
	
	<section id="form"><!--form-->	
		<form method="POST" action="../controller/C_Compra.php">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Preencha as informações do cartão</h2>
								<input type="text" name="NumCartao" placeholder="Numero do cartão" />
								<input type="text" name="NomCartao" placeholder="Nome impresso no cartão" />
								<input type="text" name="CodigoSeguranca" placeholder="Codigo de segurança" />  
								<input type="number" min="1" name="NumParcelas" placeholder="Número de parcelas" />
						</div><!--/login form-->
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-4 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Escolha a transportadora</h2>
						</div><!--/login form-->
							<?php
								$connection = new Connection("localhost", "root", "", "Livraria");
								$link = $connection->getLink();
	
								$transportadoras = new TransportadoraDAO();
								$transport = $transportadoras->consultar($link);
								while($transportadora = mysqli_fetch_array($transport)){
									echo '<input type="radio" name="transportadora" value="'.$transportadora[0].'"/> 
										 '.$transportadora[1].' - R$'.number_format($transportadora[2], 2, ',', '').'
										  - '.$transportadora[3].' dias uteis<br>';;
								}
							?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="login-form" >
						<button  style="margin-right: 57%; margin-left:43%;" type="submit" class="btn btn-default">Finalizar compra</button>
					</div>
				</div>
			</div>
			
		</form>
	</section><!--/form-->

    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>