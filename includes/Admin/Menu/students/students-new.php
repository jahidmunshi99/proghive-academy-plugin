<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Student', 'wepme' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students' ); ?>" class="page-title-action"><?php _e( 'Back', 'wepme' ); ?></a>

    <hr>
    <br>


    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="phone" id="phone" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="email"><?php _e( 'Email', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="batch"><?php _e( 'Batch', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="batch" id="batch" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="fathers_name"><?php _e( 'Fathers Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="fathers_name" id="fathers_name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="mothers_name"><?php _e( 'Mothers Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="mothers_ame" id="mothers_name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for=""><?php _e( 'Address', 'wepme' ); ?></label>
                    </th>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="village"><?php _e( 'Village', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="village" id="village" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="post"><?php _e( 'Post', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="post" id="post" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="upozila"><?php _e( 'Upozila', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="upozila" id="upozila" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="district"><?php _e( 'District', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="district" id="district" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>

        <?php wp_nonce_field( 'new-student' ); ?>
        <?php submit_button( __( 'Submit', 'wepme' ), 'primary', 'submit_student' ); ?>
    </form>
</div>
