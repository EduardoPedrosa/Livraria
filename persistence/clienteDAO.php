<?php
	include_once("../model/cliente.php");
	
	class ClienteDAO{
		function __construct(){	
		}
		function cadastrar($link, $f){
			$insert = "insert into Cliente (nome, cpf, email, senha, rua, numero, bairro, cidade, telefone)
					   values('".$f->getNome()."', '".$f->getCpf()."', '".$f->getEmail()."', '".$f->getSenha()."', '".$f->getRua()."', ".$f->getNumero().", '".$f->getBairro()."', '".$f->getCidade()."', '".$f->getTelefone()."')"; 
			if(!mysqli_query($link, $insert)){
				die("Não foi possivel salvar o cadastro".mysqli_error($link));
			}
		}
		function consultar($link, $f){
			if ($f->getNome() != NULL){
				$select = "select * from Funcionario where nome = '".$f->getNome()."'"; 
				$r = mysqli_query($link, $select);
				if(!$r){
					die("Não foi possivel encontrar funcionário".mysqli_error($link));
				}
				$result = mysqli_fetch_array($r);
				echo $result[0]."<br>";
				echo $result[1]."<br>";
				echo $result[2]."<br>";
			}
		}
                
                function consultarLogin($link, $email, $senha){
                    $select = "SELECT * FROM cliente WHERE email = '".$email."' AND senha = '".$senha."'";
                    $verifica = mysqli_query($link, $select);
                    if(!$verifica){
                        die("Erro ao procurar login".mysqli_error($link));
                    }
                    if (mysqli_num_rows($verifica)<=0){
                      echo"<script language='javascript' type='text/javascript'>window.location.href='../view/login.html';window.alert('Usuario ou senha invalido(s)');</script>";
                      die();
                    }else{
                      setcookie("login",$email);
                      header("Location:../view/index.html");
                    }
		}
                
		function alterar(){
		}

		function excluir($link, $f){
			$delete = "delete from Funcionario where nome = '".$f->getNome()."'";
			if(!mysqli_query($link, $delete)){
				die("Não foi possivel excluir".mysqli_error($link));
			}
			echo "Excluido com sucesso";
		}
	}
?>
