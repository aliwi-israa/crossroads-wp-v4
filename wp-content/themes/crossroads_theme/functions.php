<?php
/**
 * crossroads_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crossroads_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crossroads_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on crossroads_theme, use a find and replace
		* to change 'crossroads_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'crossroads_theme', get_template_directory() . '/languages' );

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

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'crossroads_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'crossroads_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crossroads_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crossroads_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'crossroads_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crossroads_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'crossroads_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'crossroads_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'crossroads_theme_widgets_init' );

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

require get_template_directory() . '/inc/cpt.php';

add_action( 'wp_enqueue_scripts', 'remove_dashicons', 100 );
function remove_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}
/**
 * Enqueue Google Fonts (Urbanist and Inter) for the theme.
 */
function crossroads_enqueue_google_fonts() {
    // Enqueue Urbanist font
    wp_enqueue_style(
        'google-font-urbanist', // Unique handle for the stylesheet
        'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap',
        array(), // No dependencies
        null // Use null for version as Google Fonts handles its own versioning
    );

    // Enqueue Inter font
    wp_enqueue_style(
        'google-font-inter', // Unique handle for the stylesheet
        'https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap',
        array(), // No dependencies
        null // Use null for version
    );
}
add_action( 'wp_enqueue_scripts', 'crossroads_enqueue_google_fonts' );
/**
 * Add fonts.
 */
function crossroads_add_editor_styles() {
    if (is_admin()) {
        wp_enqueue_style('google-font-urbanist-editor', 'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', [], null);
        wp_enqueue_style('google-font-inter-editor', 'https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', [], null);
    }
}
add_action('admin_enqueue_scripts', 'crossroads_add_editor_styles');

function crossroads_enqueue_block_editor_assets() {
    wp_enqueue_style(
        'google-font-urbanist-editor-assets',
        'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'google-font-inter-editor-assets',
        'https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap',
        array(),
        null
    );
}
add_action( 'enqueue_block_editor_assets', 'crossroads_enqueue_block_editor_assets' );
/**
 * Load CSS.
 */
function crossroads_async_styles() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('plugins-css', get_template_directory_uri() . '/assets/css/plugins.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.css');
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/style.min.css');
    wp_enqueue_style('custom-mobile.css', get_template_directory_uri() . '/assets/css/style-mobile.min.css');
}
add_action('wp_enqueue_scripts', 'crossroads_async_styles'); // Use wp_enqueue_scripts for styles too

function crossroads_add_async_attribute($tag, $handle, $href, $media) {
    $async_handles = array(
        'bootstrap-css',
        'plugins-css',
        'swiper-css',
        'custom-css',
        'custom-mobile.css'
    );

    if ( in_array( $handle, $async_handles ) ) {
        return '<link rel="stylesheet" id="' . $handle . '" href="' . $href . '" media="print" onload="this.media=\'all\'">' . "\n" .
               '<noscript><link rel="stylesheet" id="' . $handle . '-noscript" href="' . $href . '" media="all"></noscript>' . "\n";
    }
    return $tag;
}
/**
 * Load JS.
 */
function crossroads_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', ['jquery'], null, true);
	wp_enqueue_script('designesia-js', get_template_directory_uri() . '/assets/js/designesia.min.js', ['jquery', 'plugins-js'], null, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.js', ['jquery'], null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', ['jquery', 'designesia-js'], null, true);
}
add_action('wp_enqueue_scripts', 'crossroads_enqueue_scripts');

function crossroads_add_defer_attribute($tag, $handle, $src) {
    $defer_handles = array(
        'plugins-js',
        'designesia-js',
        'swiper-js',
        'custom-js'
    );

    if ( in_array( $handle, $defer_handles ) ) {
        return '<script src="' . $src . '" defer></script>' . "\n";
    }

    return $tag;
}
add_filter('script_loader_tag', 'crossroads_add_defer_attribute', 10, 3);

/**
 * make JQuery in body.
 */
// add_action('wp_enqueue_scripts', function() {
//   if (!is_admin()) {
//     wp_deregister_script('jquery');
//     wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), [], null, true);
//     wp_enqueue_script('jquery');
//   }
// }, 0);

/**
 * enqueue self-hosted Font Awesome
 */
function crossroads_enqueue_fontawesome_self_hosted() {
    $fa_css_uri = get_template_directory_uri() . '/assets/fontawesome/css/all.min.css';
    $fa_css_path = get_template_directory() . '/assets/fontawesome/css/all.min.css';

    $version = file_exists( $fa_css_path ) ? filemtime( $fa_css_path ) : '6.0.0';

    wp_enqueue_style(
        'font-awesome-self-hosted',
        $fa_css_uri,
        [],
        $version
    );
}
add_action('wp_enqueue_scripts', 'crossroads_enqueue_fontawesome_self_hosted');
/**
 * Config
 */
function my_acf_options_page_init() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Website Settings',
            'menu_title' => 'Website Settings',
            'menu_slug'  => 'site-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ]);
    }
}
add_action('acf/init', 'my_acf_options_page_init');
/**
* Walker class to render toggle arrows
*/
class Custom_Mobile_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     *
     * @since 3.0.0
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }

        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener';
        }
        $atts['href'] = ! empty( $item->url )        ? $item->url        : '';
        $atts['aria-current'] = $item->current ? 'page' : '';

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array    $atts   {
         * The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         * @type string $title        Title attribute.
         * @type string $target       Target attribute.
         * @type string $rel          The rel attribute.
         * @type string $href         The href attribute.
         * @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post  $item   The current menu item.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         * @param int      $depth  Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filters a menu item's title.
         *
         * @since 3.0.0
         * @since 4.4.0 The `$depth` parameter was added.
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before . '<a' . $attributes . ' class="menu-item">' . $args->link_before . $title . $args->link_after . '</a>' . $args->after;

        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $item_output .= '<span><i class="fas fa-chevron-down d-flex d-lg-none"></i></span>';
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
/**
 * header menu
 */
function crossroads_register_menus() {
  register_nav_menus([
    'main_menu'   => 'Main Menu',
    'footer_menu' => 'Footer Menu'
  ]);
}
add_action('after_setup_theme', 'crossroads_register_menus');

/**
 * add a class to all subpages
 */
function add_custom_body_class($classes) {
  if (!is_front_page() && !is_home()) {
    $classes[] = 'subpage';
  }
  return $classes;
}
add_filter('body_class', 'add_custom_body_class');

add_image_size( 'slider-optimized', 768, 512, true );
/**
 * breadcrumbs
 */
add_filter('wpseo_breadcrumb_links', function($links) {
    foreach ($links as $key => $link) {
        if ($link['text'] === 'Services') {
            $links[$key]['url'] = home_url('/services/');
        }
    }
    return $links;
});

add_filter('wpseo_breadcrumb_links', function($links) {
    global $post;

    if (is_singular('service')) {
        $terms = get_the_terms($post->ID, 'service-category');
        if (!empty($terms) && !is_wp_error($terms)) {
            $term = $terms[0];
            $term_link = get_term_link($term);

            array_splice($links, -1, 0, [[
                'url' => $term_link,
                'text' => $term->name,
            ]]);
        }
    }

    return $links;
});

add_filter( 'wpseo_breadcrumb_separator', 'custom_yoast_breadcrumb_separator' );
function custom_yoast_breadcrumb_separator( $separator ) {
    return '<span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>';
}

/**
 * patterns
 */
add_action('init', function () {
  register_block_pattern_category('custom', [
    'label' => __('Custom Patterns', 'crossroads_theme'),
  ]);

  register_block_pattern(
    'crossroads_theme/content-block-image-left',
    require get_template_directory() . '/patterns/content-block-image-left.php'
  );
    register_block_pattern(
    'crossroads_theme/content-block-image-right',
    require get_template_directory() . '/patterns/content-block-image-right.php'
  );

});
