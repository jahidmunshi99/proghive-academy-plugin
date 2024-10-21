<?php
namespace Proghive\Academy\Admin\Menu;

if( class_exists('Ph_List')){
    require ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * ph_list_table Class
 */
class Ph_List extends \WP_List_Table{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'contact',
            'plural'   => 'contacts',
            'ajax'     => 'false'

        ]);
    }
    
    public function get_columns() {
        return[
            'cb' => '<input type="checkbox" />',
            'name' => ''
        ];
    }


    

}