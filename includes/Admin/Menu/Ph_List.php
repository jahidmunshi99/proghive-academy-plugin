<?php

namespace Proghive\Academy\Admin\Menu;
if( ! class_exists( 'Ph_List' )){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
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
            'cb'          => '<input type="checkbox" class=""/>',
            'name'        => "<strong>".__( 'Name', 'proghive' )."</strong>",
            'email'       => "<strong>".__( 'Email', 'proghive' )."</strong>",
            'phone'       => "<strong>".__( 'Phone', 'proghive' )."</strong>",
            'batch'       => "<strong>".__( 'Batch', 'proghive' )."</strong>",
            'course_name' => "<strong>".__( 'Course Name', 'proghive' )."</strong>",
            'created_by'  => "<strong>".__( 'Author', 'proghive' )."</strong>",
            'created_at'  => "<strong>".__( 'Date', 'proghive' )."</strong>",
        ];
    }

    protected function column_default( $item, $column_name ){

        switch ($column_name) {
            case 'value':
                # code...
                break;
            
            default:
                return isset( $item->$column_name ) ? $item->$column_name : '';
        }
    }

    /**
     * Prepares the list of items for displaying.
     */
    public function prepare_items() {
    
        $columns = $this->get_columns(); 
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $per_page = 10;
        $current_page = $this->get_pagenum();
        $offset = ( $current_page - 1 ) * $per_page;

        $this->_column_headers = array($columns, $hidden, $sortable);

        $args = array(
                'numberposts' => $per_page,
                'offset'      => $offset,
        );
        
        if( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order'] = $_REQUEST['order'];
        }

        $this->items = get_sutdents_results( $args );

        $this->set_pagination_args(
            array(
            'total_items' => get_students_count(),
            'per_page'    => $per_page,
            )
        );
        
    }
}