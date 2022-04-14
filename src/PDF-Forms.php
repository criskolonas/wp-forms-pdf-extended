<?php 
namespace PDFForms{
    
    //Main PDF Forms class
    final class PDFForms{
        //contains the main instance of the plugin.
        private static $instance;

        //contains an array of all the classes used. 
        private $registry=[];

        // List of legacy public properties.
		private $legacy_properties = [
			'form',
			'entry',
			'entry_fields',
			'entry_meta',
			'frontend',
			'process',
			'smart_tags',
			'license',
		];
        
        //Assign a PDFForms object to the instance variable and initialize stuff.
        public static function instance(){
            if(self::$instance === null ||! self::$instance instanceof self){
                self::$instance = new self();
                self::$instance->constants();
                self::$instance->includes();
                self::$instance->objects();
                self::$instance->additional_tags();
                echo var_dump(self::$instance->forms);
                print_r(json_decode(self::$instance->helper->get_multiple()[1]->post_content,true));
                //echo var_dump(self::$instance->helper->get_meta(16));
                echo 'hello';
            }
            return self::$instance;
        }

        public function additional_tags(){
            $labels = [];
            
            //foreach()
    
            //return $tags;
        }

        //Constants
        private function constants(){
            //TODO
        }
        //Include Files
        private function includes(){
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/helpers.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section-content.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-forms.php';

            //Includes Form Helper methods derived from the plugin itself.
            require_once PARENT_PLUGIN_DIR . 'includes/class-form.php';


        }
        //Setup Objects
        public function objects(){
            $this->helper = new \Helpers();
            $this->forms = new \Forms($this->helper->get_multiple());
            $this->pdf_panel = new \Panel_Settings_Extend();
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