<?php 

class Panel_Content_Extend{

    public function __construct(){
        add_filter( 'wpforms_form_settings_panel_content', [$this,'pdf_panel_content'], 20 );
        add_filter( 'wpforms_smart_tags',[$this,'add_form_specific_tags'],10,1);
        add_filter( 'wpforms_save_form_args', [ $this, 'save_form_args' ], 11, 3 );

    }

    public function add_form_specific_tags(){

    }

    public function save_form_args( $form, $data, $args){
        $pdfsettings =json_encode($data['settings']['pdfsettings'][1],true);
        $formsettings =json_encode($data['fields'],true);
        $form['pdfsettings'] = $pdfsettings;
        $form['fields'] = $formsettings;
        return $form;
    }

    
    public function pdf_panel_content($instance){
        $id = 1;

        echo '<div class="wpforms-panel-content-section wpforms-panel-content-section-pdfsettings">';
        echo '<div class="wpforms-panel-content-section-title">' . __( 'PDF Settings', 'be_wpforms_pdfsettings' ) . '</div>';
        //echo var_dump($instance);
        //echo var_dump($instance->form_data);
        
        wpforms_panel_field(
            'textarea',
            'pdfsettings',
            'pdf_formtext',
            $instance->form_data,
            esc_html__( 'Form Text', 'wpforms-lite' ),
            [
                'default'    => '{aem}',
                'tooltip'    => esc_html__( '', 'wpforms-lite' ),
                'parent'     => 'settings',
				'subsection' => $id,
                'smarttags'  =>['type' => 'all'],
            ]
        );
        wpforms_panel_field(
            'text',
            'pdfsettings',
            'pdf_imageurl',
            $instance->form_data,
            esc_html__( 'Image URL', 'wpforms-lite' ),
            [
                'placeholder'   => 'Enter Image URL',
                'default'    => '{aem}',
                'parent'     => 'settings',
				'subsection' => $id,
                'tooltip'    => esc_html__( '', 'wpforms-lite' ),
                'smarttags'  =>['type' => 'all']
            ]
        );
        wpforms_panel_field(
            'textarea',
            'pdfsettings',
            'message',
            $instance->form_data,
            esc_html__( 'Confirmation Message', 'wpforms-lite' ),
            [
                'default'     => esc_html__( 'Thanks for contacting us! We will be in touch with you shortly.', 'wpforms-lite' ),
                'tinymce'     => [
                    'editor_height' => '200',
                ],
                'input_id'    => 'wpforms-panel-field-confirmations-message-' . $field_id,
                'input_class' => 'wpforms-panel-field-confirmations-message',
                'parent'      => 'settings',
                'subsection'  => $id,
                'class'       => 'wpforms-panel-field-tinymce',
                'smarttags'   => [
                    'type' => 'all',
                ],
            ]
        );
        //echo var_dump($instance->form_data['settings']['pdfsettings']['pdfparagraph']);
        echo '</div>';

    }
}

?>


