<!DOCTYPE html>
<?php
	session_start();
	include_once("../persistence/connection.php");
	include_once("../persistence/livroDAO.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Livraria</title>
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
	<script type="text/javascript">

		function handle(){
			var keycode = window.event.keyCode;
			if (keycode == 13){
				document.formulario.submit();
			}
		}

	</script>
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
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form method="GET" action="index.php" name="formulario">
								<input type="text" name="chave" placeholder="Pesquisar" onkeypress="handle();"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section>
		<div class="container">
			<div class="row">
				<div class=" padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Livros disponíveis</h2>
						<?php	
							$connection = new Connection("localhost", "root", "", "Livraria");
							$link = $connection->getLink();

							$livDAO = new LivroDAO();
							$chave = "";
							if(isset($_GET["chave"])){
								$chave = $_GET["chave"];
							}
							$result = $livDAO->consultarTodos($link,$chave);
							while($row = mysqli_fetch_array($result)){
								echo "<div class='col-sm-4'>";
									echo "<div class='product-image-wrapper'>";
										echo "<div class='single-products'>";
											echo "<div class='productinfo text-center'>";
												echo "<img class='img-livro' src='data:image/jpeg;base64," . base64_encode( $row[3]) . "'/>";
												echo "<h2>R$ ".number_format($row[2], 2, ',', '')."</h2>";
												echo "<p>".$row[1]."</p>";
												echo "<a href='product-details.php?id=".$row[0]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Ver detalhes</a>";
											echo "</div>";
											echo "<div class='product-overlay'>";
												echo "<div class='overlay-content'>";
												echo "<h2>R$ ".number_format($row[2], 2, ',', '')."</h2>";
												echo "<p>".$row[1]."</p>";
												echo "<a href='product-details.php?id=".$row[0]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Ver detalhes</a>";
												echo "</div>";
											echo "</div>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
						?>
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>