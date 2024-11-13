<?php
namespace Proghive\Academy\Traits;

/**
 * Traits For Form Error
 */

 trait Form_Error{
    /**
     * Hold the Errors
     */

    public $errors = [];

    /**
     * 
     */

    public function has_error( $key ){
        if( isset( $this->errors[$key] ) ? $this->errors[$key] : ''){
            return true;
        }
    }

    /**
     * 
     */

    public function get_error( $key ){
        if( isset( $this->errors[$key] )){
            return $this->errors[$key];
        }
        return false;
    }
 }