<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Batch', 'wepme' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-batches' ); ?>" class="page-title-action"><?php _e( 'Back', 'wepme' ); ?></a>

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
                        <label for="batch_name"><?php _e( 'Batch Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="batch_name" id="batch_name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="total_seats"><?php _e( 'Total Seats', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="email" name="total_seats" id="total_seats" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="end_of_registration_date"><?php _e( 'End Of Registration Date', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="date" name="end_of_registration_date" id="end_of_registration_date" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>

        <?php wp_nonce_field( 'new-batch' ); ?>
        <?php submit_button( __( 'Submit', 'wepme' ), 'primary', 'submit_batch' ); ?>
    </form>
</div>
