<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Array search key & value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'csf_array_search' ) ) {
  function csf_array_search( $array, $key, $value ) {

    $results = array();

    if ( is_array( $array ) ) {
      if ( isset( $array[$key] ) && $array[$key] == $value ) {
        $results[] = $array;
      }

      foreach ( $array as $sub_array ) {
        $results = array_merge( $results, csf_array_search( $sub_array, $key, $value ) );
      }

    }

    return $results;

  }
}

/**
 *
 * Getting POST Var
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'csf_get_var' ) ) {
  function csf_get_var( $var, $default = '' ) {

    $csf_post_data = absint( $_POST[$var] );
    if( isset( $csf_post_data ) ) {
      return $csf_post_data;
    }

    $csf_get_data = absint( $_GET[$var] );
    if(  isset( $csf_get_data ) ) {
      return $csf_get_data;
    }

    return $default;

  }
}

/**
 *
 * Getting POST Vars
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'csf_get_vars' ) ) {
  function csf_get_vars( $var, $depth, $default = '' ) {

    $csf_post_datas = absint( $_POST[$var][$depth] );
    if( isset( $csf_post_datas ) ) {
      return $csf_post_datas;
    }

    $csf_get_datas = absint( $_GET[$var][$depth] );
    if( isset( $csf_get_datas ) ) {
      return $csf_get_datas;
    }

    return $default;

  }
}

/**
 *
 * Between Microtime
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'csf_microtime' ) ) {
  function csf_timeout( $timenow, $starttime, $timeout = 30 ) {

    return ( ( $timenow - $starttime ) < $timeout ) ? true : false;

  }
}

/**
 *
 * Check for wp editor api
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'csf_wp_editor_api' ) ) {
  function csf_wp_editor_api() {

    global $wp_version;

    return version_compare( $wp_version, '4.8', '>=' );

  }
}
