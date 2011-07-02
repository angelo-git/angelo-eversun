<?php
/*
*	Template name: Top 10 Template
*/
get_header(); ?>

<div id="content" class="narrowcolumn" role="main">
	<h2 class="widgettitle">Top 10 products</h2>

		<?php
		
		$id_array = showTopTenByScore();

		$i=1;

		foreach($id_array as $rec):
		
		//begin get pages
		$args=array(
		   'post_type'=>'page',
		   //'post_limits'=>10,
		   //'posts_per_page'=>10,
		   //'post__in' => array( 239, 118, 121, 124, 126, 128, 131, 134, 136, 138 )
		  'page_id' => $rec
		);
		
		
		$the_query = new WP_Query($args);
		
		//var_dump($the_query);
		
		//$i=1;
		
			
		
		?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : 
				$the_query->the_post(); 
				
				$r_ingridients = get_post_meta($post->ID, 'r_ingridients',true);
				$r_results = get_post_meta($post->ID, 'r_results',true);
				$r_value = get_post_meta($post->ID, 'r_value',true);
				$overview = get_post_meta($post->ID,'overview',true);
				$average = ($r_ingridients + $r_results + $r_value)/3;
				$average = substr($average,0,3);
				
				$score = getStarRating($post->ID);
		?>
				
		<!--begin loop-->
		<div id="lower_content" style="width: 685px;">
			<h3><a href="<?php the_permalink()?>"><span class="numsign">#</span><span class="topnum"><?php echo $i?></span> - &nbsp;<?php echo the_title(); ?></a></h3>
			<div class="imgholder2"><a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail($parent); ?>&nbsp;</a></div>
			<div>
				<div class="mid">					
					<div class="average"><span><?php echo $average?></span> Editors Score</div>
					<div class="sign-in"><span> My Rating:</span> <a href="/wp-login.php?action=register">Sign in to rate</a></div>
					<div class="spacer"></div>
					<div class="star-compare">
						<?php echo do_shortcode('[fvStartComment id='.$post->ID.']'); ?> <span>Average Customer Rating</span>
						<!--<div class="checkbox"> <label><input type="checkbox" class="chk" name="chkbox1" value="1" /> &nbsp;Compare</label></div> -->
					</div>
					<div class="spacer"></div>
					<!-- <div class="manufacturer-info"><img src="http://www.skincaresearch.com/wp-content/uploads/2010/11/arrow.gif" align="absbottom"/><a href="<?php the_permalink()?>">See the complete manufacturer info</a></div> -->
					<div class="readfull" ><img src="http://www.skincaresearch.com/wp-content/uploads/2010/11/arrow.gif" align="absbottom"/><a href="<?php the_permalink(); ?>">Read full review</a></div>
				</div>
				<form method="get">			
					<div id="submit-button" >
						<input type="button"  id="write-review"  value=""  onClick="window.location.href='<?php the_permalink(); ?>'; " />
						<?php if($post->ID == 239): ?>
							<input type="button" id="buy-here" value="" onClick="javascript: window.open('http://www.lifecellskin.com/'); /*window.location='http://www.lifecellskin.com/';*/ "/>
						<?php else: ?>
							<input type="submit" id="buy-here" value="" />
						<?php endif; ?>
					</div>    
				</form>
			</div>
			<div id="overview">
				<h4>Overview</h4>
				<p><?php echo $overview; ?></p>
			</div>
		</div>
		<div style="clear:both" class="divider"></div>
	<!--end loop-->
	<?php 
		$i++;
 		endwhile; 
 		endif;
 		endforeach;
 	?>
 	<div style="clear:both"></div>
 	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>