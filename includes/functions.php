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
        return new \WP_Error('Faield to Insert', __('Faield To Insert Data', 'wepme'));
    }
    return $wpdb->insert_id;
}

/**
 * Get All Students Information form MySql Database
 */
function ph_sutdetns_information_result(){
    global $wpdb;
    $table_name = $wpdb->prefix.'ph_students';
    /**
     * Query to fatch Data
     */
    $sql = $wpdb->prepare( "SELECT * FROM $table_name", array() );
    $results = $wpdb->get_results( $sql );

    return $results;
}