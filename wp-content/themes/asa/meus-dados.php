<?php get_header();
/*
Template Name: 	Meus Dados
*/
@session_start();

// echo $_SESSION['nome'];
// echo $_SESSION['senha'];
// echo $_SESSION['email'];
// echo $_SESSION['sexo'];

query_posts('cat=2'); ?>


	
			<section>
				<header id="receitas-interna">
					<div class="container">
						<figure class="four columns"><img src="<?php bloginfo('template_url') ?>/img/receitas.png"></figure>
						<div class="nine columns">
							<h2>MEU LIVRO DE RECEITA</h2>
							<h3>Este é o seu livro de receitas. Aqui você pode consultar, guardar e cadastrar a sua receita favorita. Nosso sistema deixa tudo guardado e organizado, para quando você precisar.</h3>
						</div>
					</div>
				</header>

				
				<?php 
					get_template_part( 'content', 'opcoes' );
				?>

				<article class="container content-receitas">
							
					<form role="search" method="get" class="sixteen columns" id="buscar-noticias" action="<?php bloginfo('home'); ?>">
						<input type="text" value="" name="s" id="s" placeholder="Encontre sua receita">
						<input type="hidden" name="cat" value="1" />
						<input type="submit" value="BUSCAR">
					</form>
				</article>
			</section>
		<div class="container">
			<div class="thirteen columns" id="category-receita">
		<?php
			$categoria = get_categories('child_of=1');

			if(isset($_GET['category-slug'])){
				$slug = $_GET['category-slug'];
			}else {
				$slug = "nenhum";
			}

			foreach ($categoria as $filhas) {
					    $category_id = get_cat_ID( $filhas->cat_name );
    					$category_link = get_category_link( $category_id );

		?>

				<a href="<?php echo $category_link ?>?category-slug=<?php echo $filhas->slug ?>" class="<?php if($slug == $filhas->slug){echo 'active-category';} ?>"><?php echo $filhas->name ?></a>
		<?php
			}//endforeach

			$data = explode("-",$_SESSION['data']);
		?> 
			</div>
			<!-- END CATEGORIAS -->

			<h3 class="my-book">Meu livro de receitas</h3>
			
			<article class="ten columns update" id="my-dados">
				<header>
					<h4>Meus Dados</h4>
				</header>
				
				<form action="<?php bloginfo('template_url') ?>/val-dados.php" class="uniform" method="POST">
					<img src="<?php bloginfo('template_url') ?>/img/boneco.jpg" alt="Boneco" />
<!-- 
					<div class="enviar-foto">
						<label for="imagem">Enviar foto</label>
						<input type="file" id="imagem">
					</div> -->
					<br>
					<br>
					<label for="nome">Nome*</label>
					<input type="text" id="nome" name='nome' value="<?php echo $_SESSION['nome'] ?>" class="placeholders" data-value="<?php echo $_SESSION['nome'] ?>" required>
					
					<label for="email">E-mail*</label>
					<input type="mail" id="email" name='email' class="placeholders" value="<?php echo $_SESSION['email'] ?>" data-value="<?php echo $_SESSION['email'] ?>" required>

					<div class="tic">
						<input type="checkbox" checked id="aceitar" value="aceitar" name="aceitar">
						<label for="aceitar">Aceito receber novidades da ASA</label>
					</div>

					<label for="senha">Senha</label>
					<input type="password" id="senha-cad" name="senha" required>
					
					<label for="confirmar">Confirmar senha</label>
					<input type="password" id="confirmar" required>
					
					<label for="nascimento">Data de nascimento</label>
					<input type="text" id="nascimento" name='dt_nascimento' value="<?php echo $data[2]."/".$data[1]."/".$data[0]; ?>" class="placeholders" data-value="<?php echo $data[2]."/".$data[1]."/".$data[0]; ?>">

					<label>Sexo</label>

					<div class="tic tic-medium">
						<input type="radio" <?php if($_SESSION['sexo'] == 'feminino'){ echo "checked"; } ?> id="feminino" value="feminino" name="sexo">
						<label for="feminino">Feminino</label>
					</div>

					<div class="tic tic-medium">
						<input type="radio" id="masculino" value="masculino" name="sexo" <?php if($_SESSION['sexo'] == 'masculino'){ echo "checked"; } ?>>
						<label for="masculino">Masculino</label>
					</div>

		<div class="alerta-cad alert-dados">
			preencha todos os campos!
		</div>
					<input type="submit" value="SALVAR" class="salvar-uniform">
				</form>
			</article>

			<aside class="five columns" id="left-dados">
				<img src="<?php bloginfo('template_url') ?>/img/boneco.jpg" alt="Boneco" />
				<h6>Elisa lacerda</h6>

				<ul>
					<li><a href="<?php bloginfo('url') ?>/livro-de-receitas/">Meu livro de receitas</a></li>
					<li><a href="<?php bloginfo('url') ?>/meus-dados/">Meus Dados</a></li>
					<li><a href="<?php bloginfo('url') ?>/category/receitas/">Mostrar todas as receitas</a></li>
				</ul>	
			</aside>

		</div>
		<?php get_footer(); ?>