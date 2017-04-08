<?php

add_action( 'post_updated', [ 'AZ_Cache', 'delete_post_elements_transients' ] );

class AZ_Cache {

    /**
     * @var string $_delimiter
     * @access private
     * @static
     */
    private static $_delimiter = '_';

    /**
     * Suffix of all trasient names
     *
     * @var string $_transient_name_prefix
     * @access private
     * @static
     */
    private static $_transient_name_prefix = '_az_cache_';

    /**
     * Build transient name using provided control variables
     *
     * @param $scope
     * @param $scope_id
     * @param $type
     * @param null $subject
     * @param null|string $cache_id_suffix
     * @return string
     * @sttatic
     */
    private static function _get_transient_name( $scope, $scope_id, $type, $subject = null, $cache_id_suffix = null ) {

        $transient_name =
            self::$_transient_name_prefix .
            $scope .
            self::$_delimiter .
            $scope_id .
            self::$_delimiter .
            $type .
            self::$_delimiter .
            'cache' .
            self::$_delimiter .
			$cache_id_suffix;

        if ( ! is_null( $subject ) ) {
            $transient_name = $transient_name . $subject;
        } else {
            $transient_name = '%' . $transient_name . '%';
        }

        return $transient_name;

    }

    /**
     * Get transient name for a post element type of transient
     *
     * @access public
     * @param int $post_id
     * @param string $element_name
     * @static
     * @return string
     */
    public static function get_post_elements_transient_name( $post_id, $element_name = null, $cache_id_suffix = null ) {

        return self::_get_transient_name( 'post', $post_id, 'element', $element_name, $cache_id_suffix );

    }
    
    /**
     * Delete transients
     *
     * @access private
     * @static
     * @return string
     */
    private static function _delete_transients( $type, $args = [] ) {

        global $wpdb;

        // Initialise things
        $operator = 'LIKE';
        $transient_name = false;

        switch ( $type ) {

            case 'post_elements':
                $transient_name = AZ_Cache::get_post_elements_transient_name( $args['post_id'] );
                $operator = 'LIKE';
                break;

        }

        if ( $transient_name ) {
            // Delete transients by either wildcard or direct name match
            $wpdb->query( "DELETE FROM `$wpdb->options` WHERE `option_name` " . $operator . " ('" . $transient_name . "')" );
        }
        
    }

    /**
     * Delete all cache transients
     *
     * @access public
     * @static
     * @return string
     */
    public static function delete_all_transients() {

        global $wpdb;

        // Delete transients by either wildcard or direct name match
        $wpdb->query( "DELETE FROM `$wpdb->options` WHERE `option_name` LIKE ('%az_cache_%')" );

    }
    
    /**
     * Delete all posts elements transients
     *
     * @access public
     * @param int $post_id
     * @static
     * @return string
     */
    public static function delete_post_elements_transients( $post_id ) {

        self::_delete_transients( 'post_elements', [ 'post_id' => $post_id ] );
        
    }

}



function create_dwb_menu() {

    global $wp_admin_bar;

    $post_id = is_admin() && isset( $_GET['post'] ) ? $_GET['post'] : get_queried_object_id();

    if ( $post_id && $wp_admin_bar ) {

        $wp_admin_bar->add_menu( array( 'id' => 'az_elements', 'title' => __( 'Elements' ), 'href' => '/' ) );

    }

}

add_action('admin_bar_menu', 'create_dwb_menu', 2000);

add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');

function piklist_theme_setting_pages( $pages )
{
    $pages[] = array(
        'page_title' => __('Cache Settings'),
        'menu_title' => __('Cache', 'piklist'),
        'sub_menu' => 'themes.php', // Under Appearance menu
        'capability' => 'manage_options',
        'menu_slug' => 'az_cache_settings',
        'setting' => 'theme_cache_settings',
        'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png'),
        'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png'),
        'single_line' => true,
        'default_tab' => 'Basic',
        'save_text' => 'Save Cache Settings'
    );

    return $pages;
}

add_action( 'updated_option', 'wpse_check_settings', 10, 3 );

function wpse_check_settings( $option, $old_value, $new_value ) {

    // Process saving of cache settings
    if ( $option == 'theme_cache_settings') {

        if ( isset( $new_value['az_cache_clear_all'] ) && $new_value['az_cache_clear_all'] == '1' ) {

            // Unset the checkbox for clearing cache
            $new_value['az_cache_clear_all'] = '';
            update_option( 'theme_cache_settings', $new_value );
            AZ_Cache::delete_all_transients();

        }

    }


}
