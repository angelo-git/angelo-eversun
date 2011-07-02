
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if IE 6]><div id="ie6"><![endif]-->
<!--[if IE 7]><div id="ie7"><![endif]-->

<div id="Wrapper">

<div id="main">
<div id="header" role="banner">
	<div id="headerimg">
		<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="<?php bloginfo('name'); ?>" /></a>
       
	</div>
     <div id="header-right">
     <?php dynamic_sidebar("Header-Sitewide");?>
     </div>
     
         <div id="hnav">
     
     <?php 

			if ( function_exists('wp_nav_menu') ) {

				wp_nav_menu( array( 
		
					'sort_column' => 'menu_order', 
		
					'container_id' => 'hnav'
		
				) );
		
			}

		?>
     </div>
   
</div>
 

