	<?php wp_footer(); ?>
 </div>   

	<div id="footer">
	
	<?php /*
		$menu =  $post->post_name;
		if($menu == "anti-wrinkle-cream"):  /* || $menu == "perricone-md-cold-plasma-face-eyes"*/ 
	?>
		<div id="footer_home">
			<p class='copyright'>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> Inc. All Rights Resereved.</p>
			<br />
	    		<?php 
		
					if ( function_exists('wp_nav_menu') ) {
						wp_nav_menu( array( 
							'sort_column' => 'menu_order', 
							'menu' => 'Footer Nav2'
						) );
					}		
				?>
		</div>
	<?php /*else:*/ ?>
	
		<?php /*dynamic_sidebar("Footer-Sitewide");*/ ?>
	<!--		
	    <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> Inc.<br />
	    All Rights Resereved. skincareviews.com
		     
	        </p>
	    <div class="content">
	    <?php 
	
				if ( function_exists('wp_nav_menu') ) {
	
					wp_nav_menu( array( 
			
						'sort_column' => 'menu_order', 
			
						'menu' => 'Footer Nav'
			
					) );
			
				}
	
			?>
	        <div style="clear:both"></div>
			
		</div>
	-->
	<?php /*endif;*/ ?>
	</div>
    
<!--[if IE 6]></div> <![endif]-->
<!--[if IE 7]></div> <![endif]-->	        
</body>
</html>