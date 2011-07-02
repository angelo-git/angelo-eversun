
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" style="margin-top: 0">
<head>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<script type="text/javascript" language="javascript" src="<?php echo bloginfo('template_url')?>/js/jquery.js"></script>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<title><?php bloginfo('name');  wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<script type='text/javascript'>
jQuery(document).ready(function() {
//$("#dropmenu ul").css({visibility: "hidden"}); // Opera Fix

jQuery("#dropmenu li").hover(function(){
jQuery(this).find('ul:first').css({visibility: "visible"});
},function(){
jQuery(this).find('ul:first').css({visibility: "hidden"});
});


jQuery("#txt_newsletter").val('Enter your email here...');
jQuery("#txt_newsletter").click(function (){
	jQuery("#txt_newsletter").val('');
});

jQuery("#txt_newsletter").blur(function (){
	jQuery("#txt_newsletter").val('Enter your email here...');
});

});


</script>


<div id="wrapper">
	<?php
		get_header(); 
	?>
	<div id="content" class="clearfix">
		<div id="wrapper_content">
			<div id="main_content">
				<?php
					the_post();
					the_content();
				?>
			</div>
			<?php
				get_sidebar();
			?>
		</div>	
	</div>	
</div>
</body>
</html>