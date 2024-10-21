<?php
namespace Proghive\Academy\Admin\Menu;

/**
 * Students Class
 */
class Students{
    public function students_page_function(){
        $action = isset( $_GET['action']) ? $_GET['action'] : 'default';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/students/students-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/students/students-edit.php';
                break;

            default:
            $template = __DIR__ . '/students/students-dashboard.php';
        }

        if( file_exists( $template )){
            include $template;
        }
    }

    public function form_handler(){
        if( ! isset($_POST[ 'submit_student' ] ) ){
            return;
        }

        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-student' ) ){
            wp_die( esc_html__( 'Are you cheatting form wpnonce', 'wepme' ) );
        }

        if( ! current_user_can( 'manage_options' )){
            wp_die( esc_html__( 'Are you cheatting', 'wepme' ) );
        }

        $name        = sanitize_text_field($_POST['name']);
        $phone       = sanitize_text_field($_POST['phone']);
        $email       = sanitize_text_field($_POST[ 'email' ]);
        $batch       = sanitize_text_field($_POST['batch']);
        $fathersName = sanitize_text_field($_POST['fathersName']);
        $mothersName = sanitize_text_field($_POST['mothersName']);
        $village     = sanitize_text_field($_POST['village']);
        $post        = sanitize_text_field($_POST['post']);
        $upozila     = sanitize_text_field($_POST['upozila']);
        $district    = sanitize_text_field($_POST['district']);

        $insert_id = insert_students_information( [
            'name'        => $name,
            'phone'       => $phone,
            'email'       => $email,
            'batch'       => $batch,
            'fathersName' => $fathersName,
            'mothersName' => $mothersName,
            'village'     => $village,
            'post'        => $post,
            'upozila'     => $upozila,
            'district'    => $district,
        ] ) ;
        if( is_wp_error( $insert_id )){
            wp_die( $insert_id->get_error_message() );
        }

        $redirect_to = admin_url( 'admin.php?page=proghive-plugin-students&inserted=true' );
        wp_redirect( $redirect_to );

        var_dump( $_POST );
    }
}