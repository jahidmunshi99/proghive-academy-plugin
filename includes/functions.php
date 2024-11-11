<?php 

/**
 * This Function will insert all new students informtion to Database
 */
function insert_students_information( $args = [] ){
    global $wpdb;
    $defaults = [
        'id'            => '',
        'course_name'   => '',
        'batch'         => '',
        'name'          => '',
        'phone'         => '',
        'email'         => '',
        'nid_number'    => '',
        'facebook_link' => '',
        'address'       => '',
        'user_name'     => '',
        'user_password' => '',
        'created_by'    => get_current_user(),
        'created_at'    => current_datetime('mysql'),
    ];
    $data = wp_parse_args( $args, $defaults );
    $format = [
        '%d',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
    ];
    $insert_item = $wpdb->insert( 
                  $wpdb->prefix.'ph_students', 
                  $data, 
                  $format,
                );
    if( ! $insert_item ){
        return new \WP_Error('Faield to Insert', __('Faield To Insert Student Data', 'wepme'));
    }
    return $wpdb->insert_id;
}

/**
 * This Function will insert all new Video to Database
 */
function insert_video_informaton( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_videos';
    $defaults = [
        'id'            => '',
        'course_name'   => '',
        'batch_name'    => '',
        'video_title'   => '',
        'video_url'     => '',
        'video_details' => '',
        'created_by'    => get_current_user(),
        'created_at'    => current_time('mysql', 1),
    ];
    
    $data = wp_parse_args( $args, $defaults );
    $format = [
        '%d',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
    ];
    $insert_item = $wpdb->insert(
        $table,
        $data,
        $format
    );

    if( ! $insert_item ){
        return new \WP_Error('Field to Insert Batch', __('Faield To Insert Video', 'proghive' ));
    }

    return $wpdb->$insert_item;
}

/**
 * This Function will insert all new students informtion to Database
 */
function insert_batch_informaton( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';

    $defaults = [
        'id'                       => '',
        'course_name'              => '',
        'batch_name'               => '',
        'batch_type'               => '',
        'total_seat'               => '',
        'end_of_registration_date' => get_date_template(  ),
        'created_by'               => get_current_user(),
        'created_at'               => current_time('mysql'),
    ];
    $data = wp_parse_args( $args, $defaults );
    $format = [
        '%d',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',
        '%s',
        '%d',
    ];
    $insert_item = $wpdb->insert(
        $table,
        $data,
        $format
    );

    if( ! $insert_item ){
        return new \WP_Error('Field to Insert Batch', __('Faield To Insert Batch', 'proghive' ));
    }

    return $wpdb->$insert_item;
}


/**
 * ======================================== Fetch Data From MYSQL Database =====================================
 */

/**
 * Get All Students Information From MySQL "ph_students" Table
 */
function get_sutdents_results( $args = [] ){
    global $wpdb;
    $table_name = $wpdb->prefix.'ph_students';
    $defaults = [
        'number'  => 20,
        'offset'  => 0,
        'orderby' => 'id',
        'order'   => 'ASC',
    ];
    $args = wp_parse_args( $args, $defaults );

    /**
     * Query to fatch Data
     */
    // $sql = $wpdb->prepare( "SELECT * FROM $table_name
    //                         ORDER BY{$args['orderby']} {$args['order']}
    //                         LIMIT %d, %d",
    //                         $args['offset'], $args['number']);
    $sql = $wpdb->prepare("SELECT * FROM $table_name
                        ORDER BY %s %s
                        LIMIT %d, %d",
                        $args['orderby'], $args['order'], $args['offset'], $args['number']);

    $items = $wpdb->get_results( $sql );

    return $items;
}

function get_students_count(){
    global $wpdb;
    $table_name = $wpdb->prefix.'ph_students';
    $sql = $wpdb->get_var("SELECT count(id) FROM $table_name");
    return (int)$sql;
}


/**
 * Get All Videos Information From MySQL "ph_videos" Table
 */
function get_videos_result( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_videos';
    $defaults = [
        'number'  => 20,
        'offset'  => 0,
        'orderby' => 'id',
        'order'   => 'ASC',
    ];
    $args = wp_parse_args( $args, $defaults );

    $sql = $wpdb->prepare("SELECT * FROM $table");

    $item = $wpdb->get_results( $sql );

    return $item;
}


/**
 * Get All Batch Information From MySQL "ph_batches" Table
 */
function get_batch_results( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';
    $defaults = [
        'number'  => 20,
        'offset'  => 0,
        'orderby' => 'id',
        'order'   => 'ASC',
    ];
    $args = wp_parse_args( $args, $defaults );

    $sql = $wpdb->prepare("SELECT * FROM $table", array());

    $item = $wpdb->get_results( $sql );

    return $item;
}

/**
 * Get All Videos Information From MySQL "ph_videos" Table
 */
function get_video_results( ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_videos';
    $sql = $wpdb->prepare("SELECT * FROM $table");
    $item = $wpdb->get_results( $sql );
    return $item;
}















