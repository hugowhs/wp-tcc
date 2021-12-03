<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header class="site-header">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-middle">
				<div class="cell medium-4">
					<div class="header-logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/imagemlogo.png"></a>
					</div>
				</div>

				<div class="cell medium-8">
					<div class="search-bar">
						<?php echo do_shortcode( '[ivory-search id="20" title="Default Search Form"]' ); ?>
					</div>
				</div>
			</div>

			<div class="header-nav-container">
				<?php w2ztheme_nav_main(); ?>
			</div>
		</div>
	</header><!-- .site-header -->


	<div id="content" class="site__content">