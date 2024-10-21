<?php 
namespace Proghive\Academy\Admin;

/**
 * Menu Class
 */
class Menu{
    public $students;
    public $videos;
    public $settings;
    public $batches;
    public function __construct( $students, $videos, $settings, $batches ){
        $this->students = $students;
        $this->videos = $videos;
        $this->settings = $settings;
        $this->batches = $batches;
        add_action( 'admin_menu', [ $this, 'admin_menu' ]);
    }

    public function admin_menu(){
        $page_title = esc_attr__( 'ProgHive Ac', 'proghive' );
        $capability = 'manage_options';
        $parent_slug = 'proghive-plugin-page';
        add_menu_page( $page_title, esc_attr__( 'ProgHive Ac', 'proghive' ), $capability, $parent_slug, [$this, 'proghive_cb'], 'dashicons-visibility', 105 );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Dashboard', 'proghive'), $capability, $parent_slug, [$this, 'proghive_cb'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Students', 'proghive'), $capability, 'proghive-plugin-students', [$this->students, 'students_page_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Videos', 'proghive'), $capability, 'proghive-plugin-videos', [$this->videos, 'vidoes_pages_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Batches', 'proghive'), $capability, 'proghive-plugin-batches', [$this->batches, 'batches_page_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Settings', 'proghive'), $capability, 'proghive-plugin-settings', [$this->settings, 'settings_pages_function'] );
    }

    public function proghive_cb(){
        echo '<h1>Dashborad</h1>';
    }
}