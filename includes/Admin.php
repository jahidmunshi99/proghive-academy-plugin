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
        $form_handle = new Admin\Menu\Formhandler( );
        $this->dispath_action( $form_handle );
    }

    public function dispath_action( $form_handle ){
        add_action( 'admin_init', [ $form_handle, 'form_handler_students' ] );
        add_action( 'admin_init', [ $form_handle, 'form_handler_batches' ] );
        add_action( 'admin_init', [ $form_handle, 'form_handler_videos' ] );
    }

}