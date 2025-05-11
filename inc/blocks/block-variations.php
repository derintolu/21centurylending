<?php
/**
 * Block variations for the Century 21 Lending theme.
 *
 * @package Century_21_Lending
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Make sure we have all required WordPress functions
if ( ! function_exists( 'add_filter' ) || ! function_exists( '__' ) ) {
    return;
}

/**
 * Register ACF field bindings
 */
function c21_register_acf_bindings() {
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    // Register ACF field bindings source
    register_block_bindings_source(
        'c21/acf-field',
        array(
            'label' => __('ACF Field', 'century21lending'),
            'get_value_callback' => 'c21_get_acf_field_value',
            'uses_context' => ['postId']
        )
    );
}
add_action('init', 'c21_register_acf_bindings');

/**
 * Callback to get ACF field value
 */
function c21_get_acf_field_value($source_args, $block_instance, $attribute_name) {
    if (!isset($source_args['field'])) {
        return null;
    }

    $post_id = $block_instance->context['postId'] ?? get_the_ID();
    return get_field($source_args['field'], $post_id);
}

/**
 * Add block variations for loan officer fields
 *
 * @param array  $settings Block settings.
 * @param string $block_name Block name.
 * @return array Modified block settings.
 */
function c21_add_block_variations( $settings, $block_name ) {
    if ( $block_name === 'core/paragraph' ) {
        if ( ! isset( $settings['variations'] ) ) {
            $settings['variations'] = array();
        }

        $settings['variations'][] = array(
            'name'       => 'loan-officer-address',
            'title'      => __( 'Loan Officer Address', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'office_address'
                            )
                        )
                    )
                )
            )
        );

        $settings['variations'][] = array(
            'name'       => 'loan-officer-email',
            'title'      => __( 'Loan Officer Email', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'email_address'
                            )
                        )
                    )
                )
            )
        );

        $settings['variations'][] = array(
            'name'       => 'loan-officer-phone',
            'title'      => __( 'Loan Officer Phone', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'phone_number'
                            )
                        )
                    )
                )
            )
        );

        $settings['variations'][] = array(
            'name'       => 'loan-officer-job-title',
            'title'      => __( 'Loan Officer Job Title', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'job_title'
                            )
                        )
                    )
                )
            )
        );

        $settings['variations'][] = array(
            'name'       => 'loan-officer-nmls',
            'title'      => __( 'Loan Officer NMLS', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'nmls_number'
                            )
                        )
                    )
                )
            )
        );
    }

    if ( $block_name === 'core/list' ) {
        if ( ! isset( $settings['variations'] ) ) {
            $settings['variations'] = array();
        }

        $settings['variations'][] = array(
            'name'       => 'loan-officer-specialties',
            'title'      => __( 'Loan Officer Specialties', 'century21lending' ),
            'category'   => 'loan-officer',
            'attributes' => array(
                'metadata' => array(
                    'bindings' => array(
                        'values' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'specialties'
                            )
                        )
                    )
                ),
                'className' => 'is-style-check-list'
            )
        );
    }

    return $settings;
}
add_filter( 'block_type_metadata_settings', 'c21_add_block_variations', 10, 2 ); 