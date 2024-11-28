<?php

add_filter( 'gform_field_content', 'add_svg_label_before_file_upload', 10, 5 );
function add_svg_label_before_file_upload( $field_content, $field, $value, $lead_id, $form_id ) {
    // Target file upload field
    if ( $field->type == 'fileupload' ) { 
        // Generate the ID of the input for the "for" attribute
        $input_id = esc_attr( "input_{$form_id}_{$field->id}" );
        
        // Wrap the SVG in a label
        $svg = '<label for="' . $input_id . '" class="custom-label">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="custom-svg">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.775 16.838h8.45m-8.45-3.569h8.45M7.775 9.7h8.45M19.5 20.949V5.931L15.725 2.5H5.106a.58.58 0 0 0-.606.551v17.9a.58.58 0 0 0 .606.551h13.788a.58.58 0 0 0 .606-.553z"/>
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.144 2.5v3.96H19.5"/>
                    </svg>
                </label>';
        
        // Add the SVG label before the field
        $field_content = $svg . $field_content;
    }
    return $field_content;
}