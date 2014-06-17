<?php
/**
 * Bootstrap
 * 
 */
namespace UsabilityDynamics\Test {

  if( !class_exists( 'UsabilityDynamics\Test\Bootstrap' ) ) {

    /**
     * Class Bootstrap
     *
     * @package UsabilityDynamics\Test
     * @author peshkov@UD
     */
    class Bootstrap {
      
      private static $instance = null;
      
      private $errors = null;
      
      /**
       * Constructor
       * We must not init test constructor twice.
       */
      private function __construct( $args ) {
        try {
          if( !class_exists( 'WP_UnitTest_Bootstrap' ) ) {
            throw new \Exception( 'Can not find Bootstrap class WP_UnitTest_Bootstrap for lib-wordpress-tests module.' );
          }
          /** Path to Unit tests configuration file. */
          $config = !empty( $args[ 'config' ] ) ? $args[ 'config' ] : dirname( __DIR__ ) . '/static/config/config-default.php';
          /** Loads Wordpress */
          \WP_UnitTest_Bootstrap::load( $config );
        } catch ( \Exception $e ) {
          $this->error( $e->getMessage() );
        }
      }
      
      /**
       * Determine if instance already exists and Return UI Instance
       *
       * @author peshkov@UD
       */
      static public function get_instance( $args = array() ) {
        if( null === self::$instance ) {
          self::$instance = new self( $args );
        }
        if( self::$instance->has_errors() ) {
          $errors = implode( '\n', self::$instance->errors );
          exit( "There are the following errors on PHUnit test initialization:.\n {$errors}\n" );
        }
        return self::$instance;
      }
      
      /**
       * Determine if error happened on test init.
       *
       */
      public function has_errors() {
        return $this->errors !== null ? true : false;
      }
      
      /**
       *
       */
      private function error( $error ) {
        $this->errors = !is_array( $this->errors ) ? array() : $this->errors;
        array_push( $this->errors, $error );
      }
      
    }
  
  }

}