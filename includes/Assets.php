<?php
namespace Proghive\Academy;

/**
 * Assets Class
 */
class Assets{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_assets'] );
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_assets'] );
    }

    public function get_styles(){
        return [ 'PhAc-frontend-style' => [
            'src' => PROGHIVE_ACADEMY_ASSETS . '/css/frontend-style.css',
            'ver' => filemtime( PROGHIVE_ACADEMY_PATH . '/assets/css/frontend-style.css' ),
            ]
        ];
    }

    public function get_scripts(){
        return [ 'PhAc-frontend-script' => [
            'src' => PROGHIVE_ACADEMY_ASSETS . '/js/frontend-script.js',
            'ver' => filemtime( PROGHIVE_ACADEMY_PATH . '/assets/js/frontend-script.js' ),
            'dep' => 'jquery',
            ]
        ];
    }

    public function enqueue_assets(){
        /**
         * Register All Styles
         */
        $styles = $this->get_styles();
        foreach( $styles as $handler => $style ){
            $dep = isset( $style['dep'] ) ? $style['dep'] : '';
            wp_register_style( $handler, $style['src'], $dep, $style['ver'] );
        }

        /**
         * Register All Scripts
         */
        $scripts = $this->get_scripts();
        foreach( $scripts as $handler => $script ){
            $dep = isset( $style['dep'] ) ? $style['dep'] : '';
            wp_register_script( $handler, $script['src'], $dep, $script['ver'], true );
        }
    }
}