<?php 
 require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-pdftable.php';

class PDFEntry extends PDFTable{
    public function __construct($table_name,$sql)
    {
        parent::__construct($table_name,$sql);
    }
}