<?php

namespace Proghive\Academy\Admin\Menu;
if( ! class_exists( 'Ph_List' )){
    require ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Formhandler Class
 */
class Ph_List extends \WP_List_Table{
    function __construct()
    {
        parent::__construct([
            'singular' => 'content',
            'plural'   => 'contents',
            'ajax'     => false,
        ]);
    }

    public function get_columns(){
        return[
            'cb' => '<input type="checkbox" class=""/>'
        ];
    }





}