<?php get_header();
/*
Template Name: 	Livro de Receitas
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
		?> 
			</div>
			<!-- END CATEGORIAS -->

				<h3 class="my-book">Meu livro de receitas</h3>

				<?php 
				$id = $_SESSION['id'];
					$query = mysql_query("select * from user_receitas where id_user='$id'")or die(mysql_error());
					
					while($receita = mysql_fetch_array($query)){
						$receita_query =  mysql_query("select * from wp_posts where ID='$receita[id_receita]'")or die(mysql_error());

						if(mysql_num_rows($receita_query)){
							while ($user_receitas = mysql_fetch_array($receita_query)) {
							?>
								
								<div class="four columns box-receitas">
									
								<?php
								    $url =  wp_get_attachment_url( get_post_thumbnail_id($user_receitas['ID']) );
								?>
									<a href="<?php echo $user_receitas['guid'] ?>"><img src="<?php echo $url ?>" alt=""></a>
									<a href="<?php echo $user_receitas['guid'] ?>"><p><?php echo $user_receitas['post_title'] ?></p></a>
									<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(37); endif; ?>
								</div>
								
							<?php
							}
							//endwhile

					}
					
					}
					//endif
				?>

		</div>
		<?php get_footer(); ?>