<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>



<footer id="footer">
	<div class="container">
		
		<article class="four columns" id="logo-ft">
			<figure>
				<img src="<?php bloginfo('template_url'); ?>/img/logomarca-footer.png">
				<figcaption>Nossa missão é desenvolver ideias e produtos que atendam às necessidades dos consumidores e, assim, promovam o bem-estar dsa pessoas</figcaption>
			</figure>
		</article>

		<!-- <article class="four columns" id="pesquisar-site">
			<h6>PESQUISAR NO SITE</h6>	
			<form action="">
				<label for="busca">Aqui você pode fazer uma busca por todo o site</label>
				<input type="text" value="">
				<input type="submit" value="">
			</form>
		</article> -->

		<article class="eight columns" id="explore">
			<h6>Explore</h6>

			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Sobre a ASA</a></li>
				<li><a href="">Novidades</a></li>
				<li><a href="">Produtos</a></li>
				<li><a href="">Contato</a></li>
			</ul>

			<ul>
				<li><a href="">Receitas</a></li>
				<li><a href="">Blog Pra Toda Casa</a></li>
				<li><a href="">Mundo Limpo</a></li>
				<li><a href="">Login</a></li>
			</ul>
		</article>

		<article class="four columns">
			<p>Criado por Aporte Comunicação 2014</p>
			<p>© 2014 ASA. Todos os direitos reservados.</p>
		</article>
	</div>
</footer>

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
	(function($){
		$("#nascimento").on("focus",function(e){
			$(this).attr("type","date");
		});

		$("#nascimento").on("blur",function(){
			$(this).attr("type","text");
		});

		$('.carrosel').bxSlider({
		    slideWidth: 700,
		    minSlides: 3,
		    maxSlides: 3,
			moveSlides: 1,
		    slideMargin: 50,
		    touchEnabled:true,
		    pause: 2000,
		    speed:1500,
			auto: true,
		    easing: "easeOutQuad",
		    pager:false
		 });

		setTimeout(function(){
			$(".fechar-produto").click(function(){
				$("#modal-produtos").fadeOut();
			})

			$("#produtos-box footer img").click(function(){
				var $obj = $(this);

				$(".geral-marcas h4").text($obj.data('title'));
				$(".geral-marcas h6").html($obj.data('caption'));
				$(".geral-marcas img").attr('src',$obj.attr('src'));

				$("body,html").animate({
					scrollTop: 0
				},'slow',function(){
					$("#modal-produtos").fadeIn();
				});


				return false;
			});
		},1000);

		// $("#produtos-box ul").roundabout();

		$(".btn-add").click(function(){
			$obj = $(this);
			//verifica se o usuario está logado
			if($(".opcoes").size()){
				$.ajax({
					type: "GET",
					url: $(this).attr("href"),
					success: function(data){
						$obj.addClass("add-success");
					},
					error: function(error){
						alert("erro na conexão");
					}
				});
			}else {
				alert("Você deve se cadastrar ou entrar com seu login e senha");
			}
			return false;
		})

		$(".sair").click(function(){
			$.ajax({
				type: "GET",
				url: $(this).attr("href"),
				success: function(){
					location.href="<?php bloginfo('url') ?>/category/receitas/"
				},
				error: function(error){
					alert("erro na conexão");
				}
			})
			return false;
		});

		$(".salvar-uniform").click(function(){
			var condicao;
			if($(".uniform input[id='nome']").val() == ""){
				
				$(".alerta-cad").html("Preencha seu nome").slideDown('slow');
		return false;

			}else if($(".uniform input[id='email']").val() == ""){
				
				$(".alerta-cad").html("Preencha seu email").slideDown('slow');
		return false;

			}else if(!document.querySelector("#aceitar:checked")){
				
				$(".alerta-cad").html("Você deve aceitar os termos").slideDown('slow');
		return false;

			}else if($("#senha-cad").val() == ""){
				$(".alerta-cad").html("Preencha sua senha").slideDown('slow');
				return false;

			}else if($("#senha-cad").val() != $("#confirmar").val()){

				$(".alerta-cad").html("Senhas não conferem").slideDown('slow');
				return false;
			}
		});
	})(jQuery);
</script>

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/bibliotecas/all-js.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>