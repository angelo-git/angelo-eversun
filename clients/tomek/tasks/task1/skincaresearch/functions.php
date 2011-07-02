<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

function getBrowser(){
	$b = $_SERVER["HTTP_USER_AGENT"];
	if(strpos($b,"Macintosh")>0){
		// macintosh
		if(strpos($b,"Safari")>0){
			$r="mac-safari";
		} else {	
			if(strpos($b,"Firefox")>0){
				$r="mac-firefox";
			} 
		}				
	} else {
		// windows
		if(strpos($b,"MSIE 7.0")>0){
			$r="ie7";
		} else {	
			if(strpos($b,"MSIE 6.0")>0){
				$r="ie6";
			} else {
				if(strpos($b,"Safari")>0){
					$r="safari";
				} else {
					$r="firefox";
				}
			}
		}		
	}
	return $r;
}

function myRegisterSidebars(){
if ( function_exists('register_sidebars') )

     register_sidebar(array(
		'name' =>"header",
		'id' => "sidebar-header",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	 ));	

	  register_sidebar(array(
		'name' =>"left_sidebar",
		'id' => "sidebar-left",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	 
	  register_sidebar(array(
		'name' =>"right_sidebar",
		'id' => "sidebar-right",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));	
	 
	 
	  register_sidebar(array(
		'name' =>"footer",
		'id' => "sidebar-footer",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	  
	 		
}

myRegisterSidebars();
?>
