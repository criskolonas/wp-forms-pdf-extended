<?php 

class Helpers extends WPForms_Form_Handler{
    public function __construct()
    {
        //
    }

    //Calls inherited method get_multiple to retriev all forms
    public function get_multiple($args = [])
    {
        return WPForms_Form_Handler::get_multiple($args = []);
    }

    //Calls inherited method get_meta to retrieve form meta.
    public function get_meta($form_id, $field = '', $args = [])
    {
        return WPForms_Form_Handler::get_meta($form_id, $field = '', $args = []);
    }
    //Creates  empty smart tag with the specified field name
    public function add_smarttags($field_names)
    {
        $tags = [];
        foreach($field_names as $name)
        {
            $tags[$name] = '';
        }

        return $tags;
    }
    //Replaces all tags in the specified text with their respective content.
    public function process_smarttags($tags,$content)
    {
        foreach($tags as $tag_name=>$tag_content)
        {
            $content = str_replace( '{'.$tag_name.'}', $tag_content, $content );
        }

        return $content;
    }
}

?>