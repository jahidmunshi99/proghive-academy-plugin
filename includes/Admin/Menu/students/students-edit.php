<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Edit Student', 'wepme' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students' ); ?>" class="page-title-action"><?php _e( 'Back', 'wepme' ); ?></a>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New Student', 'wepme' ); ?></a>

    <hr>
    <br>

    <?php if( isset( $_GET['student-updated']) ){ ?>
        <div class="notice notice-success">
            <p><?php _e( 'Students Updated Sucessfully', 'proghive' ) ?></p>
        </div>
    <?php } ?>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr( $student->name ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr( $student->phone ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="email"><?php _e( 'Email', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" class="regular-text" value="<?php echo esc_attr( $student->email ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="batch"><?php _e( 'Batch', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="batch" id="batch" class="regular-text" value="<?php echo esc_attr( $student->batch ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="course_name"><?php _e( 'Course Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="course_name" id="course_name" class="regular-text" value="<?php echo esc_attr( $student->course_name ) ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="nid_number"><?php _e( 'NID Number', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nid_number" id="nid_number" class="regular-text" value="<?php echo esc_attr( $student->nid_number ) ?>">
                    </td>
                </tr>
                <!-- Insert Your Facebook Profile Link -->
                <tr>
                    <th scope="row">
                        <label for="facebook_link"><?php _e( 'Facebook Link', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="facebook_link" id="facebook_link" class="regular-text" value="<?php echo esc_attr( $student->facebook_link ) ?>">
                    </td>
                </tr>
                <!-- End Insert Your Facebook Profile Link -->
                <!-- Write Applicant Address -->
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'wepme' ); ?></label>                        
                    </th>
                    <td>
                        <textarea name="address" id="address" cols="30" rows="6" class="regular-text" placeholder="Please write your village/city, Uplozila and District."><?php echo esc_attr( $student->address ) ?></textarea>
                    </td>
                </tr>
                <!-- End Write Applicant Address -->
                <!-- Set User name to login user Dashboard -->
                <tr>
                    <th scope="row">
                        <label for="user_name"><?php _e( 'User Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="user_name" id="user_name" class="regular-text" value="<?php echo esc_attr( $student->user_name ) ?>">
                    </td>
                </tr>
                <!-- End Set User name to login user Dashboard -->
                <!-- Set User Password to login user Dashboard -->
                <tr>
                    <th scope="row">
                        <label for="user_password"><?php _e( 'Password', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="user_password" id="user_password" class="regular-text" value="<?php echo esc_attr( $student->user_password ) ?>">
                    </td>
                </tr>
                <!-- Set User Password to login user Dashboard -->
            </tbody>
        </table>

        <input type="hidden" name="id" value="<?php echo esc_attr( $student->id ) ?>">
        <?php wp_nonce_field( 'new-student' ); ?>
        <?php submit_button( __( 'Update', 'wepme' ), 'primary', 'submit_student' ); ?>
    </form>
</div>
