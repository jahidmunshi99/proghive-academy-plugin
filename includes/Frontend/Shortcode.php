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

        /**
         * Fatch Data
         * @var mixed
         */
        $video_items = get_videos_result();
        $user_batch = 'PHAOB-1';
        $batches = [];

        // Checking if the batch name matches the specific batch
        if( !empty( $video_items )){
            foreach( $video_items as $item ){
                $batch_name = $item->batch_name;
                if( $user_batch === $batch_name ){
                    $batches[] = $item;
                }
            }
        }
        ?>

        <div id="video-playlist">
            <div class="container">
                <!-- Playlist Section -->
                <div class="playlist">
                    <div class="playlist-content">
                        <h3 class="playlist-title">Video Playlist</h3>
                        <p class="batch-number"><?php echo $user_batch ?></p>
                    </div>
                    <div class="video-items">
                        <?php
                        if( ! empty( $batches ) ){
                            foreach( $batches as $batch ){
                                $url = $batch->video_url;                         
                                $title = $batch->video_title;                         
                                ?>
                                <div class="video-item" onclick="playVideo('<?php echo $url ?>')"><?php echo $title ?></div>
                            <?php } //foreach close
                            }else{?>
                                <div class="video-item" onclick="playVideo('<?php echo esc_html__('No Video Published!', 'proghive' ) ?>')"><?php echo esc_html__('No Video Published!', 'proghive') ?></div>
                            <?php
                            } //else close
                        ?>
                    </div>            
                </div> <!-- End Playlist-->

                <!-- Player Section -->
                <div class="player">
                    <iframe id="videoPlayer" src="" title="<?php echo $title ?>" frameborder="0" allow=" autoplay;"  allowfullscreen></iframe>
                    <!-- </video> -->
                    <div class="video-details">
                    </div>
                </div>
                <!-- End Player Section -->
            </div> <!-- End Container -->
        </div> <!-- End Video Playlist -->
    <?php
    return ob_get_clean();
    }
}