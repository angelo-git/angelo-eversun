function func_nav(page) {
	$('#menu_header_nav li').attr('class', '');	
	if (page == "") {
		$('#home').attr('class', 'current_page_item');
		alert('home');
	} else {
		$('#menu_header_nav li#' + page).attr('class', 'current_page_item');
	}	
}	
	