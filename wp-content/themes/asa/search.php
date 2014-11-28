<?php get_header();
	if(isset($_GET['cat']) && $_GET['cat'] == 1){
		?>

			<section id="busca-receitas">
				<header id="receitas-interna">
					<div class="container">
						<figure class="four columns"><img src="<?php bloginfo('template_url') ?>/img/receitas.png"></figure>
						<div class="nine columns">
							<h2>MEU LIVRO DE RECEITA</h2>
							<h3>Este é o seu livro de receitas. Aqui você pode consultar, guardar e cadastrar a sua receita favorita. Nosso sistema deixa tudo guardado e organizado, para quando você precisar.</h3>
						</div>
						
						<div class="linha-receitas"></div>

						<form action="">
							<div class="five columns">
								<label for="email">E-mail</label>
								<input type="text" id="email">
							</div>

							<div class="five columns">
								<label for="senha">Senha</label>
								<input type="text" id="senha">
							</div>

							<div class="four columns">
								<input type="submit" value="OK" class="enviar-login">
								<a href="#">Cadastrar</a>
							</div>
						</form>	
					</div>
				</header>

				<article class="container content-receitas">
					
					<form role="search" method="get" class="sixteen columns" id="buscar-noticias" action="<?php bloginfo('home'); ?>">
						<input type="text" value="" name="s" id="s" placeholder="Encontre sua receita">
						<input type="hidden" name="cat" value="1" />
						<input type="submit" value="BUSCAR">
					</form>
				</article>
			</section>
		<div class="container">
			<div class="receitas-busca">

			<?php if (have_posts()) {
				while ( have_posts() ) : the_post(); ?>
				<div class="four columns box-receitas">
					
				<?php
				    $url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $url ?>" alt=""></a>
					<a href="<?php the_permalink(); ?>"><p><?php the_title() ?></p>	</a>
					<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>
				</div>
				<?php endwhile; 
				if (function_exists('pagination_funtion')) pagination_funtion();
			}else{
				?>
				<br>
				<br>
			<h1 id="selecionar">Nenhuma receita encontrada :(</h1>

				<?php
			}
				?>
			</div>
		</div>
<?php
	}else {
		?>

	<section class="container" id="post-interna">
		<header id="produtos" class="sixteen columns">
			<h2>Asa News</h2>
			<h3 id="subtitle-news">Acompanhe as notícias da ASA e fique sabendo de tudo sobre produtos, eventos, lançamentos e campanhas</h3>
		</header>

		<article class="container" id="news">
			
			<?php if (have_posts()) {

			while (have_posts()) : the_post(); ?>
					<div>
						<?php
						    $url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						?>
						<figure>
							<a href="<?php the_permalink() ?>"><img src="<?php echo $url ?>" alt=""></a>
						</figure>
						
						<h4><?php the_title() ?></h4>
						<p><?php the_excerpt() ?></p>	
						<a href="<?php the_permalink() ?>" class="mais">leia mais</a>
					</div>
			<?php endwhile;
			}else{
				?>
				<h4 id="nothing">Não encontramos resultados para sua busca</h4>

				<h5 id="explorar">Mas ainda há muito conteúdo que você pode explorar:</h5>

		<?php
				$marcas_posts = new WP_Query( array( 'cat' => 2, 'posts_per_page' => 3 ) );
				while ( $marcas_posts->have_posts() ) : $marcas_posts->the_post();
?>
					<div>
						<?php
						    $url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						?>
						<figure>
							<a href="<?php the_permalink() ?>"><img src="<?php echo $url ?>" alt=""></a>
						</figure>
						
						<h4><?php the_title() ?></h4>
						<p><?php the_excerpt() ?></p>	
						<a href="<?php the_permalink() ?>" class="mais">leia mais</a>
					</div>
			<?php endwhile; }//endelse ?>
		</article>
		<article class="container content-receitas">
			<form role="search" method="get" class="sixteen columns" id="buscar-noticias" action="<?php bloginfo('home'); ?>">
				<input type="text" value="" name="s" id="s" placeholder="Encontre sua receita">
				<input type="hidden" name="cat" value="2" />
				<input type="submit" value="BUSCAR">
			</form>
		</article>
	</section>
<?php
	} //endelse
 get_footer(); ?>