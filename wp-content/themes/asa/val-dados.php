<?php 
	include "conect.php";
	session_start();
	

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$data_nascimento = $_POST["dt_nascimento"];
	$sexo = $_POST["sexo"];

	$id = $_SESSION['id'];

	mysql_query("update users_site set nome='$nome', email='$email', senha='$senha', sexo='$sexo', data_nascimento='$data_nascimento' where id ='$id'")or die(mysql_error());
	
					$_SESSION['nome'] = $_POST["nome"];
					$_SESSION['senha'] = $_POST["senha"];
					$_SESSION['email'] = $_POST["email"];
					$_SESSION['sexo'] = $_POST["sexo"];
					$_SESSION['data'] = $_POST["dt_nascimento"];


					?>
						
						<script type="text/javascript">
							alert("Campos atualizados com sucesso!");
							location.href="http://www.asanet.com.br/novo/meus-dados/";
						</script>
					<?php
?>
