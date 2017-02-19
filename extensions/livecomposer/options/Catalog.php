<?php namespace Experiensa\LiveComposer\Options;


class Catalog
{
    public static function type($id = 'type', $default = 'minimalist'){
        return array(
            'label' => __('Type','sage'),
            'id'    => $id,
            'std'   => $default,
            'type'  => 'select',
            'choices' => array(
                array(
                    'label' => __( 'Grid', 'sage' ),
                    'value' => 'grid',
                ),
                array(
                    'label' => __( 'Cards', 'sage' ),
                    'value' => 'cards',
                ),
                array(
                    'label' => __( 'Masonry', 'sage' ),
                    'value' => 'masonry',
                ),
            ),
            'section' => 'styling'
        );
    }
    public static function elements($id = 'elements', $default = 'title price button location duration themes country'){
        return array(
            'label' => __( 'Elements', 'sage' ),
            'id' => $id,
            'std' => $default,
            'type' => 'checkbox',
            'choices' => array(
                array(
                    'label' => __( 'Title', 'sage' ),
                    'value' => 'title',
                ),
                array(
                    'label' => __( 'Price', 'sage' ),
                    'value' => 'price',
                ),
                array(
                    'label' => __( 'Button', 'sage' ),
                    'value' => 'button',
                ),
                array(
                    'label' => __( 'Location', 'sage' ),
                    'value' => 'location',
                ),
                array(
                    'label' => __( 'Duration', 'sage' ),
                    'value' => 'duration',
                ),
                array(
                    'label' => __( 'Themes', 'sage' ),
                    'value' => 'themes',
                ),
                array(
                    'label' => __( 'Country', 'sage' ),
                    'value' => 'country',
                )
            ),
            'section' => 'styling',
        );
    }
}