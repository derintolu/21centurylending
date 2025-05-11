<?php
/**
 * Block Bindings for the Century 21 Lending theme.
 *
 * @package Century_21_Lending
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Make sure we have all required WordPress functions
if ( ! function_exists( 'add_action' ) || ! function_exists( 'register_block_bindings_source' ) ) {
    return;
}

/**
 * Register ACF fields as post meta for block bindings
 */
function c21_register_post_meta() {
    // Check if ACF is active
    if ( ! function_exists( 'get_field' ) ) {
        return;
    }

    // Register meta fields
    register_post_meta(
        'loan_officer',
        'office_address',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );

    register_post_meta(
        'loan_officer',
        'email_address',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );

    register_post_meta(
        'loan_officer',
        'phone_number',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );

    register_post_meta(
        'loan_officer',
        'job_title',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );

    register_post_meta(
        'loan_officer',
        'nmls_number',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'string',
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );

    register_post_meta(
        'loan_officer',
        'specialties',
        array(
            'show_in_rest' => true,
            'single'       => true,
            'type'        => 'array',
            'items'       => array(
                'type' => 'string'
            ),
            'auth_callback' => function() {
                return current_user_can( 'edit_posts' );
            }
        )
    );
}
add_action( 'init', 'c21_register_post_meta' );

/**
 * Sync ACF fields to post meta
 *
 * @param int $post_id Post ID.
 */
function c21_sync_acf_to_post_meta( $post_id ) {
    if ( get_post_type( $post_id ) !== 'loan_officer' ) {
        return;
    }

    $fields = array(
        'office_address',
        'email_address',
        'phone_number',
        'job_title',
        'nmls_number',
        'specialties'
    );

    foreach ( $fields as $field ) {
        $value = get_field( $field, $post_id );
        if ( $value !== false ) {
            update_post_meta( $post_id, $field, $value );
        }
    }
}
add_action( 'acf/save_post', 'c21_sync_acf_to_post_meta' );

/**
 * Add ACF field source to block bindings sources
 *
 * @param array $sources Block bindings sources.
 * @return array Modified sources.
 */
function c21_add_acf_bindings_source( $sources ) {
    // Check if ACF is active
    if ( ! function_exists( 'get_field' ) ) {
        return $sources;
    }

    $sources['acf'] = array(
        'label' => __( 'ACF Field', 'century21lending' ),
        'get_value_callback' => function( $args ) {
            if ( empty( $args['field'] ) ) {
                return null;
            }
            return get_field( $args['field'] );
        }
    );

    return $sources;
}
add_filter( 'block_bindings_source', 'c21_add_acf_bindings_source', 10, 1 ); 