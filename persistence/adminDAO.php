<?php
	include_once("../model/cliente.php");
	session_start();
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
                      echo"<script language='javascript' type='text/javascript'>window.location.href='../view/admin.php';window.alert('Usuario ou senha invalido(s)');</script>";
                      die();
                    }else {
                      $_SESSION["admin"] = $email;
                      header("Location:../view/index.php");
                    }
		}
	}
?>
