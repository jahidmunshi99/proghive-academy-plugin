<?php 
namespace Proghive\Academy\Admin;

/**
 * Menu Class
 */
class Menu{
    public $form_handle;
    
    public function __construct( $form_handle ){
        $this->form_handle = $form_handle;
        add_action( 'admin_menu', [ $this, 'admin_menu' ]);
    }

    public function admin_menu(){
        $page_title = esc_attr__( 'ProgHive Ac', 'proghive' );
        $capability = 'manage_options';
        $parent_slug = 'proghive-plugin-page';
        add_menu_page( $page_title, esc_attr__( 'ProgHive Ac', 'proghive' ), $capability, $parent_slug, [$this, 'proghive_cb'], 'dashicons-visibility', 105 );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Dashboard', 'proghive'), $capability, $parent_slug, [$this, 'proghive_cb'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Students', 'proghive'), $capability, 'proghive-plugin-students', [$this->form_handle, 'students_page_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Videos', 'proghive'), $capability, 'proghive-plugin-videos', [$this->form_handle, 'vidoes_pages_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Batches', 'proghive'), $capability, 'proghive-plugin-batches', [$this->form_handle, 'batches_page_function'] );
        add_submenu_page( $parent_slug, $page_title, esc_attr__('Settings', 'proghive'), $capability, 'proghive-plugin-settings', [$this->form_handle, 'settings_pages_function'] );
    }

    public function proghive_cb(){
        echo '<h1>Dashborad</h1>';
    }
}