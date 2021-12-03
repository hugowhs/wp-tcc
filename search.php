<?php
get_header();
?>

<div class="grid-x">
	<section id="primary" class="content-area cell medium-12">
		<main id="main" class="site__main">
			<?php if ( have_posts() ) : ?>

				<header class="page__header">
					<h1 class="page__title">Resultados da busca por: <?php echo get_search_query(); ?></h1>
				</header><!-- .page-header -->

				<div class="grid-x grid-margin-x">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/livro', 'card' );
				endwhile;

				w2ztheme_pagination();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
			</div>
		</main> <!-- #main -->
	</section><!-- .content-area -->
</div><!-- /.grid-x -->

<?php
get_footer();
