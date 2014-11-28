

<article id="cadastro">
	<a href="#fechar" id="fechar-cad">Fechar</a>

	<header>
		<h2>Faça parte do nosso livro de receitas!</h2>
		<h3>Você poderá testar e avaliar os pratos de outros usuários e sugerir alguns ingredientes secretos que podem melhorar cada receita, além de poder compartilhar aquelas comidinhas que você faz em casa.</h3>		
	</header>

	<form action="<?php bloginfo('template_url')?>/cadastro.php" class="uniform" method="POST">
		<label for="nome">Nome*</label>
		<input type="text" name="nome" id="nome" required>
		
		<label for="email">E-mail*</label>
		<input type="mail" name="email" id="email" required>

		<div class="tic">
			<input type="checkbox" checked id="aceitar" value="aceitar" name="aceitar">
			<label for="aceitar">Aceito receber novidades da ASA</label>
		</div>

		<div class="medium-form">
			<label for="senha-cad">Senha</label>
			<input type="password" name="senha" id="senha-cad" required>
		</div>
		

		<div class="medium-form omega">
			<label for="confirmar">Confirmar senha</label>
			<input type="password"  id="confirmar" required>
		</div>
		
		<div class="medium-form">
			<label for="nascimento">Data de nascimento</label>
			<input type="text" name="dt_nascimento" id="nascimento" required value="<?php echo $data[2]."/".$data[1]."/".$data[0]; ?>" class="placeholders" data-value="<?php echo $data[2]."/".$data[1]."/".$data[0]; ?>">
		</div>
		
		<div class="medium-form omega">
			<label>Sexo</label>

			<div class="tic tic-medium">
				<input type="radio" required <?php if($_SESSION['sexo'] == 'feminino'){ echo "checked"; } ?> id="feminino" value="feminino" name="sexo">
				<label for="feminino">Feminino</label>
			</div>

			<div class="tic tic-medium">
				<input type="radio" required id="masculino" value="masculino" name="sexo" <?php if($_SESSION['sexo'] == 'masculino'){ echo "checked"; } ?>>
				<label for="masculino">Masculino</label>
			</div>
		</div>
		<br>
		<div class="alerta-cad">
			preencha todos os campos!
		</div>
		<input type="submit" value="Enviar" class="salvar-uniform">

	</form>
</article>