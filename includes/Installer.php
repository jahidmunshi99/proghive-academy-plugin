<?php 
namespace Proghive\Academy;

/**
 * Installer Class
 */
class Installer{
    public function run(){
        $this->add_version();
        $this->create_student_table();
        $this->create_video_link_table();
        $this->create_batches();
        $this->add_login_page();
    }

    /**
     * Initialize Plugin Version
     */
    public function add_version(){
        $installded = get_option( 'plugin_installed' );
        if( ! $installded ){
            update_option( 'plugin_installed', time() );
        }
        update_option('PLUGIN_VERSION', 'PROGHIVE_ACADEMY_VERSION' );
    }

    /**
     * This Table Will Create for all Students data
     */
    public function create_student_table(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ph_students` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `course_name` varchar(50) DEFAULT NULL,
            `batch` varchar(20) DEFAULT NULL,
            `name` varchar(50) DEFAULT NULL,
            `phone` varchar(11) DEFAULT NULL,
            `email` varchar(50) DEFAULT NULL,
            `nid_number` varchar(20) NOT NULL,
            `facebook_link` varchar(100) NOT NULL,
            `address` varchar(500) DEFAULT NULL,
            `user_name` varchar(10) DEFAULT NULL,
            `user_password` varchar(20) DEFAULT NULL,
            `created_by` varchar(50) DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`)
            )$charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );
    }

    /**
     * This Table Will Create for all videos
     */
    public function create_video_link_table(){
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ph_videos` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `course_name` varchar(100) NOT NULL DEFAULT '',
          `batch_name` varchar(50) DEFAULT NULL,
          `video_title` varchar(100) DEFAULT NULL,
          `video_url` varchar(100) DEFAULT NULL,
          `video_details` varchar(500) DEFAULT NULL,
          `created_by` varchar(50) DEFAULT NULL,
          `created_at` datetime NOT NULL,
          PRIMARY KEY (`id`)
        ) $charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );

    }

    /**
     * This Table Will Create for all videos
     */

    public function create_batches(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $sehema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ph_batches` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `course_name` varchar(100) DEFAULT NULL,
                `batch_name` varchar(255) DEFAULT NULL,
                `batch_type` varchar(20) DEFAULT NULL,
                `total_seat` bigint(20) unsigned NOT NULL,
                `end_of_registration_date` datetime DEFAULT NULL,
                `created_by` varchar(50) DEFAULT NULL,
                `created_at` datetime DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) $charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $sehema );
    }

    /**
     * Create a Custom Page using Custom Post
     */


    public function add_login_page(){ 
        $existing_page = get_page_by_title( 'Login Page' );
        $shortcode = esc_attr( '[playlist]' );
        if( ! $existing_page ){
            // Create a new Login page
            $login_page = [
                'post_title'   => wp_strip_all_tags( 'Login Page' ),
                'post_content' => $shortcode,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_type'    => 'page',
            ];
            wp_insert_post( $login_page );
        }
    }
}