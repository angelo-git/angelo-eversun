<?php

/*
Template Name: Home Page
*/

get_header(); ?>

<div id="content" class="featured-product" role="main">

	<?php dynamic_sidebar("Featured-Product-Home");?>
	<?php dynamic_sidebar("Skincare-News-Home");?>
	<div id="allnews"> 
		<div id="news1">
	  		<?php dynamic_sidebar("Skincare-News1-Home");?>
		</div>
		<div id="news2">
	  		<?php dynamic_sidebar("Skincare-News2-Home");?>
	  	</div>
	   	<div id="news3">  
			<?php dynamic_sidebar("Skincare-News3-Home");?>
		</div>
		<div id="news4">
			<?php dynamic_sidebar("Skincare-News4-Home");?>
		</div>
  	</div>
</div>
 	<div id="sidebar_right_upper_subs">
 		<?php dynamic_sidebar("Footer-Sitewide"); ?>
 	</div>
	<div id="sidebar_right_upper" role="complementary">
		<?php dynamic_sidebar("Right_Upper_Sidebar-Home");?>
	</div>
	
<div style="clear:both"></div>
</div>

<div id="lower_content">

<h2 class="widgettitle">Top 5 products</h2>
<?php
$id_array = showTopTenByScore();

for($z = 0; $z <= 4 ; $z++):
	array_pop($id_array);
endfor;

$i=1;

foreach($id_array as $rec):

//begin get pages
$args=array(
   'post_type'=>'page',
   //'post_limits'=>5,
   //'posts_per_page'=>5,
   //'post__in' => $rec //$rec //array(121,138,131,128,239,134,118,126,124,136)
   'page_id' =>$rec
);

$the_query = new WP_Query($args);

//print_r($the_query);


?>
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : 
		$the_query->the_post(); 
		
		$r_ingridients = get_post_meta($post->ID, 'r_ingridients',true);
		$r_results = get_post_meta($post->ID, 'r_results',true);
		$r_value = get_post_meta($post->ID, 'r_value',true);
		$average = ($r_ingridients + $r_results + $r_value)/3;
		$average = substr($average,0,3);

		$score = getStarRating($post->ID);
		?>
		
<!--begin loop-->
<h3><a href="<?php the_permalink(); ?>"><span class="numsign">#</span><span class="topnum"><?php echo $i?></span> - &nbsp;<?php echo the_title()?></a></h3>
<div class="imgholder">
  <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($parent, array(90,90)); ?>&nbsp;</a></div>
<div style="width:500px" class="clearfix">

	<div class="mid clearfix">
		<div class="average">
			<span><?php echo $average?></span> Editors Score
		<!--img src="http://www.skincaresearch.com/wp-content/uploads/2010/11/anti-aging-score.gif" align="left"/-->
		</div>
		<div class="sign-in"> 
			<span> My Rating:</span> <a href="/wp-login.php?action=register">Sign in to rate</a>
		</div>
		<div class="spacer"></div>
		<div class="star-compare">
			<div class="rating">
				<?php echo do_shortcode('[fvStartComment id='.$post->ID.']'); ?> <span>Average Customer Rating</span>
			</div>
			<!-- <div class="checkbox"> <label><input type="checkbox" class="chk" name="chkbox1" value="1" /> &nbsp;Compare</label></div -->
		</div>
		
		<div class="spacer"></div>
		<!--
		<div class="manufacturer-info">
		<img src="http://www.skincaresearch.com/wp-content/uploads/2010/11/arrow.gif" align="absbottom"/><a href="<?php the_permalink()?>">See the complete manufacturer info</a>
		</div>
		-->
		<div class="readfull" >
		<img src="http://www.skincaresearch.com/wp-content/uploads/2010/11/arrow.gif" align="absbottom"/><a href="<?php the_permalink(); ?>">Read full review</a></div>
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

    
    
    <div style="clear:both" class="divider"></div>
	
<!--end loop-->
<?php $i++;
endwhile; endif; endforeach; ?>

</div>

 <div id="skincare-tips" role="complementary">
    		
			<?php dynamic_sidebar("Skincare-Tips-Home");?>
	</div>


<div style="clear:both"></div>
<?php get_footer(); ?>