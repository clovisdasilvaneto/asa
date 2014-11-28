<?php get_header();
/*
Template Name: Notícias
*/
query_posts('cat=2'); ?>


	<section class="container" id="post-interna">
		<header id="produtos" class="sixteen columns">
			<h2>Asa News</h2>
			<h3 id="subtitle-news">Acompanhe as notícias da ASA e fique sabendo de tudo sobre produtos, eventos, lançamentos e campanhas</h3>
		</header>

		<article class="container" id="news">
			
			<?php if (have_posts()) :

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
			<?php endwhile; endif; ?>
		</article>
		<article class="container content-receitas">
			<form role="search" method="get" class="sixteen columns" id="buscar-noticias" action="<?php bloginfo('home'); ?>">
				<input type="text" value="" name="s" id="s" placeholder="Encontre sua receita">
				<input type="hidden" name="cat" value="2" />
				<input type="submit" value="BUSCAR">
			</form>
		</article>
	</section>

 <?php get_footer(); ?>