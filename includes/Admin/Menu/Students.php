<?php
namespace Proghive\Academy\Admin\Menu;

/**
 * Students Class
 */
class Students{
    public function students_page_function(){
        $action = isset( $_GET['action']) ? $_GET['action'] : 'default';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/students/students-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/students/students-edit.php';
                break;

            default:
            $template = __DIR__ . '/students/students-dashboard.php';
        }

        if( file_exists( $template )){
            include $template;
        }
    }   
}