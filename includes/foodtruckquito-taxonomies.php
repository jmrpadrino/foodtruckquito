<?php

// Register Custom Taxonomy Tipo de Negocio
function tipo_negocio_tax() {

    $labels = array(
        'name'                       => _x( 'Establecimientos', 'Taxonomy General Name', 'foodtruckquito' ),
        'singular_name'              => _x( 'Establecimiento', 'Taxonomy Singular Name', 'foodtruckquito' ),
        'menu_name'                  => __( 'Establecimientos', 'foodtruckquito' ),
        'all_items'                  => __( 'Todos los tipos', 'foodtruckquito' ),
        'parent_item'                => __( 'Tipo padre', 'foodtruckquito' ),
        'parent_item_colon'          => __( 'Tipo padre:', 'foodtruckquito' ),
        'new_item_name'              => __( 'Nuevo Tipo de Establecimiento', 'foodtruckquito' ),
        'add_new_item'               => __( 'Agregar nuevo Tipo de Establecimiento', 'foodtruckquito' ),
        'edit_item'                  => __( 'Editar Tipo de Establecimiento', 'foodtruckquito' ),
        'update_item'                => __( 'Actualizar Tipo de Establecimiento', 'foodtruckquito' ),
        'view_item'                  => __( 'Ver Tipo de Establecimiento', 'foodtruckquito' ),
        'separate_items_with_commas' => __( 'Separe los Tipos de Establecimiento con comas', 'foodtruckquito' ),
        'add_or_remove_items'        => __( 'Agregar o Quitar Tipos de Establecimiento', 'foodtruckquito' ),
        'choose_from_most_used'      => __( 'Seleccionar de los as usados', 'foodtruckquito' ),
        'popular_items'              => __( 'Tipos de Establecimiento populares', 'foodtruckquito' ),
        'search_items'               => __( 'Buscar Tipos de Establecimiento', 'foodtruckquito' ),
        'not_found'                  => __( 'No se encuentra', 'foodtruckquito' ),
        'no_terms'                   => __( 'No hay Tipos de Establecimiento', 'foodtruckquito' ),
        'items_list'                 => __( 'Listado de Tipos de Establecimiento', 'foodtruckquito' ),
        'items_list_navigation'      => __( 'Lista de navegación de Tipos de Establecimiento', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                       => 'establecimiento',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'tipo-de-negocio', array( 'foodtruck' ), $args );

}
add_action( 'init', 'tipo_negocio_tax', 0 );

// Register Custom Taxonomy Patio
function tipo_comida_tax() {

        $labels = array(
        'name'                       => _x( 'Espeialidades', 'Taxonomy General Name', 'foodtruckquito' ),
        'singular_name'              => _x( 'Espcialidad', 'Taxonomy Singular Name', 'foodtruckquito' ),
        'menu_name'                  => __( 'Especialidades', 'foodtruckquito' ),
        'all_items'                  => __( 'Todos las Espcialidades', 'foodtruckquito' ),
        'parent_item'                => __( 'Espcialidad padre', 'foodtruckquito' ),
        'parent_item_colon'          => __( 'Espcialidad padre:', 'foodtruckquito' ),
        'new_item_name'              => __( 'Nueva Espcialidad', 'foodtruckquito' ),
        'add_new_item'               => __( 'Agregar nueva Espcialidad', 'foodtruckquito' ),
        'edit_item'                  => __( 'Editar Espcialidad', 'foodtruckquito' ),
        'update_item'                => __( 'Actualizar Espcialidad', 'foodtruckquito' ),
        'view_item'                  => __( 'Ver Espcialidad', 'foodtruckquito' ),
        'separate_items_with_commas' => __( 'Separe las Espcialidades con comas', 'foodtruckquito' ),
        'add_or_remove_items'        => __( 'Agregar o Quitar Espcialidad', 'foodtruckquito' ),
        'choose_from_most_used'      => __( 'Seleccionar de los mas usados', 'foodtruckquito' ),
        'popular_items'              => __( 'Espcialidades populares', 'foodtruckquito' ),
        'search_items'               => __( 'Buscar Espcialidad', 'foodtruckquito' ),
        'not_found'                  => __( 'No se encuentra', 'foodtruckquito' ),
        'no_terms'                   => __( 'No hay Espcialidad', 'foodtruckquito' ),
        'items_list'                 => __( 'Listado de Espcialidades', 'foodtruckquito' ),
        'items_list_navigation'      => __( 'Lista de navegación de Espcialidades', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                       => 'especialidad',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'tipo-de_comida', array( 'foodtruck' ), $args );

}
add_action( 'init', 'tipo_comida_tax', 0 );

// Register Custom Taxonomy Patio
function patio_tax() {

    $labels = array(
        'name'                       => _x( 'Locación', 'Taxonomy General Name', 'foodtruckquito' ),
        'singular_name'              => _x( 'Locaciones', 'Taxonomy Singular Name', 'foodtruckquito' ),
        'menu_name'                  => __( 'Locaciones', 'foodtruckquito' ),
        'all_items'                  => __( 'Todos las Locaciones', 'foodtruckquito' ),
        'parent_item'                => __( 'Locación padre', 'foodtruckquito' ),
        'parent_item_colon'          => __( 'Locación padre:', 'foodtruckquito' ),
        'new_item_name'              => __( 'Nueva Locación', 'foodtruckquito' ),
        'add_new_item'               => __( 'Agregar nueva Locación', 'foodtruckquito' ),
        'edit_item'                  => __( 'Editar Locación', 'foodtruckquito' ),
        'update_item'                => __( 'Actualizar Locación', 'foodtruckquito' ),
        'view_item'                  => __( 'Ver Locación', 'foodtruckquito' ),
        'separate_items_with_commas' => __( 'Separe las Locaciones con comas', 'foodtruckquito' ),
        'add_or_remove_items'        => __( 'Agregar o Quitar Locación', 'foodtruckquito' ),
        'choose_from_most_used'      => __( 'Seleccionar de los mas usados', 'foodtruckquito' ),
        'popular_items'              => __( 'Locaciones populares', 'foodtruckquito' ),
        'search_items'               => __( 'Buscar Locación', 'foodtruckquito' ),
        'not_found'                  => __( 'No se encuentra', 'foodtruckquito' ),
        'no_terms'                   => __( 'No hay Locación', 'foodtruckquito' ),
        'items_list'                 => __( 'Listado de Locaciones', 'foodtruckquito' ),
        'items_list_navigation'      => __( 'Lista de navegación de Locaciones', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                       => 'locacion',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'patios', array( 'foodtruck' ), $args );

}
add_action( 'init', 'patio_tax', 0 );

// Register Custom Taxonomy Tipo de Negocio
function foodtruck_horario() {

    $labels = array(
        'name'                       => _x( 'Días de apertura', 'Taxonomy General Name', 'foodtruckquito' ),
        'singular_name'              => _x( 'Dia de apertura', 'Taxonomy Singular Name', 'foodtruckquito' ),
        'menu_name'                  => __( 'Días de apertura', 'foodtruckquito' ),
        'all_items'                  => __( 'Todos los Días de apertura', 'foodtruckquito' ),
        'parent_item'                => __( 'Dia de apertura padre', 'foodtruckquito' ),
        'parent_item_colon'          => __( 'Dia de apertura padre:', 'foodtruckquito' ),
        'new_item_name'              => __( 'Nuevo Dia de apertura', 'foodtruckquito' ),
        'add_new_item'               => __( 'Agregar nuevo Dia de apertura', 'foodtruckquito' ),
        'edit_item'                  => __( 'Editar Dia de apertura', 'foodtruckquito' ),
        'update_item'                => __( 'Actualizar Dia de apertura', 'foodtruckquito' ),
        'view_item'                  => __( 'Ver Dia de apertura', 'foodtruckquito' ),
        'separate_items_with_commas' => __( 'Separe los Días de apertura con comas', 'foodtruckquito' ),
        'add_or_remove_items'        => __( 'Agregar o Quitar Dia de apertura', 'foodtruckquito' ),
        'choose_from_most_used'      => __( 'Seleccionar de los mas usados', 'foodtruckquito' ),
        'popular_items'              => __( 'Días de apertura populares', 'foodtruckquito' ),
        'search_items'               => __( 'Buscar Dia de apertura', 'foodtruckquito' ),
        'not_found'                  => __( 'No se encuentra', 'foodtruckquito' ),
        'no_terms'                   => __( 'No hay Días de apertura', 'foodtruckquito' ),
        'items_list'                 => __( 'Listado de Días de apertura', 'foodtruckquito' ),
        'items_list_navigation'      => __( 'Lista de navegación de Días de apertura', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                       => 'establecimientos-abiertos-los',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'horario', array( 'foodtruck' ), $args );

}
add_action( 'init', 'foodtruck_horario', 0 );
//Taxonomia Jerarquica para Directorio
function tax_anuncios() {
    $labels = array(
        'name'                       => _x( 'Espacios', 'Taxonomy General Name', 'eev' ),
        'singular_name'              => _x( 'Espacio', 'Taxonomy Singular Name', 'eev' ),
        'menu_name'                  => __( 'Espacios', 'eev' ),
        'all_items'                  => __( 'Todos los Espacios', 'eev' ),
        'parent_item'                => __( 'Categoria Padre', 'eev' ),
        'parent_item_colon'          => __( 'Categoria Padre:', 'eev' ),
        'new_item_name'              => __( 'Nuevo nombre de Espacio', 'eev' ),
        'add_new_item'               => __( 'Agregar otro Espacio', 'eev' ),
        'edit_item'                  => __( 'Editar Espacio', 'eev' ),
        'update_item'                => __( 'Actualizar Espacio', 'eev' ),
        'view_item'                  => __( 'Ver Espacio', 'eev' ),
        'separate_items_with_commas' => __( 'Separe con comas', 'eev' ),
        'add_or_remove_items'        => __( 'Agregar o Quitar Espacios', 'eev' ),
        'choose_from_most_used'      => __( 'Escoja de las mas usados', 'eev' ),
        'popular_items'              => __( 'Espacios Populares', 'eev' ),
        'search_items'               => __( 'Buscar Espacios', 'eev' ),
        'not_found'                  => __( 'No encontrada', 'eev' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'anunciante', array( 'publicidad' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'tax_anuncios', 0 );
?>