<?php
/**
 * fishme functions and definitions
 *
 * @package fishme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'fishme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fishme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fishme, use a find and replace
	 * to change 'fishme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fishme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fishme' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fishme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // fishme_setup
add_action( 'after_setup_theme', 'fishme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fishme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fishme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'fishme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fishme_scripts() {
	wp_enqueue_style( 'fishme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fishme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fishme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fishme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function fpm_gallery_nav( $current_img_id ) {
	$gallery_page_id = '13';
	$nav = '';
	
	$gallery_data = get_post_gallery( $gallery_page_id, $html=false );
	$img_ids = explode( ',', $gallery_data['ids'] );
	
	
	
	$num_images = count($img_ids);
	foreach( $img_ids as $i=>$img_id ) {
		if( $img_id == $current_img_id)
			$current_index = $i;
	}
	
	$prev_link = '';
	$next_link = '';
	
	if( $current_index != 0 ) {
		$prev_i = $current_index - 1;
		$prevlink = "<a href='/?attachment_id=$img_ids[$prev_i]'>&laquo; Prev. Image</a>";
	}
	
	if( $current_index != ($num_images-1) ) {
		$next_i = $current_index + 1;
		$nextlink = "<a href='/?attachment_id=$img_ids[$next_i]'>Next Image &raquo;</a>";
	} 
	
	$nav = "<p>$prevlink &nbsp; | &nbsp; $nextlink</p>";
	echo $nav;
}

function fpm_contact_form() {
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$senders_name = $_POST['senders_name'];
		$send_email = $_POST['email'];
		$send_message = $_POST['message'];
		if( strpos($send_email, '.') === false || strpos($send_email, '@') === false ) {
			$send_error = 'Please enter a valid email.';
		}
		if( empty($send_message) ) {
			$send_error = 'Please enter a message.';
		}
		if( empty($senders_name) ) {
			$send_error = 'Please enter your name.';
		}
		
		if( empty( $send_error )) {
			$to = '"Mike Faulkingham" <mike@fishportlandmaine.com>';
			$headers = 'Cc: "Troy Haley" <troy@fishportlandmaine.com>';
			wp_mail($to, 'Message from Fish Portland Maine website', "Message: \n" . $send_message . "\n\nSender's Email: " . $send_email . "\n\nSender's Name: ".$senders_name, $headers);
			return '<p class="success">Thanks for contacting us. We\'ll get back to you shortly.</p></div>';
		}
	}
	
	ob_start();
	?>
    <?php if(isset($send_error)) : ?>
    <p class="status"><?php echo $send_error; ?></p>
    <?php endif; ?>
	<p style="font-size: 12px;">* = required</p>
    	<form action="" method="post">
    	<p><label for="name">* Your Name:</label> <input class="text-input" type="text" name="senders_name" value="<?php echo $send_name; ?>" /></p>
		<p><label for="email">* Your Email:</label> <input class="text-input" type="email" name="email" value="<?php echo $send_email; ?>" /></p>
		<p><label for="message">* Message:</label> <textarea class="text-input" name="message" rows="10"><?php echo $send_message; ?></textarea></p>
        <p><input type="submit" class="submit" value="Drop Us A Line" /></p>
        </form>
	<?php
	$form = ob_get_contents();
	ob_end_clean();
	return $form;
}

add_shortcode('contact_form', 'fpm_contact_form');