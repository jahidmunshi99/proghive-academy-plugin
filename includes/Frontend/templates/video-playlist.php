<?php
/**
 * This is Video Playlist
 */

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
        $user_batch = isset($_SESSION['user_batch']) ? $_SESSION['user_batch'] : '';

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
                        if( ! empty( $user_batch ) ){
                            foreach( $video_items as $item ){
                                $url = $item->video_url;                         
                                $title = $item->video_title;                         
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