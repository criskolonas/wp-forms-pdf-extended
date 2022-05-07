<?php 

class Panel_Content_Extend{

    public function __construct(){
        add_filter( 'wpforms_form_settings_panel_content', [$this,'pdf_panel_content'], 20 );
    }


    
    public function pdf_panel_content($instance){
        echo '<div class="wpforms-panel-content-section wpforms-panel-content-section-pdfsettings">';
        echo '<div class="wpforms-panel-content-section-title">' . __( 'PDF Settings', 'be_wpforms_pdfsettings' ) . '</div>';
        //echo var_dump($instance);
        //echo var_dump($instance->form_data);
        
        wpforms_panel_field(
            'textarea',
            'settings',
            'pdf_formtext',
            $instance->form_data,
            esc_html__( 'Form Text', 'wpforms-lite' ),
            [
                'default'    => '',
                'tooltip'    => esc_html__( '', 'wpforms-lite' ),
                'smarttags'  => [
                    'type'   => 'all',
                    'fields' => 'name,email,text,user_id',
                ],
                'parent'     => 'pdfsettings',
                'subsection' => $id,
                'class'      => 'email-recipient',
            ]
        );
        wpforms_panel_field(
            'text',
            'settings',
            'pdf_imageurl',
            $instance->form_data,
            esc_html__( 'Image URL', 'wpforms-lite' ),
            [
                'placeholder'   => 'Enter Image URL',
                'default'    => '',
                'tooltip'    => esc_html__( '', 'wpforms-lite' ),
                'parent'     => 'pdfsettings',
                'subsection' => $id,
                'class'      => 'email-recipient',
            ]
        );
        //echo var_dump($instance->form_data['settings']['pdfsettings']['pdfparagraph']);
        echo '</div>';

    }
}

?>


