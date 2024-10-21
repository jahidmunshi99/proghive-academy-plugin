<?php 
namespace Proghive\Academy;

/**
 * Admin Class
 */

class Admin{
    public function __construct(){
        $students = new Admin\Menu\Students();
        $videos   = new Admin\Menu\Videos();
        $settings = new Admin\Menu\Settings();
        $batches  = new Admin\Menu\Batches();
        new Admin\Menu( $students, $videos, $settings, $batches );
        $this->dispath_action( $students );
    }

    public function dispath_action( $students ){
        add_action('admin_init', [ $students, 'form_handler' ] );
    }

}