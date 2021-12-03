<?php
get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site__main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content' );
		endwhile;
		?>
	</main> <!-- #main -->
</section><!-- .content-area -->

<?php
get_footer();
