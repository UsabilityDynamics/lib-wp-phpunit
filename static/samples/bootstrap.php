<?php
/**
 * PHP Unit Test
 * 
 *
 * Direct call. example: http://{domain}/{path_to_module}/static/samples/bootstrap.php
 */
 
// Set correct path to Composer Autoload file
define( 'PHPUNIT_PROJECT_ROOT_PATH', dirname( dirname( dirname( __DIR__ ) ) ) );
if( !file_exists( PHPUNIT_PROJECT_ROOT_PATH . '/vendor/libraries/autoload.php' ) || !require_once( PHPUNIT_PROJECT_ROOT_PATH . '/vendor/libraries/autoload.php' ) ) {
  exit( "Could not load composer autoload file. Path: " . PHPUNIT_PROJECT_ROOT_PATH . '/vendor/libraries/autoload.php' . "\n" );
}
// Determine if our Bootstrap class exists.
if( !class_exists( 'UsabilityDynamics\Test\Bootstrap' ) ) {
  exit( "Bootstrap class for init WP PHPUnit Tests is not found.\n" );
}
// Loader
$test = UsabilityDynamics\Test\Bootstrap::get_instance();

exit( "Done.\n" );