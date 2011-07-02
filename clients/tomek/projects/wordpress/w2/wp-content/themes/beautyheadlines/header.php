<script type="text/javascript" src="js/jquery.js">
</script>
<div id="header">	
	<div id="header_notes_wrapper">
		<div class="find_us">
			<div style="float: left; margin-right: 5px; ">Find us on:</div>
			<div style="float: right;">
				<a href=""><img src="<?php echo bloginfo('home'); ?>/wp-content/uploads/facebook.png" style=""/></a>
				<a href=""><img src="<?php echo bloginfo('home'); ?>/wp-content/uploads/twitter.png"/></a>		
			</div>		
		</div>	
			<div class="clr"></div>
			<div class="last_updated">
				Last Updated: June 1st 2011
			</div>		
			<div class="clr"></div>
			<div class="search_form">
				<div id="container_input_search"><input type="text" id="input_search"/></div>
				<a href="" id="search_btn">
					<img src="<?php echo bloginfo('home'); ?>/wp-content/uploads/search.png"/>
				</a>
			</div>		
	</div>			
</div>

<div id="navigation">
	<div id="nav_menu">	
		<ul id="menu_header_nav">
			<!-- <li class="current_page_item"><a href="">Diet</a></li>
			<li><a href="">Fitness</a></li>
			<li><a href="">Beauty</a></li>
			<li><a href="">Nutrition</a></li>
			<li><a href="">Mental health</a></li>
			<li><a href="">Alternative health</a></li>
			<li><a href="">Children's health</a></li> -->			
			<?php
				wp_list_pages('title_li&sort_column=ID');
			?>
		</ul>
	</div>
</div>
<script type="text/javascript">
var search = 'Search ...';

jQuery('#input_search').val(search);	

jQuery('#input_search').blur(function(){
	var value = jQuery('#input_search').val();
	if (value == "" || value == search)
		jQuery('#input_search').val(search);		
});

jQuery('#input_search').click(function(){		
	var value = jQuery('#input_search').val();
	if (value == "" || value == search)	
		jQuery('#input_search').val('');		
});

</script>