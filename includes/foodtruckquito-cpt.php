<?php

// Custom post type para Food Trucks Quito
// Register Custom Post Type
function foodtrucks() {

    $labels = array(
        'name'                  => _x( 'Foodtrucks', 'Post Type General Name', 'foodtruckquito' ),
        'singular_name'         => _x( 'Foodtruck', 'Post Type Singular Name', 'foodtruckquito' ),
        'menu_name'             => __( 'Foodtrucks', 'foodtruckquito' ),
        'name_admin_bar'        => __( 'Foodtruck', 'foodtruckquito' ),
        'archives'              => __( 'Foodtruck Archivos', 'foodtruckquito' ),
        'attributes'            => __( 'Foodtruck Atributos', 'foodtruckquito' ),
        'parent_item_colon'     => __( 'Foodtruck padre:', 'foodtruckquito' ),
        'all_items'             => __( 'Todos los Foodtrucks', 'foodtruckquito' ),
        'add_new_item'          => __( 'Agregar nuevo Foodtruck', 'foodtruckquito' ),
        'add_new'               => __( 'Agregar nuevo', 'foodtruckquito' ),
        'new_item'              => __( 'Nuevo Foodtruck', 'foodtruckquito' ),
        'edit_item'             => __( 'Editar Foodtruck', 'foodtruckquito' ),
        'update_item'           => __( 'Actualizar Foodtruck', 'foodtruckquito' ),
        'view_item'             => __( 'Ver Foodtruck', 'foodtruckquito' ),
        'view_items'            => __( 'Ver Foodtrucks', 'foodtruckquito' ),
        'search_items'          => __( 'Buscar Foodtruck', 'foodtruckquito' ),
        'not_found'             => __( 'No se encuentra el Foodtruck', 'foodtruckquito' ),
        'not_found_in_trash'    => __( 'No se encuentra el Foodtruck en la papelera', 'foodtruckquito' ),
        'featured_image'        => __( 'Imagen Destacada', 'foodtruckquito' ),
        'set_featured_image'    => __( 'Colocar imagen destacada', 'foodtruckquito' ),
        'remove_featured_image' => __( 'Quitar imagen destacada', 'foodtruckquito' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'foodtruckquito' ),
        'insert_into_item'      => __( 'Insertar en el Foodtruck', 'foodtruckquito' ),
        'uploaded_to_this_item' => __( 'Cargar en este Foodtruck', 'foodtruckquito' ),
        'items_list'            => __( 'Foodtrucks Lista', 'foodtruckquito' ),
        'items_list_navigation' => __( 'Foodtrucks listado de navegación', 'foodtruckquito' ),
        'filter_items_list'     => __( 'Lista de Filtros Foodtrucks', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                  => 'foodtruck',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Foodtruck', 'foodtruckquito' ),
        'description'           => __( 'Food Trucks', 'foodtruckquito' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'post-formats' ),
        'taxonomies'            => array( 'post_tag', 'tipo-de-negocio', 'tipo-de_comida', 'patios' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-carrot',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'foodtrucks',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
        'show_in_rest'       => true,
  		'rest_base'          => 'foodtrucks-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
    );
    register_post_type( 'foodtruck', $args );

}
add_action( 'init', 'foodtrucks', 0 );

// Custom post type para Food Trucks Quito
// Register Custom Post Type
function rutas() {

    $labels = array(
        'name'                  => _x( 'Rutas', 'Post Type General Name', 'foodtruckquito' ),
        'singular_name'         => _x( 'Ruta', 'Post Type Singular Name', 'foodtruckquito' ),
        'menu_name'             => __( 'Rutas', 'foodtruckquito' ),
        'name_admin_bar'        => __( 'Ruta', 'foodtruckquito' ),
        'archives'              => __( 'Ruta Archivos', 'foodtruckquito' ),
        'attributes'            => __( 'Ruta Atributos', 'foodtruckquito' ),
        'parent_item_colon'     => __( 'Ruta padre:', 'foodtruckquito' ),
        'all_items'             => __( 'Todos los Rutas', 'foodtruckquito' ),
        'add_new_item'          => __( 'Agregar nuevo Ruta', 'foodtruckquito' ),
        'add_new'               => __( 'Agregar nuevo', 'foodtruckquito' ),
        'new_item'              => __( 'Nuevo Ruta', 'foodtruckquito' ),
        'edit_item'             => __( 'Editar Ruta', 'foodtruckquito' ),
        'update_item'           => __( 'Actualizar Ruta', 'foodtruckquito' ),
        'view_item'             => __( 'Ver Ruta', 'foodtruckquito' ),
        'view_items'            => __( 'Ver Rutas', 'foodtruckquito' ),
        'search_items'          => __( 'Buscar Ruta', 'foodtruckquito' ),
        'not_found'             => __( 'No se encuentra el Ruta', 'foodtruckquito' ),
        'not_found_in_trash'    => __( 'No se encuentra el Ruta en la papelera', 'foodtruckquito' ),
        'featured_image'        => __( 'Imagen Destacada', 'foodtruckquito' ),
        'set_featured_image'    => __( 'Colocar imagen destacada', 'foodtruckquito' ),
        'remove_featured_image' => __( 'Quitar imagen destacada', 'foodtruckquito' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'foodtruckquito' ),
        'insert_into_item'      => __( 'Insertar en el Ruta', 'foodtruckquito' ),
        'uploaded_to_this_item' => __( 'Cargar en este Ruta', 'foodtruckquito' ),
        'items_list'            => __( 'Rutas Lista', 'foodtruckquito' ),
        'items_list_navigation' => __( 'Rutas listado de navegación', 'foodtruckquito' ),
        'filter_items_list'     => __( 'Lista de Filtros Rutas', 'foodtruckquito' ),
    );
    $rewrite = array(
        'slug'                  => 'sigue-la-ruta',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Ruta', 'foodtruckquito' ),
        'description'           => __( 'Reseñas de un grupo de food trucks donde venden una comida en específico.', 'foodtruckquito' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'post-formats' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'rutas',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
'show_in_rest'       => true,
  		'rest_base'          => 'rutas-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
    );
    register_post_type( 'ruta', $args );

}
add_action( 'init', 'rutas', 0 );



function cpt_anuncios() {
    $labels = array(
        'name'                => _x( 'Anunciantes', 'Post Type General Name', 'eev' ),
        'singular_name'       => _x( 'Anunciante', 'Post Type Singular Name', 'eev' ),
        'menu_name'           => __( 'Anunciantes', 'eev' ),
        'name_admin_bar'      => __( 'Anuncio', 'eev' ),
        'parent_item_colon'   => __( 'Item Padre:', 'eev' ),
        'all_items'           => __( 'Todos los Anuncios', 'eev' ),
        'add_new_item'        => __( 'Agregar nuevo Anuncio', 'eev' ),
        'add_new'             => __( 'Agregar Nuevo', 'eev' ),
        'new_item'            => __( 'Nuevo Anuncio', 'eev' ),
        'edit_item'           => __( 'Editar Anuncio', 'eev' ),
        'update_item'         => __( 'Actualizar Anuncio', 'eev' ),
        'view_item'           => __( 'Ver Anuncio', 'eev' ),
        'search_items'        => __( 'Buscar Anuncio', 'eev' ),
        'not_found'           => __( 'No encontrado', 'eev' ),
        'not_found_in_trash'  => __( 'No encontrado en Papelera', 'eev' ),
    );
    $args = array(
        'label'               => __( 'Anuncio', 'eev' ),
        'description'         => __( 'Anunciantes Food Truck Quito', 'eev' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'anunciante' ),
        'hierarchical'        => false,
        'capabilities' => array(
            'publish_posts' => 'administrator',
            'edit_posts' => 'administrator',
            'edit_others_posts' => 'administrator',
            'delete_posts' => 'administrator',
            'delete_others_posts' => 'administrator',
            'read_private_posts' => 'administrator',
            'edit_post' => 'administrator',
            'delete_post' => 'administrator',
            'read_post' => 'administrator',
        ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-megaphone',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
    );
    register_post_type( 'publicidad', $args );
}

add_action( 'init', 'cpt_anuncios', 0 );
?>