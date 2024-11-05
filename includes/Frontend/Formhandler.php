<?php 
namespace Proghive\Academy\Frontend;

/**
 * Formhandler
 */
class Formhandler{

    public function __construct()
    {
        add_action('template_redirect', [$this, 'form_handler_for_login']);
    }

    function form_handler_for_login() {
    // Define a global variable for the error message
        global $error_message, $wpdb;
        $error_message = '';

        // Check if the form is submitted
        if ( ! isset($_POST['submit_button'])) {
            return;
        }

        // Verify nonce for security
        if (!isset($_POST['submit_form_nonce']) || !wp_verify_nonce($_POST['submit_form_nonce'], 'submit_form_nonce')) {
            wp_die( __('Are you cheating?', 'proghive'));
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
        $table_name = $wpdb->prefix . 'ph_students';
        $student = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE email = %s", $user_email));
        
        /**
         * Checking sql data to user input data
         */
        if ( $student && $student->user_password === $user_password) {
            // Redirect if the credentials are valid
            wp_redirect( home_url('/shortcode/' ));
            exit;
        } else {
            // Set the error message if login fails
            $error_message = "Invalid email or password!";
        }
    }
}