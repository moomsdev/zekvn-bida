<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php wp_head(); ?>
		<?php if(get_option('origin-favicon')){ ?>
		<link rel="shortcut icon" href="<?php echo get_option('origin-favicon');?>" type="image/x-icon">
		<?php }?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/select2.min.css">
		<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/swiper-bundle.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/css/jquery.fancybox.css" />
		<script src="<?php bloginfo('template_url' ); ?>/js/jquery.fancybox.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=<?php echo time();?>">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ajax-search.css?v=<?php echo time(); ?>">
		<?php $value = get_field( 'code_header','option' ); echo $value?>
	</head>
	<body <?php body_class(); ?>>
		<?php $value = get_field( 'code_body','option' ); echo $value?>
		<div id="zek-web">
			<div class="line-dark"></div>
			<header id="header">
				<?php if (is_home() || is_front_page()) { ?>
				<h1 class="site-name" style="display: none;"><?php bloginfo('title'); ?></h1>
				<?php } ?>
				<div class="header-main head">
					<div class="container">
						<div class="header-top">
							<div class="col-logo">
								<div class="logo">
									<a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('title'); ?>"><img src="<?php the_field('logo','option') ?>" alt="<?php bloginfo('title');?>"/></a>
								</div>
							</div>

							<!-- search -->
							<div class="search">
								<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
									<button type="submit" class="search-submit">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#4c4d52" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
									</button>

									<input type="search" class="search-field" placeholder="Tìm kiếm..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
								</form>
							</div>

							<!-- cart -->
							<div class="col-cart">
								<div class="cart">
									<?php echo do_shortcode('[xoo_wsc_cart]'); ?>
								</div>
							</div>

							<!-- menu mobile -->
							<div class="col-touch">
								<div class="touch" id="touch-menu"></div>
							</div>
						</div>

						<!-- menu -->
						<nav class="header-bottom">
							<?php wp_nav_menu( array( 'container' => '','theme_location' => 'main','menu_class' => 'menu' ) ); ?>
						</nav>
					</div>
				</div>
			</header>
			<div id="menu-mobile">
				<div class="close" id="close-menu"></div>
				<?php wp_nav_menu( array( 'container' => '','theme_location' => 'main','menu_class' => 'menu' ) ); ?>
			</div>
