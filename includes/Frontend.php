<?php 
namespace Proghive\Academy;

/**
 * Frontend Class
 */
class Frontend{
    public function __construct()
    {
        new Frontend\Shortcode();
        new Frontend\Template();
        new Frontend\Formhandler();
        // $form_handle = new Frontend\Formhandler();
        // $form_handle->form_handler_for_login();
        // $this->dispath_action( $form_handle );
    }

    // public function dispath_action( $form_handle ){
    //     // add_action('template_redirect', [ $form_handle, 'form_handler_for_login' ]);
    // }
}