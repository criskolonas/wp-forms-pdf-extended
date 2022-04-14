<?php 

class Panel_Content_Extend{

    public function __construct(){
        add_filter( 'wpforms_form_settings_panel_content', [$this,'pdf_panel_content'], 20 );
    }


    
    public function pdf_panel_content($instance){
        echo var_dump($instance);
        echo var_dump($instance->form_data);
        wpforms_panel_field(
            'text',
            'pdfsettings',
            'pdfparagraph',
            $instance->form_data,
            esc_html__( 'Form Text', 'wpforms-lite' ),
            [
                'default'    => '',
                'tooltip'    => esc_html__( '', 'wpforms-lite' ),
                'smarttags'  => [
                    'type'   => 'all',
                    'fields' => 'name,email,text,user_id',
                ],
                'parent'     => 'settings',
                'subsection' => $id,
                'class'      => 'email-recipient',
            ]
        );
        echo var_dump($instance->form_data['settings']['pdfsettings']['pdfparagraph']);
    }
}

?>


