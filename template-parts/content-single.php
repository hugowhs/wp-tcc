<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
	<header class="entry__header">
		<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>

		<div class="entry__meta">
			<?php w2ztheme_posted_by(); ?>
			<?php w2ztheme_posted_on(); ?>
			<span class="comment-count">
				<?php w2ztheme_comment_count(); ?>
			</span>
		</div><!-- .entry__meta -->

	</header><!-- .entry-header -->

	<div class="grid-x grid-margin-x">
		<div class="cell medium-4">
			<?php w2ztheme_post_thumbnail(); ?>
		</div>

		<div class="cell medium-8">
			<div class="entry__content">
				<?php the_content(); ?>
			</div><!-- .entry__content -->
		</div>
	</div>
</article><!-- article -->
