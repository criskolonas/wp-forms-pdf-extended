<?php 
namespace PDFForms{

    use PDFConfig;
    use PDFEntry;
    //Main PDF Forms class
    final class PDFForms{
        //contains the main instance of the plugin.
        public static $instance;

        //Include Files
        private function includes(){
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section-content.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/helpers.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'libs/fpdf184/fpdf.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-pdfconfig.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-pdfentry.php';
            

        }

     
        //Assign a PDFForms object to the instance variable and initialize stuff.
        public function instance(){
            if(self::$instance === null ||! self::$instance instanceof self){
                self::$instance = new self();
                self::$instance->includes();
                self::$instance->objects();
                self::$instance->hooks();


                //echo var_dump(felf::$instance->forms);
                //print_r(json_decode(self::$instance->helper->get_multiple()[1]->post_content,true));
                //echo var_dump(self::$instance->helper->get_meta(16));
            }
            return self::$instance;
        }

        public function hooks(){
            add_action( 'wpforms_process_complete',[$this,'wpf_dev_process_complete'], 10, 4 );
        }
        

    
        public function wpf_dev_process_complete($fields, $entry, $form_data, $entry_id) {

            $settings_array= $form_data['settings'];
            echo var_dump($form_data);

        }
            
        //Setup Objects
        public function objects(){
            $this->pdf_panel = new \Panel_Settings_Extend();
            $this->entries = new PDFEntry('_entries'," (
                id INT AUTO_INCREMENT,   
                original_id bigint,              
                form_id INT,                
                date DATETIME,
                user_id INT,
                entry MEDIUMTEXT, 
                seq_num VARCHAR(20),
                raw MEDIUMTEXT,       
                PRIMARY KEY  (id)
                ) COLLATE utf8_general_ci;");
            $this->config = new PDFConfig('_config'," (
                id INT AUTO_INCREMENT,
                original_id BIGINT,
                settings VARCHAR(200) NOT NULL,
                fields VARCHAR(200) NOT NULL,
                PRIMARY KEY  (id)
                ) COLLATE utf8_general_ci;");
        }

    }

}
namespace {

//return the main pdfforms instance
    function pdfforms(){
        return PDFForms\PDFForms::instance();
    }
}



?>