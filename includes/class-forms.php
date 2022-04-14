<?php 

class Forms {
    public function __construct($forms)
    {
        $this->stored_forms = self::populate_form_array($forms);
        
    }

    

    public function populate_form_array($forms)
    {

    }
}
class Form {
    public function __construct($id,$fields,$smart_tags)
    {
        $this->id = $id;
        $this->fields=$fields;
        $this->smart_tags=$smart_tags;
    }
}
?>