<?php
    ////////////////////////////////////////
    // METABOXES
    ////////////////////////////////////////
    add_filter( 'rwmb_meta_boxes', 'sentry_register_meta_boxes' );
    /*-- METABOXES --*/
    function sentry_register_meta_boxes( $meta_box ) {
        
        $prefix = 'foodtruckquito';
        
        $meta_box[] = array(
            'id' => 'foodtruck_info',
            'title' => 'Ficha del Foodtruck',
            'pages' => array('foodtruck'),
            'context' => 'normal',
            'priority' => 'default',
            'fields' => array(
                array(
                        'name' => 'Subir Logo',
                        'id' => $prefix .'logo',
                        'type' => 'file_input',
                ),
                array(
                    'name' => 'Slogan',
                    'id' => $prefix .'slogan',
                    'type' => 'text'
                ),
                array(
                    'type' => 'divider'
                ),
                array(
                    'name' => 'Dirección',
                    'id' => $prefix .'adress',
                    'type' => 'textarea'                   
                ),
                array(
                    'name' => 'Número telefónico',
                    'id' => $prefix .'phone',
                    'type' => 'text'
                ),
                array(
                    'name' => 'Correo Electrónico',
                    'id' => $prefix .'email',
                    'type' => 'text'
                ),
                array(                
                    'type' => 'divider'
                ),
                array(
                    'name' => 'Sitio web',
                    'id' => $prefix .'website',
                    'type' => 'url',
                ),
                array(
                    'name' => 'Facebook',
                    'id' => $prefix .'facebook',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Twitter',
                    'id' => $prefix .'twitter',
                    'type' => 'text',
                ),array(
                    'name' => 'Instagram',
                    'id' => $prefix .'instagram',
                    'type' => 'text',
                ),
                array(
                    'type' => 'divider'
                ),
                array(
                    'name' => 'Google Map URL',
                    'id' => $prefix .'location_gmurl',
                    'type' => 'textarea',
                ),
                array(
                    'name' => 'Google Map Coords',
                    'id' => $prefix .'location_coords',
                    'type' => 'text',
                    'desc' => '<strong>Tip!:</strong> -0.1570195,-78.4666531'
                ),
        ));
        $meta_box[] = array(
            'id' => 'foodtruck-payments',
            'title' => 'Métodos de Pago',
            'pages' => array('foodtruck'),
            'context' => 'normal',
            'priority' => 'default',
            'fields' => array(
                array(
                    'name' => 'Efectivo',
                    'id' => $prefix .'efectivo',
                    'type' => 'checkbox',
                    'std' => 1
                ),
                array(
                    'name' => 'Cheque',
                    'id' => $prefix .'cheque',
                    'type' => 'checkbox',
                    'std' => 0
                ),
                array(
                    'name' => 'Transferencia',
                    'id' => $prefix .'transferencia',
                    'type' => 'checkbox',
                    'std' => 0
                ),
                array(
                    'name' => 'Debito',
                    'id' => $prefix .'debito',
                    'type' => 'checkbox',
                    'std' => 0
                ),
                array(
                    'name' => 'Credito',
                    'id' => $prefix .'credito',
                    'type' => 'checkbox',
                    'std' => 0
                ),
                array(
                    'name' => 'Paypal',
                    'id' => $prefix .'paypal',
                    'type' => 'checkbox',
                    'std' => 0
                )
        ));
        $meta_box[] = array(
            'id' => 'foodtruck-services',
            'title' => 'Servicios del Foodtruck',
            'pages' => array('foodtruck'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'name' => 'Para llevar',
                    'id' => $prefix .'llevar',
                    'type' => 'checkbox',
                    'std' => 1
                ),
                array(
                    'name' => 'Delivery',
                    'id' => $prefix .'delivery',
                    'type' => 'checkbox',
                    'std' => 0
                ),
                array(
                    'name' => 'Precio para 2',
                    'id' => $prefix .'costs',
                    'type' => 'number',
                    'min' => 0
                ),
                array(
                    'name' => 'Horario de apertura y cierre',
                    'id' => $prefix .'horas',
                    'type' => 'text',
                )
        ));
        $meta_box[] = array(
            'id' => 'foodtruck-calification',
            'title' => 'Calificación del Foodtruck',
            'pages' => array('foodtruck'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'name' => '<strong>Atención</strong>',
                    'id' => $prefix .'atencion',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5
                ),
                array(
                    'name' => 'Tiempo',
                    'id' => $prefix .'tiempo',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5
                ),
                array(
                    'name' => 'Sabor',
                    'id' => $prefix .'sabor',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5
                ),
                array(
                    'name' => 'Ambiente',
                    'id' => $prefix .'ambiente',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5
                )
        ));
        $meta_box[] = array(
            'id' => 'foodtruck-gallery',
            'title' => 'Galería del Fotos del Foodtruck',
            'pages' => array('foodtruck'),
            'context' => 'normal',
            'priority' => 'default',
            'fields' => array(
                array(
                    'name' => 'Añade fotos e imágenes',
                    'id' => $prefix .'gallery',
                    'type' => 'image_advanced'
                )
        ));
        $meta_box[] = array(
            'id' => 'foodtruck-plan',
            'title' => 'Planes del Listin',
            'pages' => array('foodtruck'),
            'context' => 'side',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Plan',
                    'id' => $prefix .'plan',
                    'type' => 'select',
                    'options' => array(
                        1 => 'Free',
                        2 => 'Starter',
                        3 => 'Premium'
                    ),
                    'placeholder' => 'Seleccione un plan...'
                )
        ));
        $meta_box[] = array(
            'id' => 'tiempos_anuncios',
            'title' => 'Vigencia del anuncio',
            'pages' => array('publicidad'),
            'context' => 'side',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Fecha Inicio',
                    'id' => $prefix .'a_start',
                    'type' => 'date'
                ),
                array(
                    'name' => 'Fecha Finalización',
                    'id' => $prefix .'a_ends',
                    'type' => 'date'
                )
        ));
        $meta_box[] = array(
            'id' => 'anuncios',
            'title' => 'Meta datos del anuncio',
            'pages' => array('publicidad'),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(
                array(
                    'name' => 'Link del Anuncio',
                    'id' => $prefix .'a_link',
                    'type' => 'text'
                ),
                /*array(
                    'name' => 'Codigo del Anuncio',
                    'id' => $prefix .'a_code',
                    'type' => 'textarea'
                )*/
        ));
        $meta_box[] = array(
            'id' => 'anuncios_modal',
            'title' => 'Meta datos del Modal',
            'pages' => array('publicidad'),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(
                array(
                    'name' => 'Nombre del Modal',
                    'id' => $prefix .'a_moda_name',
                    'type' => 'text'
                ),
                array(
                    'name' => 'Contenido del Modal',
                    'id' => $prefix .'a_modal_content',
                    'type' => 'wysiwyg'
                )
        ));
        return $meta_box;
    }
    /*----- FIN DE LOS METABOXES -----*/

    function trademark() {
        echo "<!-- Dev by Jose Manuel Rodriguez Padrino with the Choclomedia.com Team | email: jmrpadrino@gmail.com -->";
    }
    add_action( 'wp_head', 'trademark', 5 );
?>