<?php
get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site__main">
        <?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>
	</main> <!-- #main -->
</section><!-- .content-area -->

<?php
get_footer();
