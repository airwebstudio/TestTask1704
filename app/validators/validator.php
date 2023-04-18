<?php
namespace TT\Validators;

class Validator {
    private $fields = [
        'ip_address' => ['required', 'regexp' => '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/'],
        'user_agent' => ['required'],
        'view_date' => ['required', 'regexp' => '/^\d{4}\-\d{1,2}\-\d{1,2}$/'],
        'url' => ['required', 'regexp' => '/^http/']
    ];

    public function validate(array $data) : bool
     {
        foreach($this->fields as $field_name => $field) {
            
            if (in_array('required', $field) && (!isset($data[$field_name]) || empty($data[$field_name]))) {
                return false;
            }

            if (isset($field['regexp']) && isset($data[$field_name])) {
                if (!preg_match($field['regexp'], $data[$field_name])) {
                    return false;
                }
            }            
        }

        return true;
    } 
}