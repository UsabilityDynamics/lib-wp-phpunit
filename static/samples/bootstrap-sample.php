<?php
/**
 * PHP Unit Test Bootstrap
 * This is bootstrap file which installs/loads bootstrap
 *
 * Note: you only have to set TEST_ROOT_PATH constant here.
 */

/** 
 * REQUIRED. 
 * SET TEST_ROOT_PATH CONSTANT. This is a path to root of your module 
 */ 
define( 'TEST_ROOT_PATH', 'PATH_TO_ROOT' );

/** 
 * REQUIRED. 
 * YOU MUST SET YOUR CUSTOM PATH TO CONFIG FILE HERE. 
 *
 * Note: sample config file 'wp-test-config-sample.php' can be found in 'static/samples/' directory.
 */
$config = false;

/** DO NOT TOUCH CODE BELOW */

// Set correct path to Composer Autoload file
$path = TEST_ROOT_PATH . '/vendor/autoload.php';
if( !file_exists( $path ) || !require_once( $path ) ) {
  exit( "Could not load composer autoload file. Path: {$path}\n" );
}
// Determine if our Bootstrap class exists.
if( !class_exists( 'UsabilityDynamics\Test\Bootstrap' ) ) {
  exit( "Bootstrap class for init WP PHPUnit Tests is not found.\n" );
}
// Loader
UsabilityDynamics\Test\Bootstrap::get_instance( array( 
  'config' => $config,  
) );