<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Produto | Livraria</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
                                    <div class="product-details"><!--product-details-->
                                            <div class="col-sm-5">
                                                    <div class="view-product">
                                                            <img class="img-livro-detalhe" src="images/img-exemplo.jpg" alt="" />
                                                    </div>
                                                    <div id="similar-product" class="carousel slide" data-ride="carousel">
                                                              <!-- Controls -->
                                                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                                                    <i class="fa fa-angle-left"></i>
                                                              </a>
                                                              <a class="right item-control" href="#similar-product" data-slide="next">
                                                                    <i class="fa fa-angle-right"></i>
                                                              </a>
                                                    </div>

                                            </div>
                                            <div class="col-sm-7">
                                                    <div class="product-information"><!--/product-information-->
                                                            <h2>Grafos: Conceitos, algoritmos e aplicações</h2>
                                                            <p>Marco Goldbarg e Elizabeth Goldbarg</p>
                                                            <span>
                                                                    <span>R$ 50,00</span>
                                                                    <label>Quantidade:</label>
																	<form method="POST" action="verificarLogin.php" style="display: inline;">
																		<input type="text" value="1"/>
																		<button type="submit" class="btn btn-fefault cart">
																				<i class="fa fa-shopping-cart"></i>
																				Adicionar ao carrinho
																		</button>
																	</form>
                                                            </span>
                                                            <p><b>Disponibilidade:</b> Em estoque</p>
                                                            <p><b>Condição:</b> Novo</p>
                                                    </div><!--/product-information-->
                                            </div>
                                    </div><!--/product-details-->

                                    <div class="category-tab shop-details-tab"><!--category-tab-->
                                            <div class="col-sm-12">
                                                    <ul class="nav nav-tabs">
                                                            <li><a href="#details" data-toggle="tab">Detalhes</a></li>
                                                    </ul>
                                            </div>
                                                    <div class="tab-pane fade active in" id="details" >
                                                            <div class="col-sm-12">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                            </div>
                                                    </div>
					</div><!--/category-tab-->
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