<?php get_header(); ?>
<div style="float:left; width:200px; padding:0 10px 0 0; margin-top:14px;">
	<?php dynamic_sidebar("Left Column");?>
</div>
	<div id="content" class="narrowcolumn" role="main" style="width:544px; float:left;">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                
                <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
                </h2>
				

				<div class="entry">
				
					<?php
					$img = '<img src="'.createOverallScore(9,10,8).'" />';
					$content  = get_the_content(); 
					$content = str_replace('{%rate%}',$img,$content);
					echo $content;
					?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?php wp_pagenavi(); ?>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
