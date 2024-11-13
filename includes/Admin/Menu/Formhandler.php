<?php

namespace Proghive\Academy\Admin\Menu;

use Proghive\Academy\Traits\Form_Error;

/**
 * Formhandler Class
 */
class Formhandler{
    use Form_Error;
    
    /**
     * Students Page Function
     */
    public function students_page_function(){
        $action = isset( $_GET['action']) ? $_GET['action'] : 'default';

        switch ( $action ) {
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

    /**
     * Videos Page Function
     */
    
    public function vidoes_pages_function(){
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';

        switch ( $action ) {
            case 'new':
                $template = __DIR__ . '/videos/videos-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/videos/videos-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/videos/videos-view.php';
                break;
            default:
                $template = __DIR__ . '/videos/videos-dashboard.php';
        }

        if( file_exists( $template )){
            include( $template );
        }
    }


    /**
     * Batches Page Function
     */

    public function batches_page_function(){
        $action = isset( $_GET['action']) ? $_GET['action'] : 'default';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/batch/batch-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/batch/batch-edit.php';
                break;

            default:
            $template = __DIR__ . '/batch/batch-dashboard.php';
        }

        if( file_exists( $template )){
            include $template;
        }
    }


    /**
     * Form Handler for New Students From
     */

    public function form_handler_students(){
        /**
         * Check Button name
         */
        if ( ! isset( $_POST['submit_student'] )){
            return;
        }

        /**
         * Verify wpnoce Button
         */       
        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-student' ) ){
            wp_die( esc_html__( 'Are you cheatting', 'wepme' ) );
        }

        /**
         * Verifiy Current user can
         */
        if( ! current_user_can( 'manage_options' )){
            wp_die( esc_html__( 'Are you cheatting', 'wepme' ) );
        }

        /**
         * Sanitize Students Information
         */
        $course_name   = ! empty( $_POST[ 'course_name' ] ) ? sanitize_text_field($_POST[ 'course_name' ] ) : '';
        $batch         = ! empty( $_POST[ 'batch' ] ) ? sanitize_text_field($_POST[ 'batch' ] ) : '';
        $name          = ! empty($_POST[ 'name' ] ) ?  sanitize_text_field($_POST[ 'name' ] ) : '';
        $phone         = ! empty($_POST[ 'phone' ] ) ?  sanitize_text_field($_POST[ 'phone' ] ) : '';
        $email         = ! empty( $_POST[ 'email' ] ) ? sanitize_text_field($_POST[ 'email' ] ) : '';
        $nid_number    = ! empty( $_POST[ 'nid_number' ] ) ? sanitize_text_field($_POST[ 'nid_number' ] ) : '';
        $facebook_link = ! empty( $_POST[ 'facebook_link' ] ) ? esc_attr( $_POST[ 'facebook_link' ] ) : '';
        $address       = ! empty( $_POST[ 'address' ] ) ? sanitize_textarea_field( $_POST[ 'address' ] ) : '';
        $user_name     = ! empty($_POST[ 'user_name' ] ) ?  esc_attr($_POST[ 'user_name' ] ) : '';
        $user_password = ! empty($_POST[ 'user_password' ] ) ?  esc_attr( $_POST[ 'user_password' ] ) : '';

        /**
         * check if has empty field
         */

        if( empty( $course_name )){
            $this->errors['course_name'] = __('please select course name', 'proghive');
        }

        if( empty( $batch )){
            $this->errors['batch'] = __('please select the batch name', 'proghive');
        }

        if( empty( $name )){
            $this->errors['name'] = __('please provide your name', 'proghive');
        }

        if( empty( $phone )){
            $this->errors['phone'] = __('please provide your phone number', 'proghive');
        }

        if( empty( $email )){
            $this->errors['email'] = __('please provide your email address', 'proghive');
        }

        if( empty( $nid_number )){
            $this->errors['nid_number'] = __('please provide your national identity number', 'proghive');
        }

        if( empty( $facebook_link )){
            $this->errors['facebook_link'] = __('please provide your facebook url', 'proghive');
        }
        
        if( empty( $address )){
            $this->errors['address'] = __('please provide your address', 'proghive');
        }
        
        if( empty( $user_name )){
            $this->errors['nid_number'] = __('please set your user name', 'proghive');
        }
        
        if( empty( $user_password )){
            $this->errors['user_password'] = __('please set your user password', 'proghive');
        }

        if ( ! empty( $this->errors ) ) {
            return;
        }

        $studets_info = insert_students_information( [
            'course_name'   => $course_name,
            'user_name'     => $user_name,
            'user_password' => $user_password,
            'name'          => $name,
            'phone'         => $phone,
            'email'         => $email,
            'batch'         => $batch,
            'nid_number'    => $nid_number,
            'facebook_link' => $facebook_link,
            'address'       => $address,
            'user_name'     => $user_name,
            'user_password' => $user_password,
        ] ) ;

            if( is_wp_error( $studets_info )){
                wp_die( $studets_info->get_error_message() );
            }


        $redirect_to = admin_url( 'admin.php?page=proghive-plugin-students&inserted=true' );
        wp_redirect( $redirect_to );
        exit;
    }


    /**
     * Form Handler for Videos
     */

     public function form_handler_videos(){
        if( ! isset( $_POST['submit_video'])){
            return;
        }
        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-video' )){
            wp_die( __( 'Are You cheating', 'proghive' ) );
        }

        if( ! current_user_can( 'manage_options' )){
            wp_die( __( 'Are You cheating', 'proghive' ) );
        }

        /**
         * Sanitize text filed
         */
        $course_name = ! empty( $_POST['course_name'] ) ? sanitize_text_field( $_POST['course_name'] ) : '';
        $batch_name = ! empty( $_POST['batch_name'] ) ? sanitize_text_field( $_POST['batch_name'] ) : '';
        $video_title = ! empty( $_POST['video_title'] ) ? sanitize_text_field( $_POST['video_title'] ) : '';
        $video_url = ! empty( $_POST['video_url']) ? esc_attr( $_POST['video_url'] ) : '';
        $video_details = ! empty( $_POST['video_details'] ) ? sanitize_textarea_field( $_POST['video_details'] ) : '';
         

        $videos_data = [
            'course_name'   => $course_name,
            'batch_name'    => $batch_name,
            'video_title'   => $video_title,
            'video_url'     => $video_url,
            'video_details' => $video_details,
        ];
        
        $insert_video = insert_video_informaton( $videos_data );
        if ( is_wp_error( $insert_video )) {
            wp_die( $insert_video->get_error_message());
        }
        $redirect_to = admin_url( 'admin.php?page=proghive-plugin-videos&installed=true' );
        wp_redirect( $redirect_to );
        exit;
    }


    /**
     * Form Handler for Batches
     */

    public function form_handler_batches(){
        /**
         * Check Button name
         */
        if ( ! isset( $_POST['submit_batch'] ) ){
            return;
        }

        /**
         * Verify wpnoce Button
         */ 
        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'new-batch' )){
            wp_die( esc_html__( 'Are you cheatting', 'wepme' ) );
        };

        /**
         * Verifiy Current user can
         */
        if( ! current_user_can( 'manage_options' )){
            wp_die( esc_html__( 'Are you cheatting', 'wepme' ) );
        }


        /**
         * Sanitize Batch Information
         */
        $course_name      = ! empty( $_POST[ 'course_name' ]) ? sanitize_text_field( $_POST[ 'course_name' ] ) : '';
        $batch_name       = ! empty( $_POST[ 'batch_name' ]) ? sanitize_text_field( $_POST[ 'batch_name' ] ) : '';
        $batch_type       = ! empty( $_POST[ 'batch_type' ]) ? esc_attr( $_POST[ 'batch_type' ] ) : '';
        $total_seats      = ! empty( $_POST[ 'total_seat' ]) ? sanitize_text_field( $_POST[ 'total_seat' ] ) : '';
        $end_registration = ! empty( $_POST[ 'end_of_registration_date' ]) ? esc_attr( $_POST[ 'end_of_registration_date' ] ) : '';

        $insert_batch = [
                'course_name'              => $course_name,
                'batch_name'               => $batch_name,
                'batch_type'               => $batch_type,
                'total_seat'               => $total_seats,
                'end_of_registration_date' => $end_registration,
            ];
        $batch_id = insert_batch_informaton( $insert_batch );
        if( is_wp_error( $batch_id )){
            wp_die( $batch_id->get_error_message() );
        }

        $redirect_to = admin_url( 'admin.php?page=proghive-plugin-batches&inserted=true' );
        wp_redirect( $redirect_to );
        exit;
    }
}