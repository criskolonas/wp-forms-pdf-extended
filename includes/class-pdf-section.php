<?php  
    class Panel_Settings_Extend{
        
        public function __construct()
        {
            $this->init();
        }
     
        public function init()
        {
            add_filter('wpforms_builder_settings_sections',[$this,'add_pdf_setting'],10,3);
            $this->panel_content = new Panel_Content_Extend();
        }
        
        //WATCH THIS
        public function add_pdf_setting($form_data,$form_id){
    
            $sections=[
			'general'       => esc_html__( 'General', 'wpforms-lite' ),
			'notifications' => esc_html__( 'Notifications', 'wpforms-lite' ),
			'confirmation'  => esc_html__( 'Confirmations', 'wpforms-lite' ),
            'pdfsettings'   => esc_html__( 'PDF Settings', 'wpforms-lite' )
        ];
            //var_dump($form_id);
            return $sections;
        }   
    }
   