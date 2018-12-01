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
    <title>Tabela de Estoque | Livraria</title>
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
                            <td></td>
                        </tr>
                    </thead>
                    <?php
                        $connection = new Connection("localhost", "root", "", "Livraria");
                        $link = $connection->getLink();

                        $livDAO = new LivroDAO();
                        $result = $livDAO->consultarTodos($link,"");
                        while($row = mysqli_fetch_array($result)){
                            echo '<tbody><tr>';
                                echo'<td class="cart_product">';
                                    echo'<a href=""><img class="cart-img" src="data:image/jpeg;base64,' . base64_encode( $row[3]) . '"/>';
                                echo '</td>';
                                echo'<td class="cart_description">';
                                    echo'<h4 style = "margin-left:55px">'.$row[1].'</h4>';
                                    echo'<p style = "margin-left:58px">'.$row[4].'</p>';
                                echo'</td>';
                                echo'<td class="cart_price">';
                                    echo'<p>R$'.number_format($row[2], 2, ',', '').'</p>';
                                echo'</td>';
                                echo'<td class="cart_price">';
                                    echo'<p>'.$row[6].' itens no estoque</p>';
                                echo'</td>';
                                echo'<td class="cart_price">';
                                    echo'<p>'.$row[5].'</p>';
                                echo'</td>';
                                echo'<td class="cart_delete">';
                                    echo'<a href="alterarLivro.php?id='.$row[0].'"type="submit"  style="margin-top: 20px" class = "btn btn-default add-to-cart"  >Alterar</a>';
                                    echo'<a class="cart_quantity_delete" style="margin-left: 30px" href="../controller/C_Excluir_Livro.php?id='.$row[0].'"><i class="fa fa-times"></i></a>';
                                echo'</td>';
                            echo'</tr></body>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>  
        