<?php
// Check if ACF is active before adding fields
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_brand_info',
        'title' => 'Brand Information',
        'fields' => array(
            array(
                'key' => 'field_company_ceo',
                'label' => 'Company CEO',
                'name' => 'company_ceo',
                'type' => 'text',
                'instructions' => 'Enter the CEO of the company.',
                'required' => 0,
                'placeholder' => 'Write the CEO name', // Adds a placeholder
                'maxlength' => 50, // Limits the input to 50 characters
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'brands', // This is the correct post type identifier
                ),
            ),
        ),
    ));
}
