<?php
/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
 
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
	add_custom_image_header( '', 'twentyten_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'twentyten' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'twentyten' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'twentyten' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'twentyten' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'twentyten' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'twentyten' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'twentyten' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'twentyten' )
		)
	) );
}
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().
 *
 * @since Twenty Ten 1.0
 */
function twentyten_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post�date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

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
		'name' =>"Header-Sitewide",
		'id' => "sidebar-header",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	 ));	

	  register_sidebar(array(
		'name' =>"Featured-Product-Home",
		'id' => "featured-product",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	 
	  register_sidebar(array(
		'name' =>"Skincare-News-Home",
		'id' => "skincare-news",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => "</h3>\n",
	 ));
	 
	 	  register_sidebar(array(
		'name' =>"Skincare-News1-Home",
		'id' => "skincare-news1",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => "</h3>\n",
	 ));
	 
	  	  register_sidebar(array(
		'name' =>"Skincare-News2-Home",
		'id' => "skincare-news2",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => "</h3>\n",
	 ));
	 
	  	  register_sidebar(array(
		'name' =>"Skincare-News3-Home",
		'id' => "skincare-news3",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => "</h3>\n",
	 ));
	 
	  	  register_sidebar(array(
		'name' =>"Skincare-News4-Home",
		'id' => "skincare-news4",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => "</h3>\n",
	 ));
	 
	 
	  register_sidebar(array(
		'name' =>"Lower_Left-Home",
		'id' => "sidebar_lower_left",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
		 	 
	  register_sidebar(array(
		'name' =>"Right_Upper_Sidebar-Home",
		'id' => "sidebar_right_upper",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));	
	 	  
	  register_sidebar(array(
		'name' =>"Right_Sidebar-Default",
		'id' => "sidebar-right",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));	
	  
	 register_sidebar(array(
		'name' =>"Skincare-Tips-Home",
		'id' => "skincare-tips",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));	

	 register_sidebar(array(
		'name' =>"Advise-Pannel-More-Good-Advice",
		'id' => "moregoodadvice",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));	


	 register_sidebar(array(
		'name' =>"Footer-Sitewide",
		'id' => "sidebar-footer",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	 
	 register_sidebar(array(
		'name' =>"Viewer-Sitewide",
		'id' => "sidebar-head",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	 
	 register_sidebar(array(
		'name' =>"Left Column",
		'id' => "left-column",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => "</h2>\n",
	 ));
	  
	
	 		
}

myRegisterSidebars();

function createOverallScore($r_ingridient, $r_results, $r_value){
	ob_start();
	$ratebar_ingridients = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_ingridients.jpg';
	$ratebar_results = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_results.jpg';
	$ratebar_value = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_value.jpg';
	
	$im1 = @imagecreatefromjpeg($ratebar_ingridients);
	$im2 = @imagecreatefromjpeg($ratebar_results);
	$im3 = @imagecreatefromjpeg($ratebar_value);
	
	$px = 8.4;
	
	$imgw = 170;
	$imgh = 58;
	$image  = imagecreatetruecolor($imgw, $imgh); 
	$black = ImageColorAllocate($image, 0, 0, 0);
	$white = ImageColorAllocate($image, 255, 255, 255);
	
	imagefilledrectangle($image, 0, 0, $imgw, $imgh, $white);
	
	//putenv('GDFONTPATH=' . realpath('.'));

	imagefttext($image, 10, 0, 2, 16, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Ingridients:');
	imagefttext($image, 10, 0, 19, 34, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Results:');
	imagefttext($image, 10, 0, 28, 50, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Value:');
	
	imagefttext($image, 10, 0, 151, 16, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_ingridient);
	imagefttext($image, 10, 0, 151, 34, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_results);
	imagefttext($image, 10, 0, 151, 50, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_value);
	
	imagecopy($image,$im1,64,8,0,0,($r_ingridient*$px),9);
	imagecopy($image,$im2,64,26,0,0,($r_results*$px),9);
	imagecopy($image,$im3,64,42,0,0,($r_value*$px),9);
	
	header('Content-type: image/png'); 
	
	ImagePNG($image); 
	imagedestroy($image); 
	return ob_get_clean();
}

function mytheme_comment($comment, $args, $depth) {
	
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
			
         <?php /*printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link())*/ ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
	  <div class="comment-meta commentmetadata" ><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
	  <div class="bubbletop">
	  
	  	<?php
	  		
	  		$postRatingData = wp_gdsr_rating_article(); //comment_ID()
	  		gdsr_render_stars_custom(array(
	    		"max_value" => gdsr_settings_get('stars'),
	    		"size" => 20,
	    		"vote" => $comment->vote, //$postRatingData->rating,
	    		"star_factor" => 1
			));
			echo $comment->vote;
	 	?>
	 	
	 	<span class="comment_author"> 
	  	<?php printf(__('%s <span class="says">says:</span>'), get_comment_author_link()) ?></span><span class="comment-date"><?php comment_date('d M. Y', $comment_ID )?></span></div>	  
      <div class="bubblemid clearfix">
	  <div class="bubble-content"><?php comment_text() ?></div>
	  </div>
	  <div class="bubblebottom"></div>

      <div class="reply reply-to-right">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
 }

function getRating($post_id){
	$q = "SELECT * FROM wp_gdsr_votes_log where vote_type='article' and id='{$post_id}'" ;
	$myrows = $wpdb->get_results($q);
	$total=0;
	$votes=0;
	foreach($myrows as $row){
		$total++;
		$votes += $row->vote;
	}
	return $votes/$total;
	
} 

function getStarRating( $post_id ){
	global $wpdb;
	$q = "SELECT * FROM wp_gdsr_votes_log where vote_type='article' and id='{$post_id}'" ;
	$myrows = $wpdb->get_results($q);
	$wpdb->show_errors();
	$totalVotes=0;
	$totalScore = 0;
	foreach($myrows as $row){
		$totalScore += $row->vote;
		$totalVotes++;
	}
	return @round($totalScore/$totalVotes,1);
}

function getCommentVote($post_id){
	global $wpdb;
	$q = "SELECT `vote` FROM wp_comments WHERE `comment_post_ID`={$post_id}";
	$myrows = $wpdb->get_results($q);
	$wpdb->show_errors();
	$i = 0;
	$v = 0;
	foreach($myrows as $rec):
		if($rec->vote != 0):
			$v += $rec->vote;
			$i++;
		endif;
	endforeach;
	if($i != 0)	$ave = $v/$i;
	return @round($ave, 2);
}
 
function showRatingGraph($post_id){
	global $wpdb;
	
	$output = '<table width="100%" border="0" style="border: 1px solid #dee9ad">';
	//$q = "SELECT * FROM wp_gdsr_votes_log where vote_type='article' and id='{$post_id}'";
	$q = "SELECT `vote` FROM wp_comments WHERE `comment_post_ID`={$post_id}";
	$myrows = $wpdb->get_results($q);
	$wpdb->show_errors();
	$totalVotes=0;
	$vote5=0;
	$vote4=0;
	$vote3=0;
	$vote2=0;
	$vote1=0;
	foreach($myrows as $row){
		if($row->vote == 1) $vote1++;
		if($row->vote == 2) $vote2++;
		if($row->vote == 3) $vote3++;
		if($row->vote == 4) $vote4++;
		if($row->vote == 5) $vote5++;
	}
	$w = 130;
	$totalVotes = $vote1+$vote2+$vote3+$vote4+$vote5;
	
	$ratingbarimg =get_bloginfo('template_url').'/images/reviewbar.png';
	$img5stars = $vote5 ? ($vote5/$totalVotes)*$w: 0;
	$img4stars = $vote4 ? ($vote4/$totalVotes)*$w: 0;
	$img3stars = $vote3 ? ($vote3/$totalVotes)*$w: 0;
	$img2stars = $vote2 ? ($vote2/$totalVotes)*$w: 0;
	$img1star = $vote1 ? ($vote1/$totalVotes)*$w : 0;
	
																									/*class="ave"*/
	//$output .= '<tr><td colspan="3" align="center" style="padding-bottom: 15px; text-align: center"><h5 style="background: url(http://www.skincaresearch.com/images/h5.gif); padding: 6px 0 6px; margin: 0px; font-size: 1.2em; text-align: center;">Average Customer Rating</h5><div class="reviewStar" style="padding-top: 10px;">'. do_shortcode("[starrater tpl=10 read_only=1 size='20']") . '</div><div class="viewed" style="padding-top: 10px;"><b> '.$totalVotes.' Reviews</b></div></td></tr>';
	$output .= '<tr><td colspan="3" align="center" style="padding-bottom: 15px; text-align: center"><h5 style="background: url(http://www.skincaresearch.com/images/h5.gif); padding: 6px 0 6px; margin: 0px; font-size: 1.2em; text-align: center;">Average Customer Rating</h5><div class="reviewStar" style="padding-top: 10px">'. do_shortcode("[fvStartComment id=$post_id]") . '</div><div class="viewed" style="padding-top: 10px;"><b> '.$totalVotes.' Reviews</b></div></td></tr>';
	$output .= '<tr><td style="padding-left: 5px;">5 star</td><td><div style="width:'.$w.'px;height:10px;background:#e8e8e8"><img src="'.$ratingbarimg.'" width="'.$img5stars.'px" height="10px" alt="5 star" style="margin-bottom: 3px" /></div></td><td style="padding-right: 5px;">('.$vote5.')</td></tr>';
	$output .= '<tr><td style="padding-left: 5px;">4 star</td><td><div style="width:'.$w.'px;height:10px;background:#e8e8e8"><img src="'.$ratingbarimg.'" width="'.$img4stars.'px"  height="10px" alt="4 star" style="margin-bottom: 3px" /></div></td><td style="padding-right: 5px;">('.$vote4.')</td></tr>';
	$output .= '<tr><td style="padding-left: 5px;">3 star</td><td><div style="width:'.$w.'px;height:10px;background:#e8e8e8"><img src="'.$ratingbarimg.'" width="'.$img3stars.'px"  height="10px" alt="3 star" style="margin-bottom: 3px" /></div></td><td style="padding-right: 5px;">('.$vote3.')</td></tr>';
	$output .= '<tr><td style="padding-left: 5px;">2 star</td><td><div style="width:'.$w.'px;height:10px;background:#e8e8e8"><img src="'.$ratingbarimg.'" width="'.$img2stars.'px"  height="10px" alt="2 star" style="margin-bottom: 3px" /></div></td><td style="padding-right: 5px;">('.$vote2.')</td></tr>';
	$output .= '<tr><td style="padding-left: 5px;">1 star</td><td><div style="width:'.$w.'px;height:10px;background:#e8e8e8"><img src="'.$ratingbarimg.'" width="'.$img1star.'px"  height="10px" alt="1 star" style="margin-bottom: 3px" /></div></td><td style="padding-right: 5px;">('.$vote1.')</td></tr>';
	$output .= '<tr><td colspan="3" align="center" style="padding:5px 0;">(<a href="#">'.$totalVotes.' customer rating</a>)</td></tr>';
	echo $output .= '</table>';

}

function fiveStarFromComment($atts){
	extract(shortcode_atts(array(
		'id' => 0,
		'max' => 5,
		'size' => 20,
		'set' => 'oxygen'
	),$atts));
	
	$totalAve =  getCommentVote($id);
	return '<img src="http://www.skincaresearch.com/wp-content/plugins/gd-star-rating/gfx.php?value='.$totalAve.'&amp;set='.$set.'&amp;size='.$size.'&amp;max='.$max.'" alt="'.$totalAve.'" />';
}
add_shortcode('fvStartComment', 'fiveStarFromComment');

function fiveStarViewInReview($content){
	global $post;
	global $wpdb;
	$post_id = $post->ID;
	$q = "SELECT `vote` FROM wp_comments WHERE `comment_post_ID`={$post_id}";
	$myrows = $wpdb->get_results($q);
	$wpdb->show_errors();
	$i=0;
	
	foreach($myrows as $rec){
		if($rec->vote != 0):
			$i++;
		endif;
	}
	
	$totalAve =  getCommentVote($post->ID);
	if(is_page_template('review-template.php')):
		$content = str_replace('gdsrcacheloader gdsrclsmall','',$content);
		$content = str_replace('<strong>GD Star Rating</strong>',do_shortcode("[fvStartComment id=".$post->ID." size=24]"), $content);
		$content = str_replace('<em>loading...</em>','Rating: '.$totalAve.'/<strong>5</strong>'.' ('.$i.' votes cast)',$content);
	endif;
	return $content;
}
add_filter('the_content', 'fiveStarViewInReview');

function showTopTenByScore(){
	
	$post_rec = array(239,118,121,124,126,128,131,134,136,138);
	$arr_score = array();
	foreach($post_rec as $post_ID):
		$r_ingridients = get_post_meta($post_ID, 'r_ingridients',true);
		$r_results = get_post_meta($post_ID, 'r_results',true);
		$r_value = get_post_meta($post_ID, 'r_value',true);
		
		$score = ( $r_ingridients + $r_results + $r_value) / 3;
		$score = substr($score,0,3);
		
		array_push($arr_score,$score);
		
	endforeach;
	
	$arr_com = array_combine($post_rec,$arr_score);
	arsort($arr_com);
	
	return array_keys($arr_com);
}
/*
function updatevotes($id){
	global $wpdb;
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=187";
	$wpdb->query($q);	
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=188";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=3.5 WHERE `comment_ID`=189";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=4 WHERE `comment_ID`=190";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=191";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=192";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=193";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=5 WHERE `comment_ID`=194";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=3.5 WHERE `comment_ID`=195";
	$wpdb->query($q);
	$q = "UPDATE `wp_comments` SET `vote`=4 WHERE `comment_ID`=196";
	$wpdb->query($q);
}
*/
?>
