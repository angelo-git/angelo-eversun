<?php

/*
Template Name: Mono Column
*/

?>


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
     <div id="header-right"></div>
   
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

<div id="content" class="widecolumn" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
	
	</div>

<div style="clear:both"></div>
</div>

	<?php wp_footer(); ?>
 </div>   

	<div id="footer">
    
    <div class="content">
    <?php 

			if ( function_exists('wp_nav_menu') ) {

				wp_nav_menu( array( 
		
					'sort_column' => 'menu_order', 
		
					'menu' => 'Footer Nav'
		
				) );
		
			}

		?>
        <div style="clear:both"></div>
		<p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
	     
        </p>
	</div>
    
	    </div>
<!--[if IE 6]></div> <![endif]-->
<!--[if IE 7]></div> <![endif]-->	        
</body>
</html>

