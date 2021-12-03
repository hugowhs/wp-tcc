<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
	<header class="entry__header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry__title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<?php w2ztheme_post_thumbnail(); ?>

	<div class="entry__content">
		<?php the_content(); ?>
	</div><!-- .entry__content -->
</article><!-- article -->
