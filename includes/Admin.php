<?php 
namespace Proghive\Academy;

/**
 * Admin Class
 */

class Admin{
    public function __construct(){
        $form_handle = new Admin\Menu\Formhandler( );
        new Admin\Menu( $form_handle );
        $this->dispath_action( $form_handle );
    }

    public function dispath_action( $form_handle ){
        add_action( 'admin_init', [ $form_handle, 'form_handler_students' ] );
        add_action( 'admin_init', [ $form_handle, 'form_handler_batches' ] );
        add_action( 'admin_init', [ $form_handle, 'form_handler_videos' ] );
    }

}