<?php 
namespace Proghive\Academy\Frontend;

/**
 * Formhandler
 */
class Formhandler{

       public function __construct()
    {
        add_action( 'init', [$this, 'session_start'] );
        add_action('template_redirect', [$this, 'form_handler_for_login']);
    }

    public function session_start(){
        if( ! session_id() ){
            session_start();
        }
    }

    /**
     * This Function will fetch data and verify user input. 
     * When user information will match with database then redirect it on the dashoard. 
     */

    function form_handler_for_login() {
        // Define a global variable for the error message
        global $error_message;
        $error_message = '';

        
        // Check if the form is submitted by checking the submit button
        if (!isset($_POST['submit_button'])) {
            return;
        }

        // Verify nonce for security, checking first if the field exists
        if (!isset($_POST['ph_nonce_field']) || !wp_verify_nonce($_POST['ph_nonce_field'], 'ph_nonce_action')) {
            wp_die(__('Something is wrong with the request.', 'proghive'));
        }

        // Sanitize form input
        $user_email = ! empty($_POST['email']) ? sanitize_text_field($_POST['email']) : '';
        $user_password = ! empty($_POST['password']) ? sanitize_text_field($_POST['password']) : '';

        // Check if fields are filled
        if ( empty( $user_email) || empty( $user_password ) ) {
            $error_message = "Please enter both email and password.";
            return;
        }


        // Fetch student data from the custom database table

        $students = get_sutdents_results();

  
        foreach( $students as $item ){
            $id = $item->id;
            $email = $item->email;
            $password = $item->user_password;
            $batch = $item->batch;
            if( $email === $user_email && $password === $user_password){
                // Redirect if the credentials are valid
                $_SESSION['user_id'] = $id;
                $_SESSION['user_email'] = $email;
                $_SESSION ['user_batch']= $batch;
                wp_redirect( home_url('/shortcode/' ));
                exit;
            } else {
                // Set the error message if login fails
                $error_message = "Invalid email or password!";
            }
        }
    }
}