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
        $all_batch = [];

        // Filter the videos by the user's batch name
        foreach( $video_items as $item ) {
            // Ensure `batch_name` exists and matches the user's batch
            if ( !empty( $item->batch_name ) && $item->batch_name === $user_batch ) {
                $all_batch[] = $item;
            }
        }      
    ?>
        <div id="video-playlist">
            <div class="container">
                <!-- Playlist Section -->
                <div class="playlist">
                    <div class="playlist-content">
                        <div class="playlist-title">Video Playlist</div>
                        <p class="batch-number"><?php echo esc_attr__('4th Batch', 'proghive') ?></p>
                    </div>
                    <div class="video-items">
                        <?php
                        if( ! empty( $video_items ) ){
                            // Output the filtered results
                            foreach ( $video_items as $video) {
                                // Assuming you want to display a specific property of each video, e.g., `title`
                                $title = $video->video_title;
                                $url = $video->video_url;
                            ?>
                                <div class="video-item" onclick="playVideo('<?php echo $url ?>', event)"><?php echo $title ?></div>
                            <?php
                            }
                        }else{?>
                            <div class="video-item" onclick="playVideo('<?php echo esc_html__('No Video Published!', 'proghive' ) ?>')"><?php echo esc_html__('No Video Published!', 'proghive') ?></div>
                        <?php
                        } //else close
                        ?>
                    </div>            
                </div> <!-- End Playlist-->

                <!-- Player Section -->
                <div class="player">
                    <iframe id="videoPlayer" src="" title="<?php echo $title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope" allowfullscreen></iframe>
                    <!-- </video> -->
                    <div class="video-details">
                    </div>
                </div>
                <!-- End Player Section -->
            </div> <!-- End Container -->
        </div> <!-- End Video Playlist -->

    <?php
