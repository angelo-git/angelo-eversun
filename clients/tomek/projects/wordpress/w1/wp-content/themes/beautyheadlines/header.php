<?php wp_enqueue_script('jquery'); ?>

<script type='text/javascript'>
jQuery(document).ready(function() {
//$("#dropmenu ul").css({visibility: "hidden"}); // Opera Fix

jQuery("#dropmenu li").hover(function(){
jQuery(this).find('ul:first').css({visibility: "visible"});
},function(){
jQuery(this).find('ul:first').css({visibility: "hidden"});
});


jQuery("#txt_newsletter").val('Enter your email here...');
jQuery("#txt_newsletter").click(function (){
	jQuery("#txt_newsletter").val('');
});

jQuery("#txt_newsletter").blur(function (){
	jQuery("#txt_newsletter").val('Enter your email here...');
});

});

</script>
<div id="header">      			  
</div>
<div id="menu_nav">	  		 
  <ul id="dropmenu"> 
		<li class="active" id="home_nav"><a href="<?php echo get_settings('home'); ?>" title="Home">Home Beauty</a></li>
		<?php 				
			wp_list_pages("child_of=$parent_id&depth=0&echo=".(!$return)."&title_li=0&sort_column=menu_order");			
			//wp_nav_menu();			
		?> 			
  </ul>  
</div>
