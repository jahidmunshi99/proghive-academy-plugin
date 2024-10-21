<?php 
namespace Proghive\Academy;

/**
 * Installer Class
 */
class Installer{
    public function run(){
        $this->add_version();
        $this->create_student_table();
        // $this->create_video_link_table();
        // $this->create_batches();
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
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `user_name` varchar(50) NOT NULL,
            `user_password` varchar(50) NOT NULL DEFAULT,
            `name` varchar(50) NOT NULL,
            `phone` int(12) NOT NULL,
            `email` varchar(50) NOT NULL,
            `batch` varchar(20) NOT NULL,
            `fathers_name` varchar(50) NOT NULL,
            `mothers_name` varchar(50) NOT NULL,
            `village` varchar(100) NOT NULL,
            `post` varchar(20) NOT NULL,
            `upozila` int(20) NOT NULL,
            `district` varchar(20) NOT NULL,
            `created_by` varchar(20) NOT NULL,
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
    // public function create_video_link_table(){
    //     global $wpdb;

    //     $charset_collate = $wpdb->get_charset_collate();

    //     $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ph_videos` (
    //       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    //       `name` varchar(100) NOT NULL DEFAULT '',
    //       `address` varchar(255) DEFAULT NULL,
    //       `phone` varchar(30) DEFAULT NULL,
    //       `created_by` bigint(20) unsigned NOT NULL,
    //       `created_at` datetime NOT NULL,
    //       PRIMARY KEY (`id`)
    //     ) $charset_collate";

    //     if ( ! function_exists( 'dbDelta' ) ) {
    //         require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //     }

    //     dbDelta( $schema );

    // }

    // public function create_batches(){
    //     global $wpdb;
    //     $charset_collate = $wpdb->get_charset_collate();

    //     $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ph_batches` (
    //       `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    //       `course_name` varchar(100) NOT NULL DEFAULT '',
    //       `batch_name` varchar(255) DEFAULT NULL,
    //       `total_seat` bigint(20) unsigned NOT NULL,
    //       `created_by` bigint(20) unsigned NOT NULL,
    //       `created_at` datetime NOT NULL,
    //       PRIMARY KEY (`id`)
    //     ) $charset_collate";

    //     if ( ! function_exists( 'dbDelta' ) ) {
    //         require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //     }

    //     dbDelta( $schema );
    // }
}