<?php
namespace Proghive\Academy\Admin\Menu;

if( ! class_exists( 'Ph_Students_List_Table' )){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Ph Students List Table Class
 */
class Ph_Students_List_Table extends \WP_List_Table{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'content',
            'plurual'  => 'contents',
            'ajax'     => false,
        ]);
    }

    public function get_columns(){
        return[
            'cb' => '<input type="checkbox"/>',
            'name' => __( 'Name', 'proghive' ),
            'email' => __( 'Email', 'proghive' ),
            'phone' => __( 'Phone', 'proghive' ),
        ];
    }

    protected function get_sortable_columns() {
        $sortable = [
            'name' => ['name', true ],
            'phone' => ['phone', true ],

        ];
        return $sortable;
    }
    

    public function column_default( $item, $column_name ){
        switch ($column_name) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                return isset( $item->$column_name) ? $item->$column_name : '';
        }
    }

    protected function column_name( $item ){
        $actions = [];
        $actions['edit'] = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=proghive-plugin-students&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'proghive' ), __( 'Edit', 'proghive' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=ph-ac-delete-address&id=' . $item->id ), 'ph-ac-delete-address' ), $item->id, __( 'Delete', 'proghive' ), __( 'Delete', 'proghive' ) );
        return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=proghive-plugin-students&action=view&id=' . $item->id ), $item->name, $this->row_actions( $actions )
        );
    }

    public function column_cb( $item ){
        return sprintf(
            '<input type="checkbox" name="student_id[]" value="%d"/>', $item->id
        );
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
                'number' => $per_page,
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