<?php
	if((isset($_POST['senha'])) && ($_POST['email'])){
		include("conect.php");
		$email = $_POST['email'];

		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			$senha = $_POST['senha'];


			$query = mysql_query("select * from users_site where email='$email'")or die(mysql_error());
			$count = mysql_num_rows($query);
			
			while ($user = mysql_fetch_array($query)) {
				if($user['senha'] == $senha){
					session_start();
					$_SESSION['nome'] = $user['nome'];
					$_SESSION['id'] = $user['id'];
					$_SESSION['senha'] = $senha;
					$_SESSION['email'] = $user['email'];
					$_SESSION['sexo'] = $user['sexo'];
					$_SESSION['data'] = $user['data_nascimento'];

					?>
						
						<script type="text/javascript">
							location.href="http://localhost/asa/livro-de-receitas";
						</script>
					<?php
				}else{
					?>
						
						<script type="text/javascript">
							alert("Usuario ou senha invalido!");
							location.href="http://localhost/asa/";
						</script>
					<?php
				}
			}

		}else{
			?>
				
				<script type="text/javascript">
					alert("E-mail invalido");
					location.href="http://localhost/asa/";
				</script>
			<?php
		}
	}else {
		?>
			
			<script type="text/javascript">
				alert("preencha todos os campos");
				location.href="http://localhost/asa/";
			</script>
		<?php
	}

?>