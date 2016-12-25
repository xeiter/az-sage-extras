<?php

add_action( 'post_updated', [ AZ_Cache, 'delete_post_elements_transients' ] );

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
    private static $_transient_name_prefix = '_transient_';

    /**
     * Build transient name using provided control variables
     *
     * @param $scope
     * @param $scope_id
     * @param $type
     * @param null $subject
     * @return string
     * @sttatic
     */
    private static function _get_transient_name( $scope, $scope_id, $type, $subject = null ) {

        $transient_name =
            self::$_transient_name_prefix .
            $scope .
            self::$_delimiter .
            $scope_id .
            self::$_delimiter .
            $type .
            self::$_delimiter .
            'cache' .
            self::$_delimiter ;

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
    public static function get_post_elements_transient_name( $post_id, $element_name = null ) {

        return self::_get_transient_name( 'post', $post_id, 'element', $element_name );

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

