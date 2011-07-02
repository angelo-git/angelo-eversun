<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'sidebar',
        'before_widget' => '<div class="gadget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="star">',
        'after_title' => '</div>',
    ));
?>