<?php
/**
 * Block Styles for the Century 21 Lending theme.
 *
 * @package Century_21_Lending
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register custom block styles
 */
function c21_register_block_styles() {
    register_block_style(
        'core/heading',
        array(
            'name'         => 'gradient-text',
            'label'        => __( 'Gradient Text', 'century21lending' ),
            'inline_style' => '.is-style-gradient-text { 
                background: linear-gradient(135deg, var(--wp--preset--color--primary) 0%, var(--wp--preset--color--secondary) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }'
        )
    );
}
add_action( 'init', 'c21_register_block_styles' ); 