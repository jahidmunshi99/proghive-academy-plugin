<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Video', 'wepme' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-videos' ); ?>" class="page-title-action"><?php _e( 'Back', 'wepme' ); ?></a>

    <hr>
    <br>


    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name_of_course"><?php _e( 'Name of Course', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name_of_course" id="name_of_course" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="batch_name"><?php _e( 'Number of Batch', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="batch_name" id="batch_name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Vidoe Title', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="video_url"><?php _e( 'Video URL', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="video_url" id="video_url" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                <th scope="row">
                        <label for="details"><?php _e( 'Vidoe Details', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <textarea name="details" id="details" cols="30" rows="10" class="regular-text"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php wp_nonce_field( 'new-address' ); ?>
        <?php submit_button( __( 'Publish', 'wepme' ), 'primary', 'submit_address' ); ?>
    </form>
</div>