

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
<?php
get_header(); 
?>
<!-- content -->
<div class="content">
    <div class="content_resize">
      <div class="mainbar">    
		<?php if (have_posts()) 
					while (have_posts()) { the_post(); ?>
						<div class="article" id="post<?php the_ID(); ?>">						
						  <h2>					
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php 
								</a>
						  </h2>
						  <div class="clr">
						  </div>    						  
							<?php
								//the_content();								
							?>						
						<!-- <p class="postmetadata">
								<?php //_e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
								<?php //comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
							</p>		  						
						</div>
					<?php
					}
					?>	
					<?php posts_nav_link(); ?>					
      </div>	  
	  <?php
		get_sidebar();				
	  ?>	  	  	 
      </div>
	  <div class="clr"></div>
	  <?php
		get_footer();
	  ?>
    </div>
</body>
</html>