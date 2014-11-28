<?php get_header();
/*
Template Name: Mundo limpo
*/
 if (have_posts()) :
while (have_posts()) : the_post(); ?>

	<figure id="slide-sobre">
		<span id="logo-mundo"></span>

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
	<section class="mundo-limpo" id="post-interna">
		<div class="container">
			<header id="produtos" class="sixteen columns">
				<h2 id="sobre-title">Mundo Limpo</h2>
				
				<ul id="lista-servicos" class="mundo-limpo-servicos">
					<li><a href="#" data-title="programa" class="ativo-sobre" id="programa">O programa</a></li>
					<li><a href="#" data-title="participa" id="participa">Como você participa</a></li>
					<li><a href="#" data-title="pontos" id="pontos">Pontos de coleta</a></li> 
					<li><a href="#" data-title="empresas" id="empresas">Parcerias com empresas</a></li>
					<li><a href="#" data-title="cartilha" id="cartilha">Baixe a cartilha</a></li> 
					<li><a href="#" data-title="contato" id="contato">Contato</a></li>
				</ul>
			</header>
		</div>

		<article>
			<div class="container">
				<div class="esconde-sobre">
					<?php the_content() ?>
				</div>
			</div>

			<div id="conteudo-sobre">
				<div class="container">
					<h3>O programa</h3>
				</div>	

				<div id="dinamic"></div>

				<div id="contato-form" class="container">
					<p>Para falar com a nossa equipe, use os meios de contato abaixo. Por eles você pode fazer o primeiro contato e pegar informações sobre o programa.</p>
					
					<div class="wpcf7" id="wpcf7-f218-p181-o1" lang="pt-BR" dir="ltr">
					<div class="screen-reader-response"></div>
					<form name="" action="/asa/mundo-limpo/#wpcf7-f218-p181-o1" method="post" class="wpcf7-form" novalidate="novalidate">
					<div style="display: none;">
					<input type="hidden" name="_wpcf7" value="218">
					<input type="hidden" name="_wpcf7_version" value="4.0.1">
					<input type="hidden" name="_wpcf7_locale" value="pt_BR">
					<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f218-p181-o1">
					<input type="hidden" name="_wpnonce" value="559f58ba84">
					</div>
					<p>Nome<br>
					    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
					<p>Endereço completo<br>
					    <span class="wpcf7-form-control-wrap endereco"><input type="text" name="endereco" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
					<p>Email<br>
					    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </p>
					<p>Telefone<br>
					<span class="wpcf7-form-control-wrap tel-530"><input type="tel" name="tel-530" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false"></span> </p>
					<p>Sua mensagem<br>
					    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </p>
					<p><input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://localhost/asa/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando ..." style="visibility: hidden;"></p>
					<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
				</div>
			</div>
		</article>
	</section>

<?php endwhile; endif; 
get_footer(); ?>