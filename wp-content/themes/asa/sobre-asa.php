<?php get_header();
/*
Template Name: Sobre a asa
*/
 if (have_posts()) :
while (have_posts()) : the_post(); ?>

	<figure id="slide-sobre">
		<?php $attachments = new Attachments( 'attachments' ); 
			if( $attachments->exist() ) : ?>
				<?php while( $attachments->get() ) : ?>
					<a href="#" style="background-image:url(<?php echo $attachments->src( 'full' ); ?>)"></a>
				<?php endwhile; 
				else :
					echo "<p>Sem imagens cadastradas<p>";
				endif; ?>
				</ul>
	</figure>
	<section class="container" id="post-interna">
		<header id="produtos" class="sixteen columns">
			<h2 id="sobre-title">Sobre asa</h2>
			
			<ul id="lista-servicos">
				<li><a href="#" data-title="quem-somos" class="ativo-sobre">Quem somos</a></li>
				<li><a href="#" data-title="parques">Parques industriais</a></li>
				<li><a href="#" data-title="representantes">Representantes</a></li>
				<!-- <li><a href="#" data-title="distribuicao">Distribuição</a></li> -->
			</ul>
		</header>

		<article>
			<div class="esconde-sobre">
				<?php the_content() ?>
			</div>

			<div id="conteudo-sobre">
				<h3>Quem somos</h3>

				<div id="dinamic"></div>
			</div>
		</article>
	</section>

<?php endwhile; endif; 
get_footer(); ?>