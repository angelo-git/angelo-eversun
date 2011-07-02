<?php

if ( function_exists('register_sidebar') )
    register_sidebar(array(				
		'name' => 'news_letter',
        'before_widget' => '<div class="newsletter_signup">',
        'after_widget' => '</div>',
        'before_title' => '<div class="newsletter_signup_label">',
        'after_title' => '</div>',
    ));	

if ( function_exists('register_sidebar') )
    register_sidebar(array(			
		'name' => 'main-sidebar',
        'before_widget' => '<div class="gadget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="star">',
        'after_title' => '</div>',
    ));		
	

?>