<?php 
namespace PDFForms{

    use Helpers;

    //Main PDF Forms class
    final class PDFForms{
        //contains the main instance of the plugin.
        private static $instance;

     
        //Assign a PDFForms object to the instance variable and initialize stuff.
        public function instance(){
            if(self::$instance === null ||! self::$instance instanceof self){
                self::$instance = new self();
                self::$instance->includes();
                self::$instance->objects();
                self::$instance->hooks();


                //echo var_dump(self::$instance->forms);
                //print_r(json_decode(self::$instance->helper->get_multiple()[1]->post_content,true));
                //echo var_dump(self::$instance->helper->get_meta(16));
            }
            return self::$instance;
        }

        public function hooks(){
            add_action( 'wpforms_process_complete', [$this,'wpf_dev_process_complete'], 10, 4 );                

        }
        
        function wpf_dev_process_complete( $fields, $entry, $form_data, $entry_id ) {
            $tags = array('paragraph_text'=>'FUCK YOU');
            $settings_array= $form_data['settings']['settings'];
            foreach ($settings_array as $key=>$data){
                $processed_array[$key] = Helpers::process_text($tags,$data);
            }
            echo var_dump($processed_array);

        }

        //Include Files
        private function includes(){
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/class-pdf-section-content.php';
            require_once PDF_FORMS_PLUGIN_DIR . 'includes/helpers.php';
        }
        //Setup Objects
        public function objects(){
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