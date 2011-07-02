<!-- start sidebar -->
<div id="sidebar">
	<div class="gadget">
		<div id="newsletter_signup">
		  <div id="newsletter_signup_label">Newsletter Sign-up</div>
		  <div class="clear_both"></div>
		  <input type="text" id="txt_newsletter">  
		  <a href="">
		  <img src="http://localhost/wordpress/w1/wp-content/uploads/2011/06/signup.png">
		  </a>	
		</div>
	</div>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
	      
<?php endif; ?>

</div>
<!-- end sidebar -->