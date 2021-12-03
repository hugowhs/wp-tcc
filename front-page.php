<?php
get_header();
?>

<section id="primary" class="content-area front-page">
	<div class="ultimos-livros-postados">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="cell medium-12">
					<h1 class="title">Últimos Livros Postados</h1>
				</div>

				<?php
					$args = array(
						'posts_per_page' => 8,
						'post_type'      => 'livro',
						'post_status'    => 'publish',
					);

					$ultimos_livros_postados_query = new WP_Query( $args );

					while ( $ultimos_livros_postados_query->have_posts() ) :
						$ultimos_livros_postados_query->the_post();
						get_template_part( 'template-parts/livro', 'card' );
					endwhile;
					wp_reset_postdata();
				?>

				<div class="cell medium-12 text-center">
					<a href="<?php echo home_url( 'livros' ); ?>" class="button">Ver Todos os Livros</a>
				</div>
			</div>
		</div>
	</div>
</section><!-- .content-area -->

<?php
get_footer();
