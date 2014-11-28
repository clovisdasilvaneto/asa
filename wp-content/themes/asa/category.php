<?php get_header();
			if((isset($_GET['id']) && ($_GET['id'] == 5)) || (isset($_GET['id']) && ($_GET['id'] == 7)) || (isset($_GET['id']) && ($_GET['id'] == 6))){
		?>
	<section class="container" id="post-interna">
		<header id="produtos">

			<h2>Produtos</h2>
		</header>

		<article>
			<p>A ASA Indústria produz e distribui cerca de 250 itens do seu catálogo, divididos  em quatro segmentos: alimento, bebida, higiene e limpeza. Marcas que estão entre as favoritas nas regiões Norte e Nordeste do Brasil</p>
			<br>
			<p>Escolha a linha de produtos abaixo e navegue.
				<br>
				Para informações detalhadas (embalagem, peso, etc) baixe nosso catálogo em PDF.
			</p>
		</article>
	<div id="marcas">
			<div class="line"></div>
		
			<?php
			global $ancestor;
			
			/*$marcasPosts = query_posts(array('category_name' => 'marcas'));]*/

		     $my_categories = get_categories('child_of=4');
			foreach ($my_categories as $subcategoria) {
			
			//id da categoria filha da categoria produtos
			$category_id = get_cat_ID( $subcategoria->slug );

			//link da categoria filha da categoria produtos
			$category_link = get_category_link( $category_id );

		?>
			<article>
				<header>
					<figure></figure>
					<a href="<?php echo $category_link; ?>?id=<?php echo $category_id; ?>"><h3><?php echo $subcategoria->cat_name; ?></h3></a>
				</header>

			</article>
			
			<!-- <div class="esconde-img">
				<?php 
					$marcas_posts = new WP_Query( array( 'category_name' => $subcategoria->slug, 'order_by'=>'name' ) );

					while ( $marcas_posts->have_posts() ) : $marcas_posts->the_post(); 
					$url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

					if($url){
				?>
					<a href="<?php echo $category_link; ?>?id=<?php echo $category_id; ?>"><img src="<?php echo $url;?>" alt="<?php the_title(); ?>"></a>
					<div>
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<img src="<?php echo $url;?>" alt="<?php the_title(); ?>">
					</div>
				<?php }//endif
				 endwhile ?>
			</div>  -->
			<?php
			}
		?>
	</div>
	</section>

	<section id="produtos-box">
		<div>
			<?php 
					$marcas_posts = new WP_Query( array( 'cat' => $_GET['id'], 'order_by'=>'name' ) );

					while ( $marcas_posts->have_posts() ) : $marcas_posts->the_post(); 
					$url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

					if($url){
			 ?>
			<article>
				<div class="container">
					
					<figure class="five columns"><img src="<?php echo $url;?>" alt=""></figure>
					<header class="eleven columns">
						<h3><?php the_title(); ?></h3>
						<h4><?php the_content(); ?></h4>
						<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="102" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
						
					</header>
					
					<!-- <button>Ver produtos</button> -->

					<footer>
						<div>
							<?php $attachments = new Attachments( 'attachments' ); 
							if( $attachments->exist() ) : ?>
								<ul class="carrosel">
	    						<?php while( $attachments->get() ) : ?>
									<li><a href="#"><img src="<?php echo $attachments->src( 'full' ); ?>" data-title="<?php echo $attachments->field( 'title' ); ?>" data-caption="<?php echo $attachments->field( 'caption' ); ?>" /></a></li>
								<?php endwhile; 
								else :
									echo "<p>Sem produtos cadastrados, cadastre algum produto na seção de Attachmentsm, dentro do post. Dúvidas, consultar o desenvolvedor<p>";
								endif; ?>
								</ul>
						</div>
					</footer>
				</div>
			</article>
			<?php } //if
			endwhile; ?>
		</div>
	</section>

	<div id="modal-produtos">
		<div class="bg"></div>
		
		<div class="geral-marcas">			
			<div class="container">
				<div class="eight columns">
					<img src="<?php bloginfo('template_url') ?>/img/palmeiron-full.png" alt="">
				</div>

				<div class="eight columns">
					<h4>Extrato de tomate Palmeiron</h4>
					<h6>- Contém 270g</h6>

					<a href="#" class="mais-produto">+</a>
					<a class="fechar-produto"></a>
				</div>
			</div>
		</div>
	</div>
		<?php }else if(in_category('receitas') || isset($_GET['category-slug']) || in_category('aves')){ ?>

			<section>
				<header id="receitas-interna">
					<div class="container">
						<figure class="four columns"><img src="<?php bloginfo('template_url') ?>/img/receitas.png"></figure>
						<div class="nine columns">
							<h2>MEU LIVRO DE RECEITA</h2>
							<h3>Este é o seu livro de receitas. Aqui você pode consultar, guardar e cadastrar a sua receita favorita. Nosso sistema deixa tudo guardado e organizado, para quando você precisar.</h3>
						</div>
						
						<?php 
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
			
			<?php 
				get_template_part( 'content', 'cadastro' );
			?>

			<div class="thirteen columns" id="category-receita">
		<?php
			$categoria = get_categories('child_of=1');

			if(isset($_GET['category-slug'])){
				$slug = $_GET['category-slug'];
			}else {
				$slug = "aves";
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
		<?php



		 if ( have_posts()  && isset($_GET['category-slug'])) {
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
				
		}else {
			// // The Query
			query_posts("category_name='aves'");

			// // The Loop
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
				
			// Reset Query
			wp_reset_query();
			?>
			<!-- <h1 id="selecionar">Para começar, selecione uma receita acima :)</h1> -->
<?php

		}
		?>

		</div>

		<?php
		}//endif
	?>

		<?php get_footer(); ?>