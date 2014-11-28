<?php get_header();
 while ( have_posts() ) : the_post(); 
 if ( has_post_format( 'image' )) {
 ?>

<section>
				<header id="receitas-interna">
					<div class="container">
						<figure class="four columns"><img src="<?php bloginfo('template_url') ?>/img/receitas.png"></figure>
						<div class="nine columns">
							<h2>MEU LIVRO DE RECEITA</h2>
							<h3>Este é o seu livro de receitas. Aqui você pode consultar, guardar e cadastrar a sua receita favorita. Nosso sistema deixa tudo guardado e organizado, para quando você precisar.</h3>
						</div><?php 
							@session_start();
							
							if(isset($_SESSION['id'])){
							?>
						</div>
				</header>

							<?php 
								get_template_part( 'content', 'opcoes' );

							}else {
						?>
						<div class="linha-receitas"></div>

						<form action="<?php bloginfo('template_url') ?>/validar_login.php" method="post">
							<div class="five columns">
								<label for="email">E-mail</label>
								<input type="text" name="email" id="email">
							</div>

							<div class="five columns">
								<label for="senha">Senha</label>
								<input type="password" name="senha" id="senha">
							</div>

							<div class="four columns">
								<input type="submit" value="OK" class="enviar-login">
								<a href="#">Cadastrar</a>
							</div>
						</form>	
					</div>
				</header>
						<?php } ?>

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
		?> 
			</div>
		</div>

 				
				<section class="container padrao-receitas" id="noticias-interna">
					<header>
						<div class="eight columns" id="imagem_receita">
							<figure>
								<img src="<?php the_field('imagem_da_receita'); ?>">
							</figure>
						</div>

						<div class="eight columns">
							<h2><?php the_title(); ?></h2>
							<?php 
								$id_user = $_SESSION['id'];
								$id_receita = get_the_ID();
								$query_user = mysql_query("select * from user_receitas where id_user='$id_user' and id_receita='$id_receita'")or die(mysql_error());
								if(mysql_num_rows($query_user)){
							?>
								<p class="possui">Disponível no seu livro de receitas</p>
							<?php
								}else{
							?>
								<a href="<?php bloginfo('template_url') ?>/add-livro.php?id=<?php the_ID() ?>" class="btn-add">adicione ao seu livro de receitas</a>
							<?php
								}
							?>

							<ul class="opc-receitas">
								<li>Tempo de preparo: <span><?php the_field('tempo_de_preparo'); ?></span></li>
								<li>Rendimento: <span><?php the_field('rendimento'); ?></span></li>
								<li id="imprimir-receita">Imprimir receita</li>
								<li id="env-email-receita">Enviar receita por email</li>
							</ul>
						</div>
						<div class="limpa"></div>
					</header>

					<article>
						<div class="eight columns">
								<h3>Ingredientes</h3>
								<?php the_field('ingredientes'); ?>
						</div>

						<div class="eight columns">
							<h3>Modo de preparo</h3>
								<?php the_field('modo_de_preparo'); ?>
						</div>
					</article>
				</section>

					<aside class="container content-receitas" id="news">
				            <?php 
				 
								$categories = get_the_category($post->ID);  
								if ($categories) {  $category_ids = array();  
									foreach($categories as $individual_category)  
										$category_ids[] = $individual_category->term_id; 
				 
									$args=array( 
										'category__in' => $category_ids, 
										'post__not_in' => array($post->ID), 
										'showposts'=>3, // Number of related posts that will be shown. 
										'caller_get_posts'=>1 
									); 
									$my_query = new wp_query($args); 
				 
				 
				 
									if( $my_query->have_posts() ) { 
										$count=1;
										while ($my_query->have_posts()) { 
											$my_query->the_post(); ?>
				            <div class="<?php if($count == 4) echo "lest" ?>"> 
				            	<figure><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>">
				              <?php the_post_thumbnail('relacionados');?>
				              </a></figure>
				             	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
								<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>

				            </div>
				            <?php $count ++; ?>
				            <?php } 
										wp_reset_query();
									} 
								} 
							?>
          <!-- end .relacionado -->
						<span class="limpa"></span>
						
						<div id="voltar-receita">
							<a href="<?php echo get_category_link(1); ?>" class="voltar">< Voltar</a>
						</div>

					</aside>
		<?php 

}else { ?>


 				
				<section class="container" id="noticias-interna">
					<header class="sixteen columns">
						<h2><?php the_title(); ?></h2>
						<p class="date"><?php the_time('j \d\e F \d\e Y'); ?></p>

						<p class="fonte">Fonte: João Alberto</p>
					</header>

					<article>
						<?php the_content(); ?>
					</article>
					<div class="line"></div>
				</section>

					<aside class="container content-receitas" id="news">
				            <?php 
				 
								$categories = get_the_category($post->ID);  
								if ($categories) {  $category_ids = array();  
									foreach($categories as $individual_category)  
										$category_ids[] = $individual_category->term_id; 
				 
									$args=array( 
										'category__in' => $category_ids, 
										'post__not_in' => array($post->ID), 
										'showposts'=>3, // Number of related posts that will be shown. 
										'caller_get_posts'=>1 
									); 
									$my_query = new wp_query($args); 
				 
				 
				 
									if( $my_query->have_posts() ) { 
										$count=1;
										while ($my_query->have_posts()) { 
											$my_query->the_post(); ?>
				            <div class="<?php if($count == 4) echo "lest" ?>"> 
				            	<figure><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>">
				              <?php the_post_thumbnail('relacionados');?>
				              </a></figure>
				             	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h4><?php the_title(); ?></h4></a>
				             	<p><?php the_excerpt() ?></p>
								<a href="<?php the_permalink() ?>" class="mais">leia mais</a>
				            </div>
				            <?php $count ++; ?>
				            <?php } 
										wp_reset_query();
									} 
								} 
				 
							?>
          <!-- end .relacionado-->
						<span class="limpa"></span>

						<a href="<?php get_category_link(2) ?>" class="voltar">< Voltar</a>
						<a href="http://localhost/asa/testando-o-post-da-noticia/" class="not-mais">Mostrar mais notícias</a>


						<form role="search" method="get" class="sixteen columns" id="buscar-noticias" action="http://localhost/asa">
							<input type="text" value="" name="s" id="s" placeholder="Encontre sua receita">
							<input type="hidden" name="cat" value="2">
							<input type="submit" value="BUSCAR">
						</form>
					</aside>
<?php } endwhile; ?>
<?php get_footer();?>