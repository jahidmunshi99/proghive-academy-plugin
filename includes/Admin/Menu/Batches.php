<?php
namespace Proghive\Academy\Admin\Menu;

/**
 * Batches Class
 */
class Batches{
    public function batches_page_function(){
        $action = isset( $_GET['action']) ? $_GET['action'] : 'default';

        switch ($action) {
            case 'new':
                $template = __DIR__ . '/batch/batch-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/batch/batch-edit.php';
                break;

            default:
            $template = __DIR__ . '/batch/batch-dashboard.php';
        }

        if( file_exists( $template )){
            include $template;
        }
    }
}