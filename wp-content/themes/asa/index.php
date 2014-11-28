<?php get_header(); 

?>
<section id="slider">
	<div>
		<?php
			$wp_query = new WP_Query(); 
			$wp_query->query('post_type=slideshow'); 
		 
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
			$url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		 
			<figure>
				<a href="<?php the_field('link-do-slideshow'); ?>"><img src="<?php echo $url ?>" alt="<?php the_title() ?>"></a>
				<figcaption><?php the_title() ?></figcaption>
			</figure>
		 
		<?php endwhile; ?>
	</div>

	<ul>
	</ul>
</section>

<section class="container" id="marcas">
	<div class="sixteen columns">
		<header>
			<h2>As marcas preferidas</h2>
		</header>

	<?php
		global $ancestor;
		
		/*$marcasPosts = query_posts(array('category_name' => 'marcas'));]*/

	     $my_categories = get_categories('child_of=4');
		foreach ($my_categories as $subcategoria) {
			$subcategory_id = get_cat_ID( $subcategoria->slug );
			$subcategory_link = get_category_link( $subcategory_id );
			?>
		<article>
			<a href="<?php echo $subcategory_link ?>?id=<?php echo $subcategory_id; ?>"><header>
				<figure></figure>
				<h3><?php echo $subcategoria->cat_name; ?></h3>
			</header></a>

				<p><?php echo $subcategoria->category_description; ?></p>
				<a href="<?php echo $subcategory_link ?>?id=<?php echo $subcategory_id; ?>" class="setas">Conheça as marcas</a>

				<div>
					<?php 
						$marcas_posts = new WP_Query( array( 'category_name' => $subcategoria->slug, 'order_by'=>'name' ) );
					    $category_id = get_cat_ID( $subcategoria->slug );
    					$category_link = get_category_link( $category_id );

						while ( $marcas_posts->have_posts() ) : $marcas_posts->the_post(); 
						$url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

						if($url){
					?>
						<a href="<?php echo $category_link; ?>?id=<?php echo $category_id; ?>"><img src="<?php echo $url;?>" alt="<?php the_title(); ?>"></a>
					<?php }//endif
					 endwhile ?>
				</div>
		</article>
		<?php
		}
	?>
	</div>
</section>

<section id="marcas-cat">
	<article class="container">
		<div>
		</div>
	</article>
</section>
<!-- END MARCAS -->

<section id="receitas">
	<header>
		<h2>ASA PRA VOCÊ</h2>
	</header>

	<div>
		<?php 

			$receitas_post = new WP_Query( array( 'category_name' => 'receitas', 'order_by'=>'name', 'posts_per_page'=> 8 ) );
			while ( $receitas_post->have_posts() ) : $receitas_post->the_post(); 
			$url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			if($url){

					    $receitas_id = get_cat_ID( 'receitas' );
    					$receitas_link = get_category_link( $receitas_id );
		?>
			<article class="item">
				<figure>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $url ?>" alt="">
					<figcaption>
						<p><?php echo the_title(); ?></p>
					</figcaption>
					</a>
				</figure>
			</article>
		<?php } endwhile; ?>
	</div>
</section>

<section id="busca">
	<article class="container">
		<ul class="redes three columns">
			<li><a href="http://www.facebook.com"></a></li>
			<li><a href="http://www.twitter.com"></a></li>
			<li><a href="http://www.youtube.comn"></a></li>
		</ul>
		<form method="get" id="searchform" action="<?php site_url() ?>" role="search">
			<input type="text" class="field eight columns placeholders" name="s" value="PROCURAR NO SITE DA ASA" data-value="PROCURAR NO SITE DA ASA" id="s">
			<input type="submit" class="submit five columns" name="submit" id="searchsubmit" value="BUSCAR">
		</form>
	</article>
</section>

<section id="content-mundo-asa" class="container">
	<article id="mundo-limpo" class="ten columns">
		<header>
			<h2>MUNDO LIMPO</h2>
		</header>
		<figure>
			<a href="<?php bloginfo('url') ?>/mundo-limpo/"><img src="<?php bloginfo('template_url') ?>/img/mundo-limpo.jpg" alt="Mundo Limpo"></a>
		</figure>
	</article>
	<!-- END MUNDO LIMPO -->

	<article id="asa-news" class="six columns">
		<header>
			<h2>ASA NEWS</h2>
		</header>
		<?php
			$wp_query = new WP_Query(); 
			$wp_query->query('showposts=3&category_name=noticias'); 

  			while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>
		<div>
			<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?> <p></a>
			<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&counturl=<?php the_permalink(); ?>&via=@NinihoTkd" target="_blank"><img src="<?php bloginfo('template_url') ?>/img/twittar.png" alt="Twittar"></a>
			<!-- facebook -->

			<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?> " target="_blank"><img src="<?php bloginfo('template_url') ?>/img/compartilhar.png" alt="Compartilhar no facebook"></a>
			<!-- twitter -->

		</div>
<?php endwhile; ?>
	</article>
	<!-- END ASA NEWS -->
</section>

<section id="fale-conosco">
	<header>
		<h4>FALE COM A ASA</h4>
	</header>

	<ul>
		<li><a href="<?php echo get_site_url(); ?>/contato" class="formulario">
			<figure>
				<figcaption>Formulário</figcaption>
			</figure>
		</a></li>
		<li><a href="<?php echo get_site_url(); ?>/contato" class="trabalhe">
			<figure>
				<figcaption>Trabalhe Conosco</figcaption>
			</figure>
		</a></li>
		<li><a href="<?php echo get_site_url(); ?>/contato" class="onde-estamos">
			<figure>
				<figcaption>Onde Estamos</figcaption>
			</figure>
		</a></li>
	</ul>
</section>

<div class="container">

	<aside class="nine columns redes-sociais-content" id="face-content">
		<div>
			<div class="fb-like-box" data-href="https://www.facebook.com/ASAindustria?fref=ts" data-width="470" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
		</div>
	</aside>

	<aside class="seven columns redes-sociais-content" id="youtube-content">
		<header>
			<a href="https://www.youtube.com/user/fazpartedasuavida" target="_blank"><h6>/fazpartedasuavida</h6></a>

			<figure>
				<iframe width="365" height="184" src="//www.youtube.com/embed/vsKy5UGF0OY" frameborder="0" allowfullscreen></iframe>
			</figure>
		</header>
	</aside>
</div>
<?php get_footer(); ?>