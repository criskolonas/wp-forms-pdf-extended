<?php 

final class Helpers {

    //Creates  empty smart tag with the specified field name
    public static function add_smarttags($field_names)
    {
        $tags = [];
        foreach($field_names as $name)
        {
            $tags[$name] = '';
        }

        return $tags;
    }
    //Replaces all tags in the specified text with their respective content.
    public static function process_text($tags,$content)
    {
        foreach($tags as $tag_name=>$tag_content)
        {
            $processed_content = str_replace( '{'.$tag_name.'}', $tag_content, $content );
            echo '{'.$tag_name.'}';
        }

        return $processed_content;
    }

}

?>