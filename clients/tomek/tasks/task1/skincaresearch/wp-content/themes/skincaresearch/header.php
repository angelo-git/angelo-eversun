<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '&laquo;', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<style tyle="text/css">
* full clearfix */
    /* add to floating elements which shall clear floating after themselves */ 
	* html .clearfix {
	    height: 1%; /* IE5-6 */
	    }
	*+html .clearfix {
		display: inline-block; /* IE7not8 */
		}
	.clearfix:after { /* FF, IE8, O, S, etc. */
	    content: ".";
	    display: block;
	    height: 0;
	    clear: both;
	    visibility: hidden;
	    }
</style>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(getBrowser()); ?>>
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
   
     <div style="clear:both"></div>

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