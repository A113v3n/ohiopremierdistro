<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//Get Excerpt
function fitmascore_get_excerpt( $post_id, $excerpt_length ) {
    $the_post = get_post( $post_id ); //Gets post ID

    $the_excerpt = null;
    if ( $the_post ) {
        $the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
    }

    $the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); //Strips tags and images
    $words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

    if ( count( $words ) > $excerpt_length ):
        array_pop( $words );
        array_push( $words, '…' );
        $the_excerpt = implode( ' ', $words );
    endif;

    return $the_excerpt;
}

// Post Share
require_once 'post-share.php';

// Page List
function fitmascore_page_list() {
    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ) );
    $posts = get_posts( $args );
    $post_options = array( esc_html__( '-- Select Page --', 'fitmascore' ) => '' );
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[$post->ID] = $post->post_title;
        }
    }
    return $post_options;
}

function fitmascore_ctf7_list() {
    $args = wp_parse_args( array(
        'post_type'   => 'wpcf7_contact_form',
        'numberposts' => -1,
    ) );
    $posts = get_posts( $args );
    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[$post->ID] = $post->post_title;
        }
    }
    return $post_options;
}


if ( !function_exists( 'fitmascore_portfolio_cat_list' ) ){
    function fitmascore_portfolio_cat_list() {
        $options = array(); // Define $options as an empty array
        $terms = get_terms( array(
            'taxonomy'   => 'fitmas_portfolio_cat',
            'hide_empty' => true,
        ) );
    
        if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[$term->name] = $term->name;
            }
        }
        return $options;
    }
}
function fitmascore_project_cat_id() {
    $options = array(); // Define $options as an empty array
    $terms = get_terms( array(
        'taxonomy'   => 'fitmas_portfolio_cat',
        'hide_empty' => true,
    ) );

    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            $options[$term->term_id] = $term->name;
        }
    }

    return $options;
}
// Custom paginations Start
if ( !function_exists( 'fitmascore_paginate_nav' ) ) :
    function fitmascore_paginate_nav( $fitmascoreQuery = null ) {
        if ( empty( $fitmascoreQuery ) ):
            $fitmascoreQuery = $GLOBALS['wp_query'];
        endif;
        // Don't print empty markup if there's only one page.
        if ( $fitmascoreQuery->max_num_pages < 2 ) {
            return;
        }
        $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args = array();
        $url_parts = explode( '?', $pagenum_link );
        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }
        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'format'    => $format,
            'total'     => $fitmascoreQuery->max_num_pages,
            'current'   => $paged,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            'type'      => 'array',
        ) );
        if ( $links ):
        ?>
		<div class="pagination">
			<ul class="">
                <?php foreach ( $links as $key => $page_link ): ?>
                    <li class="<?php if ( strpos( $page_link, 'current' ) !== false ) {echo ' active';}?>"><?php echo str_replace( 'span', 'a', $page_link ) ?></li>
                <?php endforeach?>
			</ul>
		</div><!-- .navigation -->
		<?php
endif;
}
endif;
// Custom paginations End

// Codestar Options

if ( !function_exists( 'fitmascore_after_content_import_execution' ) ) {
    function fitmascore_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {
        $downloader = new OCDI\Downloader();
        if ( !empty( $import_files[$selected_index]['import_json'] ) ) {
            foreach ( $import_files[$selected_index]['import_json'] as $index => $import ) {
                $file_path = $downloader->download_file( $import['file_url'], 'demo-json-import-file-' . $index . '-' . date( 'Y-m-d__H-i-s' ) . '.json' );
                $file_raw = OCDI\Helpers::data_from_file( $file_path );
                update_option( $import['option_name'], json_decode( $file_raw, true ) );
            }
        } else if ( !empty( $import_files[$selected_index]['local_import_json'] ) ) {
            foreach ( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
                $file_path = $import['file_path'];
                $file_raw = OCDI\Helpers::data_from_file( $file_path );
                update_option( $import['option_name'], json_decode( $file_raw, true ) );
            }
        }
        $ocdi = OCDI\OneClickDemoImport::get_instance();
        $log_path = $ocdi->get_log_file_path();
        OCDI\Helpers::append_to_file( 'Custom Framework file loaded.', $log_path );
    }
    add_action( 'ocdi/after_content_import_execution', 'fitmascore_after_content_import_execution', 3, 99 );
}

function fitmas_support_svg( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'fitmas_support_svg' );

// Author Social Info
function fitmascore_user_contact_methot( $cm ) {
    $cm['facebook-f'] = esc_html__( 'Facebook', 'fitmascore' );
    $cm['twitter'] = esc_html__( 'Twitter', 'fitmascore' );
    $cm['linkedin'] = esc_html__( 'Linkedin', 'fitmascore' );
    $cm['pinterest'] = esc_html__( 'Pinterest', 'fitmascore' );
    $cm['instagram'] = esc_html__( 'Instagram', 'fitmascore' );
    $cm['dribbble'] = esc_html__( 'Dribbble', 'fitmascore' );
    $cm['whatsapp'] = esc_html__( 'Whats App', 'fitmascore' );
    return $cm;
}
add_filter( 'user_contactmethods', 'fitmascore_user_contact_methot' );
// Support Fontwasome v5
if ( !function_exists( 'fitmascore_enqueue_fa5' ) ) {
    function fitmascore_enqueue_fa5() {
        wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
        wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'fitmascore_enqueue_fa5' );
}

add_filter('wpcf7_autop_or_not', '__return_false');