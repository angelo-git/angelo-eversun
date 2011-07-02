<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript" src="<?php bloginfo('home') ?>/wp-includes/js/jquery/jquery.js">	
		</script>	
		
    </head>
    <body>
	<?php
			wp_deregister_script('jquery');			
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js', array(), '1.4', true);
		?>
	<div id="wrapper">
	<?php
		//get_header();
		include_once('header.php');
	?>
        <div id="content_wrapper"> 
			<div id="content">
				<div id="main_content">	
					<div id="top_main_content">						
					</div>
					<div class="clr"></div>
					<div id="left_main_content">
					</div>
					<div id="right_main_content">
					</div>
					<div class="clr"></div>
				</div>
			</div>
			<div id="sidebar">
			</div>
        </div>
	</div>	
    </body>
</html>
