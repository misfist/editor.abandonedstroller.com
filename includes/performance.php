<?php
/**
 * Core Performance Functions
 *
 * @package    Abandoned_Stroller_Core_Functionality
 * @subpackage Abandoned_Stroller_Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

/**
 * Remove query strings from static resources
 *
 * @since   0.1.0
 *
 * @uses    script_loader_src filter
 * @uses    style_loader_src filter
 *
 * @param   {string} $src
 * @return  {string} $parts[0]
 */
 function abandoned_stroller_core_remove_script_version( $src ){
     $parts = explode( '?ver', $src );
     return $parts[0];
 }
 add_filter( 'script_loader_src', 'abandoned_stroller_core_remove_script_version', 15, 1 );
 add_filter( 'style_loader_src', 'abandoned_stroller_core_remove_script_version', 15, 1 );
