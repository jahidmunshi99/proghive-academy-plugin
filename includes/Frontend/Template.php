<?php
namespace Proghive\Academy\Frontend;

/**
 * Template Class
 */
class Template {
    public function __construct() {
        add_filter('template_include', [ $this, 'pha_login_page_include' ] );
    }

    public function pha_login_page_include( $template ) { 
        ob_start();       
        if ( is_page('Login Page')) { // Corrected condition to check specific page
            
                $custom_template = __DIR__ . '/templates/login-page-template.php';

            if ( file_exists( $custom_template )) { // Check if file exists
                return $custom_template; // Return the path to your custom template
            }
        }
        ob_get_clean();
        return $template;
    }
}
