<?php
/**
 * Block variations for the Ollie Child theme.
 *
 * @package Ollie_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register block variations.
 *
 * @return void
 */
function ollie_child_register_block_variations(): void {
    // Register heading variations for loan officer fields
    register_block_variation(
        'core/heading',
        array(
            'name'        => 'loan-officer-address',
            'title'       => __( 'Loan Officer Address', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s address.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-address',
                'metadata'  => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_address',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    register_block_variation(
        'core/heading',
        array(
            'name'        => 'loan-officer-email',
            'title'       => __( 'Loan Officer Email', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s email address.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-email',
                'metadata'  => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_email',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    register_block_variation(
        'core/heading',
        array(
            'name'        => 'loan-officer-phone',
            'title'       => __( 'Loan Officer Phone', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s phone number.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-phone',
                'metadata'  => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_phone',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    register_block_variation(
        'core/heading',
        array(
            'name'        => 'loan-officer-job-title',
            'title'       => __( 'Loan Officer Job Title', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s job title.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-job-title',
                'metadata'  => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_job_title',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    register_block_variation(
        'core/heading',
        array(
            'name'        => 'loan-officer-nmls',
            'title'       => __( 'Loan Officer NMLS', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s NMLS number.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-nmls',
                'metadata'  => array(
                    'bindings' => array(
                        'content' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_nmls',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    // Register list variation for specialties
    register_block_variation(
        'core/list',
        array(
            'name'        => 'loan-officer-specialties',
            'title'       => __( 'Loan Officer Specialties', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s specialties.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-specialties',
                'metadata'  => array(
                    'bindings' => array(
                        'items' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_specialties',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );

    // Register social links variation
    register_block_variation(
        'core/social-links',
        array(
            'name'        => 'loan-officer-social',
            'title'       => __( 'Loan Officer Social Links', 'ollie-child' ),
            'description' => __( 'Displays the loan officer\'s social media links.', 'ollie-child' ),
            'attributes'  => array(
                'className' => 'loan-officer-social',
                'metadata'  => array(
                    'bindings' => array(
                        'links' => array(
                            'source' => 'core/post-meta',
                            'args'   => array(
                                'key' => 'loan_officer_social_links',
                            ),
                        ),
                    ),
                ),
            ),
        )
    );
}
add_action( 'init', 'ollie_child_register_block_variations' ); 