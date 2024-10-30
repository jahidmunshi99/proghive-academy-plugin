<?php 

/**
 * This Function will insert all new students informtion to Database
 */
function insert_students_information( $args = [] ){
    global $wpdb;
    $defaults = [
        'id'            => '',
        'name'          => '',
        'phone'         => '',
        'email'         => '',
        'batch'         => '',
        'fathers_name'  => '',
        'mothers_name'  => '',
        'village'       => '',
        'post'          => '',
        'upozila'       => '',
        'district'      => '',
        'created_by'    => get_current_user(),
        'created_at'    => get_the_time( 'mysql' ),
        'user_name'     => '',
        'user_password' => '',
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
        '%s',
        '%s',

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
function insert_ph_video_informaton( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_videos';
    $defaults = [
        'id'            => '',
        'course_name'   => '',
        'batch_number'  => '',
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
function insert_ph_batch_informaton( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';

    $defaults = [
        'id'                       => '',
        'course_name'              => '',
        'batch_number'             => '',
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
 * Get All Students Information form MySql Database
 */
function ph_sutdetns_information_result( $args = [] ){
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
    $sql = $wpdb->prepare("SELECT * FROM $table_name", array());

    $items = $wpdb->get_results( $sql );

    return $items;
}


/**
 * Get All Videos List Information From SQL
 */
function ph_videos_information_result( $args = [] ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_videos';
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
 * Get All Batch Information From SQL
 */
function ph_batch_information_result( $args = [] ){
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
 * Get All Batch info
 */
function ph_batch_info( ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';
    $sql = $wpdb->prepare("SELECT batch_number FROM $table" );
    $item = $wpdb->get_col( $sql );
    return $item;
}

/**
 * Count All Batch
 */
function ph_batch_count( ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';
    $sql = $wpdb->prepare("SELECT COUNT(ID) FROM $table" );
    $item = $wpdb->get_var( $sql );
    return $item;
}


/**
 * Get All Batch info
 */
function ph_course_info( ){
    global $wpdb;
    $table = $wpdb->prefix.'ph_batches';
    $sql = $wpdb->prepare("SELECT course_name FROM $table" );
    $item = $wpdb->get_col( $sql );
    return $item;
}