<?php 

class Helpers extends WPForms_Form_Handler{
    public function __construct()
    {
    }

    public function get_multiple($args = [])
    {
        return WPForms_Form_Handler::get_multiple($args = []);
    }
    public function get_meta($form_id, $field = '', $args = [])
    {
        return WPForms_Form_Handler::get_meta($form_id, $field = '', $args = []);
    }
}

?>