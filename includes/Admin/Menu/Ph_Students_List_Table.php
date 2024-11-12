<?php
namespace Proghive\Academy\Admin\Menu;
if( ! class_exists( 'Ph_Students_List_Table' )){
    include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Ph_Students_List_Table Class
 */
class Ph_Students_List_Table extends \WP_List_Table{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'content',
            'plural'   => 'contents',
            'ajax'     => false,
        ]);
    }

    public function get_columns(){
        return[
            'cb'          => '<input type="checkbox"/>',
            'name'        => __('Name', 'proghive'),
            'email'       => __('Email', 'proghive'),
            'phone'       => __('Phone', 'proghive'),
            'course_name' => __('Course Name', 'proghive'),
            'batch'       => __('Batch', 'proghive'),
            'created_by'  => __('Author', 'proghive'),
            'created_at'  => __('Date', 'proghive'),
        ];
    }

    protected function column_default( $item, $column_name ) {
        switch ($column_name) {
            case 'value':
                # code...
                break;
            
            default:
                return isset($item->$column_name) ? $item->$column_name : '';
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

        $this->items = get_sutdents_results($args);

        $this->set_pagination_args(
            array(
            'total_items' => get_students_count(),
            'per_page'    => $per_page,
            )
        );
        
    }
}