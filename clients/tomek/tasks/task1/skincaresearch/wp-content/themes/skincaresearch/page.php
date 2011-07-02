<?php get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<!--<h2><?php the_title(); ?></h2>-->
			<div class="entry">
				<?php
					 $r_ingridients = get_post_meta($post->ID, 'r_ingridients',true);
					 $r_results = get_post_meta($post->ID, 'r_results',true);
					 $r_value = get_post_meta($post->ID, 'r_value',true);
					 $average = ($r_ingridients + $r_results + $r_value)/3;
					 $average = substr($average,0,3);
				
					$img = "<img src=\"/createBar.php?a={$r_ingridients}&b={$r_results}&c={$r_value}\" style=\"margin-left:15px\" />";
					$content  = get_the_content(); 
					$content = str_replace('{%average%}',$average,$content);
					$content = str_replace('{%rate%}',$img,$content);
					$content;
					echo do_shortcode($content);
				?>
				<div id="comments">
				<?php comments_template( '', true ); ?>
				</div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
        <div style="clear:both;"></div>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	
	
	</div>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>