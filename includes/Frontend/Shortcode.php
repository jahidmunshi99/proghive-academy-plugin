<?php
namespace Proghive\Academy\Frontend;

/**
 * Shortcode Class
 */

class Shortcode{
    public function __construct()
    {
        add_shortcode('playlist', [ $this, 'playlist_shortcode' ] );
    }

    public function playlist_shortcode( ){

        ob_start();
        /**
         * Enqueue Styles for the Front page
         */
        wp_enqueue_style('PhAc-frontend-style');
        wp_enqueue_script('PhAc-frontend-script');

        $video_count = ph_video_count( );
        $video_title = ph_class_video_title();
        $video_link = ph_class_video_url();
        
        ?>
        <div id="video-playlist">
            <div class="container">
                <!-- Playlist Section -->
                <div class="playlist">
                    <div class="playlist-content">
                        <h2>Video Playlist<sup>4th Batch</sup></h2>
                    </div>
                    <div class="video-items">
                        <?php
                        if( ! empty ( $video_count ) ){
                            for( $i = 0; $i < $video_count; $i++ ){
                                $title = esc_html( $video_title[$i] );
                                $url = esc_url( $video_link[$i] )?>
                                <div class="video-item" onclick="playVideo('<?php echo $url ?>')"><?php echo $title ?></div>
                            <?php }
                        }
                        ?>
                    </div>            
                </div> <!-- End Playlist-->

                <!-- Player Section -->
                <div class="player">
                    <iframe id="videoPlayer" src="" title="<?php echo $title ?>" frameborder="0" allow=" autoplay;"  allowfullscreen></iframe>
                    <!-- </video> -->
                    <div class="video-details">
                        <p>Lorem i</p>
                        <p>Lorem emque?</p>
                    </div>
                </div>
                <!-- End Player Section -->
            </div> <!-- End Container -->
        </div> <!-- End Video Playlist -->
    <?php
    return ob_get_clean();
    }
}