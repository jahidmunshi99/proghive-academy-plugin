<?php
namespace Proghive\Academy\Admin\Menu;

/**
 * Settings Class
 */
class Settings{
    public function settings_pages_function(){
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';

        switch ( $action ) {
            case '':
                break;
            default:
                $template = __DIR__ . '/settings/settings-dashboard.php';
        }

        if( file_exists( $template )){
            include( $template );
        }
    }
}