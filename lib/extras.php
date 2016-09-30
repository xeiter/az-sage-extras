<?php

function to_dashed($string) {

    //Lower case everything
    $string = strtolower($string);

    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);

    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);

    return $string;
}

/**
 * Sort array of associative arrays by specified key
 *
 * @param array  $array
 * @param array $sort_by_key
 * @return array
 */
function sort_array_of_arrays( $array, $sort_by_key ) {

    usort( $array, function ( $item1, $item2 ) use ( $sort_by_key ) {

        if ($item1[ $sort_by_key ] == $item2[ $sort_by_key ]) return 0;
        return $item1[ $sort_by_key ] < $item2[ $sort_by_key ] ? -1 : 1;

    });

    return $array;

}
