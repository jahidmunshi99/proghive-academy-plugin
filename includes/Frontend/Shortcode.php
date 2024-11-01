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
        /**
         * Fatch Data
         * @var mixed
         */
        $items = ph_get_video_id_batch_info( );
        // $batch_name = 'PHAOB-1';
        // foreach( $items as $item ){
        //     $batch_name = $item->batch_name;
        //     $total_id = $item->ID;
        //     $total_batch = $item->batch_name;
        //     $total_course = $item->course_name; 
        //     $batch_count = $batch_name;
        // }
        // echo "<p>this is from batch count</p>" . $batch_count;
   

        // Define the brand you want to display cars for
        global $wpdb;
        $batch_name = 'PHAOB-1'; // Change this to the brand you want to display

        // Query to select all cars of the specified brand
        $cars = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}ph_videos WHERE batch_name = %s",
                $batch_name
            )
        );

        // Display the results
        if ( ! empty( $cars ) ) {
            echo "<h2>Cars for brand: $batch_name</h2>";
            echo "<ul>";
            foreach ( $cars as $car ) {
                echo "<li>ID: {$car->id}, Course Name: {$car->course_name}, Video: {$car->video_url}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No cars found for this brand.</p>";
        }




















        ob_start();
        /**
         * Enqueue Styles for the Front page
         */
        wp_enqueue_style('PhAc-frontend-style');
        wp_enqueue_script('PhAc-frontend-script');

        $video_count = ph_video_count( );
        $video_title = ph_class_video_title();
        $video_link = ph_class_video_url();
        // $video_detalis = ph_class_video_details();
        
        ?>
        <div id="video-playlist">
            <div class="container">
                <!-- Playlist Section -->
                <div class="playlist">
                    <div class="playlist-content">
                        <h3 class="playlist-title">Video Playlist</h3>
                        <p class="batch-number">4th Batch</p>
                    </div>
                    <div class="video-items">
                        <?php
                        if( ! empty ( $video_count ) ){
                            for( $i = 0; $i < $video_count; $i++ ){
                                $title = esc_html( $video_title[$i] );
                                $url = esc_url( $video_link[$i] );
                                ?>
                                
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
                    </div>
                </div>
                <!-- End Player Section -->
            </div> <!-- End Container -->
        </div> <!-- End Video Playlist -->
    <?php
    return ob_get_clean();
    }
}