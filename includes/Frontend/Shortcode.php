<?php
namespace Proghive\Academy\Frontend;

/**
 * Shortcode Class
 */

class Shortcode{
    public function __construct()
    {
        add_shortcode('playlist', [ $this, 'playlist_shortcode' ] );
        add_shortcode('login-form', [ $this, 'login_shortcode' ] );
    }

    public function playlist_shortcode( ){

        ob_start();
            $template = __DIR__ . '/templates/video-playlist.php';
            if( file_exists( $template )){
                include $template;
            }
    return ob_get_clean();
    }
}