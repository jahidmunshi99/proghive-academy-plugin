<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Student', 'wepme' ); ?></h1>
    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students' ); ?>" class="page-title-action"><?php _e( 'Back', 'wepme' ); ?></a>

    <hr>
    <br>
    <?php
    /**
     * Fetch Data form Batch Table
     */
        $batch_info = get_batch_results();
        $batchs = [];
        $courses = [];
        if( ! empty( $batch_info )){
            foreach( $batch_info as $items ){
                $batchs[] = $items->batch_name;
                $courses[] = $items->course_name;
            }
        }
    ?>


    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <!-- Select Course Name -->
                <tr>
                    <th scope="row">
                        <label for="course_name"><?php _e( 'Course Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <select name="course_name" id="course_name">
                            <option value=""> - Select One -</option>
                            <?php
                                // Array to track duplicates
                                $duplicate = [];

                                // Check if the course array is not empty
                                if( !empty($courses)) {
                                    for($i = 0; $i < count($courses); $i++) {
                                        // Only add to the dropdown if the course name is not in the duplicate array
                                        if(!in_array($courses[$i], $duplicate)) {
                                            $duplicate[] = $courses[$i]; // Add the course to the duplicate array
                                            ?>
                                            <option value="<?php echo $courses[$i]; ?>"><?php echo $courses[$i]; ?></option>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <!-- End Select Students Batch -->
                <!-- Select Students Batch -->
                <tr>
                    <th scope="row">
                        <label for="batch"><?php _e( 'Batch Number', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <select name="batch" id="batch">
                            <option value=""> - Select One -</option>
                            <?php
                                if( ! empty( $batchs ) ){
                                    foreach( $batchs as $batch ){?>
                                        <option value="<?php echo $batch ?>"><?php echo $batch ?></option>
                                <?php }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <!-- End Select Students Batch -->
                <!-- Write Applicant Name -->
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Applicant Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Write Applicant Name -->
                <!-- Write Applicant Phone Number -->
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone Number', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="number" name="phone" id="phone" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Write Applicant Phone Number -->
                <!-- Write Applicant Email Address -->
                <tr>
                    <th scope="row">
                        <label for="email"><?php _e( 'Email', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Write Applicant Email Address -->
                <!-- Write Applicant NID Number -->
                <tr>
                    <th scope="row">
                        <label for="nid_number"><?php _e( 'NID Number', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="nid_number" id="nid_number" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Write Applicant NID Number -->
                <!-- Insert Your Facebook Profile Link -->
                <tr>
                    <th scope="row">
                        <label for="facebook_link"><?php _e( 'Facebook Link', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="facebook_link" id="facebook_link" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Insert Your Facebook Profile Link -->
                <!-- Write Applicant Email Address -->
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'wepme' ); ?></label>                        
                    </th>
                    <td>
                        <textarea name="address" id="address" cols="30" rows="6" class="regular-text" placeholder="Please write your village/city, Uplozila and District."></textarea>
                    </td>
                </tr>
                <!-- End Write Applicant Email Address -->
                <!-- Set User name to login user Dashboard -->
                <tr>
                    <th scope="row">
                        <label for="user_name"><?php _e( 'User Name', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="user_name" id="user_name" class="regular-text" value="">
                    </td>
                </tr>
                <!-- End Set User name to login user Dashboard -->
                <!-- Set User Password to login user Dashboard -->
                <tr>
                    <th scope="row">
                        <label for="user_password"><?php _e( 'Password', 'wepme' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="user_password" id="user_password" class="regular-text" value="">
                    </td>
                </tr>
                <!-- Set User Password to login user Dashboard -->
            </tbody>
        </table>

        <?php wp_nonce_field( 'new-student' ); ?>
        <?php submit_button( __( 'Submit', 'wepme' ), 'primary', 'submit_student' ); ?>
    </form>
</div>
