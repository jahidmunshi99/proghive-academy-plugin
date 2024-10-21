<?php 

/**
 * This Function will insert all new students informtion to Database
 */
function insert_students_information( $args= [] ){
    global $wpdb;
    $defaults = [
        `id`          => '',
        `name`        => '',
        `phone`       => '',
        `email`       => '',
        `batch`       => '',
        `fathersName` => '',
        `mothersName` => '',
        `village`     => '',
        `post`        => '',
        `upozila`     => '',
        `district`    => '',
        `created_by`  => get_current_user_id(),
        `created_at`  => get_the_time( 'mysqul' ),
    ];
    $data = wp_parse_args( $args, $defaults );
    $format = [
        '%d',
        '%s',
        '%d',
        '%s',
        '%d',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d',

    ];
    $insert_item= $wpdb->insert( 
                  $wpdb->prefix . 'students', 
                  $data, 
                  $format,
                );
    if( ! $insert_item ){
        return new \WP_Error('Faield to Insert', __('Faield To Insert Data', 'wepme'));
    }
    return $wpdb->insert_id;
}