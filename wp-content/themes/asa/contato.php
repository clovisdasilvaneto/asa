<?php get_header();
/*
Template Name: Contato
*/
?> 
<section id="contato">

				<?php if (have_posts()) :

				while (have_posts()) : the_post(); ?>
	<div id="receitas-interna"></div>
	<header class="container">
		<div class="sixteen columns">
			<h2><?php the_title() ?></h2>
		</div>
	</header>
	<article class="container">
		<div class="sixteen columns">
				<ul id="opcoes-contato">
					<li class="active">CONTATO
						<div>
							<p class="description">Preencha o formulário e entre em contato com a nossa central de atendimento. Pode ter certeza que daremos retorno o mais breve possivel.</p>
							<?php the_field('formulario_de_contato'); ?>
						</div>
					</li>

					<li>
						TRABALHE CONOSCO
						<div>
							<p class="description">Quer fazer parte da nossa equipe? Preencha o formulário em envie pra gente junto com seu currículo anexo. Assim que novas oportunidades forem abertas, você será convidado.</p>
							<?php the_field('trabalhe_conosco'); ?>
						</div>
					</li>
					
					<!-- <li><a href="#" target="_blank">APOIO E PATROCÍNIO</a></li> -->

				</ul>
				
				<div id="principal">
					<p class="description">Preencha o formulário e entre em contato com a nossa central de atendimento. Pode ter certeza que daremos retorno o mais breve possivel.</p>
					<?php the_field('formulario_de_contato'); ?>
				</div>
		</div>

<!-- 
						<div>
							<?php
							    $url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							<figure>
								<a href="<?php the_permalink() ?>"><img src="<?php echo $url ?>" alt=""></a>
							</figure>
							
						</div> -->
			</article>

			<aside>
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15803.507593176662!2d-34.912335500000005!3d-8.0116292!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1413739306598" id="mapa" frameborder="0" style="border:0"></iframe> -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.2188360971836!2d-34.903753399999964!3d-8.079150400000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xf3d6fb227b4a8609!2sAsa+Ind+e+Com+Ltda!5e0!3m2!1spt-BR!2sbr!4v1417205297168" id="mapa" frameborder="0" style="border:0"></iframe>
				<address class="container endereco-cont"><span>Localização:</span> Rua da paz n° 82, Afogados. Recife-PE     |     <span>Telefone:</span> 81.30735000</address>
			</aside>

				<?php endwhile; endif; ?>
</section>

 <?php get_footer(); ?>