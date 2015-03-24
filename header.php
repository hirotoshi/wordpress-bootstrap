<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<!-- IE8 fallback moved below head to work properly. Added respond as well. Tested to work. -->
			<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		
			<!-- respond.js -->
		<!--[if lt IE 9]>
		          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<![endif]-->	
	</head>
	
	<body <?php body_class(); ?>>
		<header role="banner">
			<div class="<?php echo wpb_navbar_class() ?>">
				<div class="container">
					<div class="navbar-header">
						<?php if (is_active_sidebar('header')) :?>
						<button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <i class="fa fa-bars"></i>
						</button>
						<?php endif ?>

						<?php if (is_home()) : ?>
						<h1>
							<?php endif ?>

							<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
								<?php if (get_header_image()) :?>
								<img class="img-responsive"  src="<?php header_image(); ?>" alt="<?php bloginfo('nam') ?>" />
								<?php else : ?>
								<span class="blog-title"><?php bloginfo('name'); ?></span>
								<?php endif ?>
							</a>

							<?php if (is_home()) : ?>
						</h1>
						<?php endif ?>



					</div>

					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<?php dynamic_sidebar( 'header' ); ?>
					</div>

				</div> <!-- end .container -->
			</div> <!-- end .navbar -->

		</header> <!-- end header -->

		<div class="container">
