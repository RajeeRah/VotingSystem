<?php

/**
 * ValidationException class.
 * 
 */
class ValidationException extends Exception {
    
    private $errors = NULL;
    
    /**
     * C'tor.
     * 
     * @param type $errors
     */
    public function __construct($errors) {
        parent::__construct("Validation error!");
        $this->errors = $errors;
    }
    
    /**
     * Provides incorrect message.
     * 
     * @return type Error
     */
    public function getErrors() {
        return $this->errors;
    }
    
}

?>
