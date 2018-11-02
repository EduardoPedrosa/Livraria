<?php
	include_once("../model/cliente.php");
<<<<<<< HEAD
	session_start();
=======
	
>>>>>>> e5d3df8aae9090f255e65f1d59007f189b6d850c
	class AdminDAO{
		function __construct(){	
		}
                function consultarLogin($link, $email, $senha){
                    $select = "SELECT * FROM admin WHERE email = '".$email."' AND senha = '".$senha."'";
                    $verifica = mysqli_query($link, $select);
                    if(!$verifica){
                        die("Erro ao procurar login".mysqli_error($link));
                    }
                    if (mysqli_num_rows($verifica)<=0){
<<<<<<< HEAD
                      echo"<script language='javascript' type='text/javascript'>window.location.href='../view/admin.php';window.alert('Usuario ou senha invalido(s)');</script>";
                      die();
                    }else {
                      $_SESSION["admin"] = $email;
                      header("Location:../view/index.php");
=======
                      echo"<script language='javascript' type='text/javascript'>window.location.href='../view/admin.html';window.alert('Usuario ou senha invalido(s)');</script>";
                      die();
                    }else{
                      setcookie("admin",$email);
                      header("Location:../view/index.html");
>>>>>>> e5d3df8aae9090f255e65f1d59007f189b6d850c
                    }
		}
	}
?>
