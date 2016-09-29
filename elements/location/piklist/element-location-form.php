<?php

piklist('field', array(
    'type' => 'select',
    'field' => 'az_element_widget_location',
    'columns' => '12',
    'label' => 'Locations',
    'choices' => piklist(
        get_posts(
            array(
                'post_type' => 'location',
                'hide_empty' => false
            )
        ),
        array(
            'ID',
            'post_title'
        )
    )
));
