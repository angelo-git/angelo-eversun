<?php

/*
Template Name: Advice Pannel
*/

get_header(); ?>
  <div id="content" class="narrowcolumn" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
		<?php /*?><h2><?php the_title(); ?></h2><?php */?>
			<div class="advice-panel">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
        
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php /*?><?php comments_template(); ?><?php */?>
    
 	</div>
    
    <div id="sidebar" role="complementary">
		<?php dynamic_sidebar("Viewer-Sitewide"); ?>
	</div>
     <div id="moregoodadvice">
    		
			<?php dynamic_sidebar("Advise-Pannel-More-Good-Advice");?>
	</div>
</div>
<?php get_footer(); ?> 