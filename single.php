<?php
get_header();
?>

<div class="grid-x">
	<section id="primary" class="content-area cell small-12">
		<main id="main" class="site__main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'single' );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</main> <!-- #main -->
	</section><!-- .content-area -->
</div><!-- /.grid-x -->

<?php
get_footer();
