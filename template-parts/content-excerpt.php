<article id="post-<?php the_ID(); ?>" class="entry">
	<header class="entry__header">
		<h2 class="entry__title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<?php w2ztheme_post_thumbnail(); ?>

	<div class="entry__content">
		<?php the_excerpt(); ?>
	</div><!-- entry-content -->
</article><!-- article -->
