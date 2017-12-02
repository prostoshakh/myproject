<?php
/**
 * newTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newTheme
 */

if ( ! function_exists( 'newtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newTheme, use a find and replace
		 * to change 'newtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newtheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'newtheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'newtheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'newtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'newtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'newtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'newtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newtheme_scripts() {
	wp_enqueue_style( 'newtheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'newtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'newtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

	register_nav_menus(array(
'menu' => __('footer-menu', 'uwines')
)
);

function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    $menu_locations = get_nav_menu_locations();

    if ( has_term($menu_locations['menu'], 'nav_menu', $item) ) {
       $item_output = preg_replace('/<a /', '<a class="inner-link" ', $item_output, 1);
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function remove_menu_item(){
  remove_menu_page( 'edit-comments.php' ); 
  }
add_action( 'admin_menu', 'remove_menu_item' );


function your_theme_woocommerce_scripts() {
  wp_enqueue_style( 'custom-woocommerce-style', get_template_directory_uri() . '/css/custom-woocommerce.css', 99 );
}
add_action( 'wp_enqueue_scripts', 'your_theme_woocommerce_scripts' );			


add_action( 'woocommerce_after_shop_loop_item_title', 'my_add_short_description', 9 ); function my_add_short_description() { echo ' <p class="si-p">' . the_excerpt() . '</p>'; };


/*add_filter('loop_shop_columns', 'loop_columns', 99);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 2; // 2 products per row
	}
};	*/

// define('WOOCOMMERCE_USE_CSS', false);

//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
 
//remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
 
remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
 
//remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
 
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
 
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
//remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
 
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );
 
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
 
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
 
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
 
//remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
 
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
 
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
 
unset($tabs['reviews']);
 
return $tabs;
}

add_filter( 'woocommerce_currencies', 'add_my_currency' );
function add_my_currency( $currencies ) {
$currencies['ABC'] = __( 'Українскька гривня', 'woocommerce' );
return $currencies;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
switch( $currency ) {
case 'ABC': $currency_symbol = ' грн'; break;
}
return $currency_symbol;
}


function add_item_to_cart() {
	$woocommerce->cart->add_to_cart( $product_id, $quantity );
};

/*Заменяем кнопку Добавить в корзину на подробнее */

/*шаг 1 - Удаляем кнопку Добавить в корзину */

/*function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');
*/


/*шаг 2 -Добавляем кнопку Подробнее */

/*add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="'.$link.'" class="def-btn def-btn_si def-btn_yellow">Подробнее</a>');
}
*/

function show_more(){
	global $product;
$link = $product->get_permalink();
echo $link;
}


add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_add_link' );
function custom_product_link( $link ) {
global $product;
    echo '<a href="'.esc_url( $product->get_permalink( $product->id )).'" <a href="" class="def-btn def-btn_bd def-btn_yellow def-btn_bd-cart def-btn_shadow">
            <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
              <g>
              	<g id="add">
              		<path d="M357,204H204v153h-51V204H0v-51h153V0h51v153h153V204z" fill="#FFFFFF"/>
              	</g>
              </g>
            </svg>
            <svg class="cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
              <g>
              	<g>
              		<path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306    c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7    c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408    c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z" fill="#ffffff"></path>
              	</g>
              </g>
            </svg>
          </a>';
      };


// removing adding messages at cart
 add_filter( 'wc_add_to_cart_message_html', '__return_null' );

      
/*
function replace() {
	echo str_replace("content-container content-container_index", "", "content-container content-container_index");
}

replace();

add_filter( 'woocommerce_checkout_fields' , 'misha_print_all_fields' );
 
function misha_print_all_fields( $fields ) {
 
	//if( !current_user_can( 'manage_options' ) )
	//	return; // in case your website is live
 
	print_r( $fields ); // wrap results in pre html tag to make it clearer
	exit;
 
} */

add_filter( 'woocommerce_checkout_fields', 'checkout_remove_fields', 9999 );
 
function checkout_remove_fields( $woo_checkout_fields_array ) {
 
	// she wanted me to leave these fields in checkout
	// unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_phone'] );
	// unset( $woo_checkout_fields_array['billing']['billing_email'] );
	// unset( $woo_checkout_fields_array['order']['order_comments'] );
 
	// and to remove the fields below
	unset( $woo_checkout_fields_array['billing']['billing_company'] );
	unset( $woo_checkout_fields_array['billing']['billing_country'] );
	// unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
	unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
	unset( $woo_checkout_fields_array['billing']['billing_city'] );
	unset( $woo_checkout_fields_array['billing']['billing_state'] );
	unset( $woo_checkout_fields_array['billing']['billing_postcode'] );
 
	return $woo_checkout_fields_array;
}


add_filter( 'woocommerce_checkout_fields' , 'form_not_required_fields', 9999 );
 
function form_not_required_fields( $f ) {
 
	unset( $f['billing']['billing_last_name']['required'] ); // that's it
	unset( $f['billing']['billing_phone']['required'] );
 
	// the same way you can make any field required, example:
	// $f['billing']['billing_company']['required'] = true;
 
	return $f;
}

add_filter( 'woocommerce_checkout_fields' , 'form_sort_fields', 9999 );
 
function form_sort_fields( $woo_checkout_fields_array ) {
 
	// 1 - first name
	// 2 - last name
	// 3 - phone
	// 4 - email
	// but this is an associative array and we can not sort it like a numeric array
 
	$billing = $woo_checkout_fields_array['billing'];
 
	// the most simple and obvious way to create a new array for this field group
	// but you can use array sorting techniques if you want
	$billing_new_order = array();
	$billing_new_order['billing_first_name'] = $billing['billing_first_name'];
	$billing_new_order['billing_last_name'] = $billing['billing_last_name'];
	$billing_new_order['billing_email'] = $billing['billing_email'];
	$billing_new_order['billing_phone'] = $billing['billing_phone'];
	$billing_new_order['billing_address_1'] = $billing['billing_address_1']; 
	$woo_checkout_fields_array['billing'] = $billing_new_order;
 
	return $woo_checkout_fields_array;
}



add_filter( 'woocommerce_checkout_fields' , 'form_checkout_fields_styling', 9999 );
 
function form_checkout_fields_styling( $f ) {
 
	$f['billing']['billing_first_name']['class'][0] = 'def-field form-row-wide';
	$f['billing']['billing_last_name']['class'][0] = 'def-field form-row-wide';
	$f['billing']['billing_email']['class'][0] = 'def-field form-row-wide';
	$f['billing']['billing_phone']['class'][0] = 'def-field form-row-wide';
 
	return $f;
 
}

add_filter( 'woocommerce_checkout_fields' , 'edit_billing_fields', 9999 );
 
function edit_billing_fields( $f ) {
 
	// first name can be changed with woocommerce_default_address_fields as well
	$f['billing']['billing_first_name']['label'] = '';
	$f['billing']['billing_first_name']['placeholder'] = 'Имя';
	$f['billing']['billing_last_name']['label'] = '';
	$f['billing']['billing_last_name']['placeholder'] = 'Фамилия';
	$f['billing']['billing_email']['label'] = '';
	$f['billing']['billing_email']['placeholder'] = 'Номер телефона';
	$f['billing']['billing_phone']['label'] = '';
	$f['billing']['billing_phone']['placeholder'] = 'E-mail';
	$f['billing']['billing_address_1']['label'] = '';
	$f['billing']['billing_address_1']['placeholder'] = 'Укажите адресс доставки';
 
	return $f;
 
}



// Delete styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );





?>
