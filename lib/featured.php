<?php

/**
 * Get thumbnail URL for specified post or for the closest parent if it's empty or a Customizer's default image
 *
 * @param int $post_id
 * @return string
 */
function az_get_recursive_post_thumbnail_url( $post_id, $size = 'thumbnail' ) {

    // Get the post and check if it task a featured image
    $post = get_post( $post_id );
    $has_thumbnail = has_post_thumbnail( $post );

    if ( $has_thumbnail || $post->post_parent == 0 ) {

        // Post either has a featured image or we reached top level post
        if ( $has_thumbnail ) {

            // Post has featued image - return it
            return get_the_post_thumbnail_url( $post, $size );

        } else {

            if ( is_archive() || is_singular() )  {

                // Post does not have featured image - check page with the same as $post->post_type slug
                $page = get_page_by_path( $post->post_type );

                // Return page's featured image
                if ( has_post_thumbnail( $page ) ) {

                    return get_the_post_thumbnail_url( $page, $size );

                } else {

                    // Get default image from theme options
                    $default_image_url = get_theme_mod( ns_. 'hero' );
                    $default_image_id = az_get_image_id_by_url( $default_image_url );
                    $default_image = wp_get_attachment_image_src( $default_image_id, 'thumbnail' )[0];

                    // Return either the default image or FALSE, if default image does not exist
                    return $default_image ? $default_image : false;

                }

            }

            // Get default image from theme options
            $default_image_url = get_theme_mod( ns_. 'hero' );
            $default_image_id = az_get_image_id_by_url( $default_image_url );
            $default_image = wp_get_attachment_image_src( $default_image_id, 'thumbnail' )[0];

            // Return either the default image or FALSE, if default image does not exist
            return $default_image ? $default_image : false;
        }

    } else {

        // Check parent's featured image
        return az_get_recursive_post_thumbnail_url( $post->post_parent, $size );

    }

}

/**
 * Get image ID by its URL
 *
 * @param string $image_url
 * @return mixed
 */
function az_get_image_id_by_url($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
    return $attachment[0];
}