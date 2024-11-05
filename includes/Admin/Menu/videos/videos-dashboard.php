<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Videos', 'wepme' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-videos&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New Video', 'wepme' ); ?></a>
    <hr>
    <br>
    <?php if( isset( $_GET['inserted'])){?>
        <div class="notice notice-success">
            <p><?php _e( 'New Sutdents Added Sucessfully', 'proghive') ?></p>
        </div>
    <?php
    }
    /**
     * Fetch Videos Data From MYSQL
     */
        $videos = get_videos_result();
    ?>
    <form action="" method="post">
        <table class="form-table">
         <!-- Start Header -->
        <thead>
            <tr>
                <th class="manage-column column-cb check-column" scope="col">
                    <input type="checkbox" />    
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Batch', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Video Title', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Course Name', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Author', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Action', 'proghive') ?></label>
                </th>
            </tr>
        </thead>
         <!-- End Header -->
        <!-- Column Start -->
        <?php 
             if( ! empty( $videos )){                
                foreach( $videos as $data ){;
                // echo $student_count = $data->id;
                ?>
                <tr>
                    <!-- Sl Column Start -->        
                    <td class="title column-title has-row-actions column-primary page-title"><input type="checkbox"></td>
                    <!-- End Sl Column --> 
                    <!-- Name Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->batch_name ) ?></td>      
                    <!-- End Name Column -->    
                    <!-- Phone Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->video_title ) ?></td>      
                    <!-- End Phone Column -->    
                    <!-- Email Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->course_name ) ?></td>      
                    <!-- End Email Column -->   
                    <!-- Batch Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->created_by ) ?></td>      
                    <!-- End Batch Column --> 
                    <!-- Action Column Start -->  
                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=view') ?>"><?php echo esc_html__('View', 'proghive') ?></a>
                        <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=edit') ?>"><?php echo esc_html__('Edit', 'proghive') ?></a>
                        <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=delete') ?>"><?php echo esc_html__('Delete', 'proghive') ?></a>
                    </td>      
                    <!-- End Action Column --> 
                </tr>


            <?php }}else{ echo esc_html('No students found in the database.'); };
            ?>
        <!-- End Column -->       
        </table>
    </form>
</div>