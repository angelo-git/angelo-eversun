<?php 
/**
 * Template Name: Review template
 *
**/

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
			<?php
				$menurev = "review";

				$r_ingridients = get_post_meta($post->ID, 'r_ingridients',true);
				$r_results = get_post_meta($post->ID, 'r_results',true);
				$r_value = get_post_meta($post->ID, 'r_value',true);
				$average = ($r_ingridients + $r_results + $r_value)/3;
				$average = substr($average,0,3);
				
				$img = "<img src=\"/createBar.php?a={$r_ingridients}&b={$r_results}&c={$r_value}\" style=\"margin-left:15px\" />";
				$content  = get_the_content(); 
				$content = str_replace('{%average%}',$average,$content);
				$content = str_replace('{%rate%}',$img,$content);
				
				$product_num = showTopTenByScore();
				$x = array_keys($product_num, $post->ID);
				
				$arrnum_images = array( 'number-one.jpg', 'number-two.jpg', 
										'number-three.jpg', 'number-four.jpg', 
										'number-five.jpg', 'number-six.jpg',	
										'number-seven.jpg', 'number-eight.jpg', 
										'number-nine.jpg', 'number-ten.jpg'
									   );
						
			?>
			<h2><?php the_title(); ?></h2>
			
			<div style="width:435px;float:left;border:0px solid #c00" >
				
				<img class="alignleft size-full wp-image-84" title="number-one" src="http://www.skincaresearch.com/wp-content/uploads/2011/04/<?php echo $arrnum_images[$x[0]]; ?>" alt="" width="84" height="81" />
				<div id="topRating"><strong style="display:block;float:left;line-height:20px;font-size:16px">Overview&nbsp;&nbsp;</strong><?php /*echo do_shortcode("[starrater tpl=10 read_only=1 size='20']");*/ ?></div>
				<p>&nbsp;</p>

				<?php the_content(); ?>
				
			<div style="margin: -100px -100px 0 0; width: 250px;float: right; clear: both; display: block">
					<div id="write-review2" style="float: right;">
						<?php if($post->ID == 239): ?>
							<span class="write-review2"><a href="http://www.lifecellskin.com/" target="_blank"></a></span>
						<?php else: ?>
							<span class="write-review2"><a href="#"></a></span>
						<?php endif; ?>
						
					</div>
					<span style="float: right; padding-right: 10px;margin-top: 13px"><a href="#">Sign in and</a></span>&nbsp;
				</div>							
			</div>
			
			<div id="middle-rating" >
				<div style="width: 202px; border: 1px solid #dfeab0; margin-bottom: 10px;">
				<h5 style="background: url(http://www.skincaresearch.com/images/h5.gif); padding: 6px 23px 6px; margin: 0px; font-size: 1.2em; text-align: center;">Editors' Rating: <span style="font-size: 1.4em;"><?php echo $average?></span></h5>
				<?php echo $img?>
				</div>
				<div style="width: 205px; margin: 10px 0;">
					<?php showRatingGraph($post->ID)?>			
				</div>
				<div style="width: 192px; border: 1px solid #dfeab0; margin-bottom: 0px; text-align: center; padding:5px;">
				
				<!-- img class="aligncenter" title="Lifecell" src="http://www.skincaresearch.com/images/lifecell.jpg" alt="Lifecell" width="183" height="209" style="display:block" / -->
				
				<?php
						$parent = $post->post_parent ?  $post->post_parent : $post->ID;  
						
						echo get_the_post_thumbnail($parent, 'full');
				?>
				
				</div>
				<div id="tryitfree">
					<div class='divtryitfree'>
						<?php if($post->ID == 239): ?>
							<span class="tryitfree"><a href="http://www.lifecellskin.com/" target="_blank"></a></span>
						<?php else: ?>
							<span class="tryitfree"><a href=""></a></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
			
			<div id="reviews" style="float:left;clear:both;width:100%">
				<h2 class='comments-title'>Most helpful Customers' reviews</h2>
				
				<div id="comments">
						<?php comments_template( '', true ); ?>
				</div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
        <div style="clear:both;"></div>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>