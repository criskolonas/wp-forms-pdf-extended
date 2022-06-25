<?php

use PDFForms\PDFForms;

    require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-pdftable.php';

    class PDFConfig extends PDFTable{
        public function __construct($table_name,$sql)
    {
        parent::__construct($table_name,$sql);
        
        add_action('wpforms_save_form',array($this,'FormSave'),10,2);
    }

        public function FormSave($form_id,$form){
            global $wpdb;
            $wpdb->insert($this->table,array(
                'original_id'=>$form_id,
                'settings'=>($form['pdfsettings']),
                'fields'=>($form['fields'])
                ));
        }
    
    }