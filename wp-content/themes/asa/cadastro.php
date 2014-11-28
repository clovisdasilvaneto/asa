<?php 
	include "conect.php";
	session_start();
	

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$data_nascimento = $_POST["dt_nascimento"];
	$sexo = $_POST["sexo"];
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		?>
			<html>
				<body>
					<script type="text/javascript">
						alert("Email inválido");
						location.href="http://www.asanet.com.br/novo"
					</script>
				</body>
			</html>
		<?php
	}else{
		mysql_query("insert into users_site values ('','$nome','$email','$senha','$sexo','$data_nascimento')")or die(mysql_error());

		?>
			<html>
				<body>
					<script type="text/javascript">
						alert("Cadastro realizado com sucesso, favor efetuar login");
						location.href="http://www.asanet.com.br/novo/category/receitas?category-slug=aves";
					</script>
				</body>
			</html>
		<?php
	}


	// if(!mysql_num_rows($verificacao)){
	// 	mysql_query("insert into user_receitas values ('','$id_user','$id_receita')")or die(mysql_error());
	// }
?>
