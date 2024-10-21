<?php 
/*
 * Plugin Name:       ProgHive Academy
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       proghive
 * Domain Path:       /languages
 */


 if( ! defined( "ABSPATH" )){
    exit;
 }

 /**
  * Require Autoloader
  */
  require_once __DIR__ . '/vendor/autoload.php';

 /**
  * Main Class
  */
  final class Proghive_Academy{

    /**
     * plugin Version
     */
    public const version = '1.0.0';
    /**
     * Plugin Construct
     */
    private function __construct(){
        $this->define_construct();
        register_activation_hook( __FILE__, [ $this, 'active' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Plugin Constructor
     */
    public function define_construct(){
        define( 'PROGHIVE_ACADEMY_VERSION', self::version );
        define( 'PROGHIVE_ACADEMY_FILE', __FILE__ );
        define( 'PROGHIVE_ACADEMY_PATH', __DIR__ );
        define( 'PROGHIVE_ACADEMY_URL', plugins_url('', PROGHIVE_ACADEMY_FILE ) );
        define( 'PROGHIVE_ACADEMY_ASSETS', PROGHIVE_ACADEMY_URL . '/assets' );
    }

    /**
     * After Install Plugin
     */
    public function active(){
        $version = new Proghive\Academy\Installer();
        $version->run();
    }

    /**
     * Initalize After Plguin Loaded
     */
    public function init_plugin(){
        new Proghive\Academy\Admin();
    }

    /**
     * Initailize Singleton Instance
     */
    public static function init(){
        static $instance = false;
        if( ! $instance ){
            $instance = new self();
        }
        return $instance;
    }
  }

/**
* Plugin Function
*/
function proghive_academy(){
    return Proghive_Academy::init();
}
/**
 * Kick off Function
 */
Proghive_Academy();
