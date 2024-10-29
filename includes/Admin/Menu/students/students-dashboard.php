<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Students', 'wepme' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New Student', 'wepme' ); ?></a>

    <br><br>
    <?php if( isset( $_GET['inserted'])){?>
        <div class="notice notice-success">
            <p><?php _e( 'New Sutdents Added Sucessfully', 'proghive') ?></p>
        </div>
    <?php
    }
        $sutdetns_info = ph_sutdetns_information_result();
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
                    <label for=""><?php echo esc_html__('Name', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Phone', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Email', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Batch', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('User Name', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Password', 'proghive') ?></label>
                </th>
                <th class="manage-column column-title column-primary sortable desc" scope="col">
                    <label for=""><?php echo esc_html__('Action', 'proghive') ?></label>
                </th>
            </tr>
        </thead>
         <!-- End Header -->
        <!-- Column Start -->
        <?php 
             if( ! empty( $sutdetns_info )){                
                foreach( $sutdetns_info as $data ){;
                // echo $student_count = $data->id;
                ?>
                <tr>
                    <!-- Sl Column Start -->        
                    <td class="title column-title has-row-actions column-primary page-title"><input type="checkbox"></td>
                    <!-- End Sl Column --> 
                    <!-- Name Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->name ) ?></td>      
                    <!-- End Name Column -->    
                    <!-- Phone Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->phone ) ?></td>      
                    <!-- End Phone Column -->    
                    <!-- Email Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->email ) ?></td>      
                    <!-- End Email Column -->   
                    <!-- Batch Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->batch ) ?></td>      
                    <!-- End Batch Column --> 
                    <!-- User name Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->user_name ) ?></td>      
                    <!-- End User name Column --> 
                    <!-- Password Column Start -->  
                    <td class="title column-title has-row-actions column-primary page-title"><?php echo esc_html( $data->user_password ) ?></td>      
                    <!-- End Password Column --> 
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