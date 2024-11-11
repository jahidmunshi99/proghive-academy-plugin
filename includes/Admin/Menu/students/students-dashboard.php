<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Students', 'wepme' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=proghive-plugin-students&action=new' ); ?>" class="page-title-action"><?php _e( 'Add New Student', 'wepme' ); ?></a>

    <br><br>
    <?php if( isset( $_GET['inserted'])){?>
        <div class="notice notice-success">
            <p><?php _e( 'New Sutdents Added Sucessfully', 'proghive') ?></p>
        </div>
    <?php } ?>
    <form action="" method="post">
    <?php
        $table = new Proghive\Academy\Admin\Menu\Ph_List();
        $table->prepare_items();
        $table->display();
    ?>
    </form>








</div>