<?php

namespace Proghive\Academy\Admin\Menu;

/**
 * Formhandler Class
 */
class Formhandler{
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
    }
}