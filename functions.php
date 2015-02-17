<?php
ob_start();
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/*********************
INCLUDE NEEDED FILES
*********************/

/*
library/joints.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once(get_template_directory().'/library/joints.php'); // if you remove this, Joints will break
/*
library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
// require_once(get_template_directory().'/library/custom-post-type-accordion.php'); // you can disable this if you like
// require_once(get_template_directory().'/library/custom-post-type.php'); // you can disable this if you like
/*
library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
 require_once(get_template_directory().'/library/admin.php'); // this comes turned off by default
/*
library/translation/translation.php
	- adding support for other languages
*/
// require_once(get_template_directory().'/library/translation/translation.php'); // this comes turned off by default

/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// the main menu
function joints_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'jointstheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// the footer menu (should you choose to use one)
function joints_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'jointstheme' ),   // nav name
    	'menu_class' => 'nav footer-nav inline-list clearfix',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

// this is the fallback for header menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'top-bar top-bar-section',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/
function joints_register_sidebars() {
// Sidebars & Widgetizes Areas
register_sidebar(array(
		'id' => 'sidebar-right',
		'name' => __('Sidebar Right', 'jointstheme'),
		'description' => __('The right sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'sidebar-single',
		'name' => __('Sidebar Single Page', 'jointstheme'),
		'description' => __('The sidebar for single pages.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar-footer',
		'name' => __('Sidebar Footer', 'jointstheme'),
		'description' => __('The footer sidebar. Set to our widgets (for now).', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget large-3 medium-3 columns" data-equalizer-watch>',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	

/*
	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!
/*********************
OpenGraph JetPack
*********************/
function fb_home_image( $tags ) {
    if ( is_home() ) {
        // Remove the default blank image added by Jetpack
        unset( $tags['og:image'] );
 
        $fb_home_img = 'http://beta.uib.no/wp-content/themes/uibeta/library/images/opengraph.png';
        $tags['og:image'] = esc_url( $fb_home_img );
    }
    return $tags;
}
add_filter( 'jetpack_open_graph_tags', 'fb_home_image' );

/*********************
ShortCode for jumping to specific points in an embedded video (e.g. YouTube)
Livar Bergheim 2015-02-14

Shortcode in blog-post:
[videolink time="3:05"]

To a specific video;
[videolink time="3:05" divid="id"]

NB! YouTube-video must be embedded manually, not automatically in Wordpress.
Example:
<div id="whateverID"><iframe style="height: 390px;" title="YouTube video player" src="http://www.youtube.com/embed/IWDvJaTAbV0?enablejsapi=1&amp;t=2m55s" width="640" height="390" frameborder="0"></iframe></div>

Note enclosing <div> and enablejsapi=1 in the iframe-tag.

Advanced version of shortcode - not active
[videolinks times="3:05, 12:00" texts="Start; More stuff"]

Inspiration from:
- http://stackoverflow.com/a/19062506
- http://codex.wordpress.org/Shortcode_API
- http://www.wpbeginner.com/wp-tutorials/how-to-add-a-shortcode-in-wordpress/
*********************/

// helper-method: converts HH:MM:SS/MM:SS to seconds
function timecodeToSeconds($timecode) {
	$split = explode(':', $timecode);
	if (count($split) == 3) { // for hours, minutes and seconds
		return (intval($split[0]) * 60 * 60) + (intval($split[1]) * 60) + intval($split[2]);
	} else { // only minutes and seconds
		return (intval($split[0]) * 60) + intval($split[1]);
	}
}

/* longer version
function my_videolink_shortcode_handler($atts, $content = null) {
    $output = '';
    $i = 0;
    $times = explode( ', ', $atts['times'] );
    $texts = explode( '; ', $atts['texts'] );
    foreach ($times as $time) {
        $output .= sprintf(
            '<a href="javascript:callPlayer(\'whateverID\', \'seekTo\', [%s, true])">%s</a> - %s<br />' . "\n",
			timecodeToSeconds($time),
            $time,
            $texts[$i]
        );
        $i++;
    }
    return $output;
}
add_shortcode('videolinks', 'my_videolink_shortcode_handler');
*/
function my_videolink_shortcode_handler($atts, $content = null) {
    $output = '';
	$divID = "whateverID";
	$time = $atts['time'];
	if (isset($atts['divID'])) {
		$divID = $atts['divID'];
	} 
    $output .= sprintf(
		'<a href="javascript:callPlayer(\'%s\', \'seekTo\', [%s, true])">%s</a> ',
		$divID,
		timecodeToSeconds($time),
		$time
	);
    return $output;
}
add_shortcode('videolink', 'my_videolink_shortcode_handler');


/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

?>