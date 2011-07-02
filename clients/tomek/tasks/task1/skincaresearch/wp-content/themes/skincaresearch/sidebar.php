<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar" role="complementary">
		<?php dynamic_sidebar("Viewer-Sitewide"); ?>
	</div>
	<div id="sidebar" role="complementary">
			<?php /*dynamic_sidebar("Right_Sidebar-Default"); /*dati ya ini*/ ?>
			
			<h2 class="widgettitle">TOP 10 PRODUCT</h2>	
			<?php
				$short_description = array( 134 => 'Olay Pro-X Deep Wrinkle',
											128 => 'Freeze 24-7 Anti-Wrinkle',
											124 => 'La Prairie Cellular Cream',
											136 => 'Clinique Repairwear',
											138 => 'Dr. Murad Wrinkle Reduc',
											131 => 'Estee Lauder Perfectionist',
											126 => 'StriVectin Wrinkle Serum',
											239 => 'LifeCell Anti-Aging Cream',
											121 => 'Cr&egrave;me De La Mer',
											118 => 'Perricone MD Cold Plasma'
											);
				$id_array = showTopTenByScore();
				
				$i=1;
				
				foreach($id_array as $rec):
				
				//begin get pages
				$args=array(
				   'post_type'=>'page',
				   'page_id' =>$rec
				);
				
				$the_query = new WP_Query($args);
				
				?>
				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : 
					$the_query->the_post(); 
				?>
			
				<div class="content">
					<span><a href="<?php the_permalink()?>"><span>#<?php echo $i; ?></span> - <?php echo $short_description[$post->ID]; ?></a></span>
					<br />
				</div>
				
			<?php $i++;
					endwhile; 
				endif;
			endforeach; 
			?>
			<a href="http://www.lifecellskin.com/">
				<img src="http://www.skincaresearch.com/wp-content/uploads/2011/04/banner2.jpg" class="right-pannel-banner"/>
			</a>
	</div>