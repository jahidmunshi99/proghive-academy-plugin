<?php
namespace Proghive\Academy\Admin\Menu;

/**
 * Videos Class
 */
class Videos{
    public function vidoes_pages_function(){
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';

        switch ( $action ) {
            case 'new':
                $template = __DIR__ . '/videos/videos-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/videos/videos-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/videos/videos-view.php';
                break;
            default:
                $template = __DIR__ . '/videos/videos-dashboard.php';
        }

        if( file_exists( $template )){
            include( $template );
        }
    }
}