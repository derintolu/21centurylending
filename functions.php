<?php
/**
 * Century 21 Lending Theme functions and definitions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Make sure we have all required WordPress functions
if ( ! function_exists( 'add_action' ) ) {
	return;
}

// Check if parent theme exists and is activated
$parent_theme = wp_get_theme( 'ollie' );
if ( ! $parent_theme->exists() || ! $parent_theme->is_allowed() ) {
	add_action( 'admin_notices', function() {
		?>
		<div class="error">
			<p><?php _e( 'Century 21 Lending requires the Ollie theme to be installed and activated.', 'century21lending' ); ?></p>
		</div>
		<?php
	} );
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function century21lending_setup() {
	// Add support for block styles
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add support for custom units
	add_theme_support( 'custom-units' );

	// Add support for experimental link color control
	add_theme_support( 'experimental-link-color' );

	// Add support for custom spacing
	add_theme_support( 'custom-spacing' );
}
add_action( 'after_setup_theme', 'century21lending_setup' );

/**
 * Enqueue theme styles.
 */
function century21lending_enqueue_styles(): void {
	wp_enqueue_style(
		'century21lending-style',
		get_stylesheet_uri(),
		array( 'ollie' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'century21lending_enqueue_styles' );

// Load block bindings and variations after WordPress core is loaded
function century21lending_load_block_files() {
	// Load block bindings
	require_once dirname( __FILE__ ) . '/inc/blocks/block-bindings.php';

	// Load block variations 
	require_once dirname( __FILE__ ) . '/inc/blocks/block-variations.php';
}
add_action( 'init', 'century21lending_load_block_files', 5 );

// Load block styles
require_once dirname( __FILE__ ) . '/inc/blocks/block-styles.php';