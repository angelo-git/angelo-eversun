
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
										echo 'Vestibulum ante ipsum primis in faucibus luctus et ultrices posuere cubilia Curae';
									?>
								</a>
						  </h2>
						  <div class="clr">
						  </div>    						  
							<?php
								//the_content();								
							?>						
							<div>
							<p style='float: left; width: 300px; margin-right: 20px;'>
								<span>Nullam luctus egestas convallis. Quisque vulputate tincidunt ornare. Duis malesuada massa ut purus elementum sed facilisis odio porttitor. Aenean sit amet leo odio, at convallis enim. Pellentesque congue tempus ipsum eu vestibulum. Mauris consequat enim et lectus commodo facilisis lobortis purus viverra. Donec tincidunt aenim eget mi commodo ullamcorper fringilla libero mattis. In aliquet, est vitae iaculis placerat, elit nibh pharetra tortor, eget consequat magna turpis adipiscing est. Nam vel dolor vel odio egestas cursus ac vel metus. Nullam euismod ipsum malesuada dolor ullamcorper pellentesque.
								</span>								
							</p>
							<img src="<?php echo bloginfo('template_url');?>/images/product_p1.png"/>
						<!-- <p class="postmetadata">
								<?php //_e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
								<?php //comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
							</p>		  						
							-->
							</div>
							<br>
							<div>
							<p style='float: left;'>
								Sed lorem augue, placerat et ultrices eu, lacinia non lorem. Suspendisse elementum interdum placerat. In egestas tellus quis libero consectetur eleifend. Vestibulum ultricies semper leo ac elementum. Morbi accumsan bibendum laoreet. Nam lectus magna, viverra quis sagittis et, ullamcorper in sem. Mauris elementum commodo urna lobortis volutpat. Curabitur in ligula lectus. Vivamus at libero in eros ultrices posuere. Duis sapien lacus, tristique sed volutpat vel, pretium ac metus. Aliquam urna magna, dignissim nec congue eget, lacinia quis eros. Mauris enim elit, feugiat eu pharetra et, pellentesque id dolor. Nulla consectetur egestas bibendum. Curabitur libero erat, pellentesque id suscipit vel, luctus et neque. Ut vestibulum eleifend lacus, quis imperdiet tellus congue in. Vivamus blandit, nulla sed porta dictum, augue erat consectetur mi, in consectetur metus risus ac lorem. Duis nec dui id mi tempus rutrum quis blandit arcu. Donec ac magna sed urna imperdiet vehicula. Sed ac sem nibh. Fusce non nulla non quam imperdiet hendrerit et non elit.
								</p>	
								<p>	
								Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed in ligula nec diam hendrerit dictum. Proin eget urna dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam luctus sodales dolor, vitae iaculis arcu eleifend at. Aliquam vel eros id nisl fringilla tristique. Duis elementum lorem non arcu porta in dignissim tortor condimentum. Maecenas a odio eros. Quisque iaculis tempus volutpat. Sed tincidunt, purus vel convallis placerat, erat turpis sollicitudin metus, sed rhoncus turpis ligula in purus. Sed blandit lorem eu tellus dignissim vulputate sodales urna laoreet. Cras pulvinar arcu sed ligula rutrum volutpat lacinia nunc laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus iaculis feugiat urna, eget pulvinar augue vehicula sed. Suspendisse semper consectetur risus vel gravida. Morbi vel leo augue, sed adipiscing ante. Fusce vel ante justo. Morbi tincidunt, lectus ut mattis egestas, tortor est facilisis neque, eu consequat ligula erat a magna. Fusce quis euismod sem. 
							</p>
							</div>
							
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
	<!-- end content --> 