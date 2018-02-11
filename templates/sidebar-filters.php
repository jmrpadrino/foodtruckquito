<?php
    $prefix = 'foodtruckquito'; 
?>
                    <img class="heyfoodieimg" src="<?php echo get_template_directory_uri(); ?>/images/eating-foodie.png" alt="Food Truck Quito - Logo">
                    <h3 class="text-center heyfoodie">Hey foodie!</h3>
                    <?php
                        //Traer lo anuncios de sidebar-top
                        $args = array (
                            'post_type' => 'publicidad',
                            'posts_per_page' => 1,
                            'orderby' => 'rand',
                            'tax_query' => array(  
                                array(  
                                    'taxonomy' => 'anunciante',  
                                    'field' => 'slug',  
                                    'terms' => 'top-sidebar-ad-plus'  
                                )  
                            ) 
                        );
                        $anuncios = query_posts($args);
                        if (count($anuncios) > 0){
                        foreach($anuncios as $anuncio){
                            $link = get_post_meta($anuncio->ID, $prefix . 'a_link', true);
                        }
                        $imagen_destacada = get_the_post_thumbnail( $anuncio->ID ,'', array( 'class' => 'img-responsive') );
                    ?>
                    <div class="advertise-filter top">
                    <?php 
                            if (empty($link)){
                                echo $imagen_destacada;
                            }else{
                                echo '<a href="'.$link.'" target="_blank">';
                                echo $imagen_destacada;
                                echo '</a>';       
                            }
                    ?>
                    </div>
                    <?php } //Cierre anuncio lateral top ?>
                    <div class="filter-section-title hidden-xs">
                        <i class="zmdi zmdi-timer filter-section-icon"></i> 
                        <h3 class="text-center"><?php _e('Busca rápidamente lo que quieres','foodtruckquito'); ?></h3>
                    </div>
                    <div class="well wellSidebar hidden-xs">
                        <h4><i class="zmdi zmdi-cutlery"></i> <?php _e('Por Especialidad','foodtruckquito'); ?></h4>
                        <ul class="items-in-collapse">
                            <?php 
                            $args = array(
                                'child_of'            => 0,
                                'current_category'    => 0,
                                'depth'               => 3,
                                'echo'                => 1,
                                'exclude'             => '',
                                'exclude_tree'        => '',
                                'feed'                => '',
                                'feed_image'          => '',
                                'feed_type'           => '',
                                'hide_empty'          => 0,
                                'hide_title_if_empty' => false,
                                'hierarchical'        => true,
                                'order'               => 'ASC',
                                'orderby'             => 'name',
                                'separator'           => '<br />',
                                'show_count'          => 0,
                                'show_option_all'     => '',
                                'show_option_none'    => __( 'Sin categorias' ),
                                'style'               => 'list',
                                'taxonomy'            => 'tipo-de_comida',
                                'title_li'            => '',
                                'use_desc_for_title'  => 1,
                            );
                            wp_list_categories( $args );
                            ?>
                        </ul>
                    </div>
                    <hr />
                    <div class="clearix"></div>
                    <div class="well wellSidebar hidden-xs">
                        <h4><i class="zmdi zmdi-store"></i> <?php _e('Por Establecimiento','foodtruckquito'); ?></h4>
                        <ul class="items-in-collapse">
                            <?php 
                            $args = array(
                                'child_of'            => 0,
                                'current_category'    => 0,
                                'depth'               => 3,
                                'echo'                => 1,
                                'exclude'             => '',
                                'exclude_tree'        => '',
                                'feed'                => '',
                                'feed_image'          => '',
                                'feed_type'           => '',
                                'hide_empty'          => 0,
                                'hide_title_if_empty' => false,
                                'hierarchical'        => true,
                                'order'               => 'ASC',
                                'orderby'             => 'name',
                                'separator'           => '<br />',
                                'show_count'          => 0,
                                'show_option_all'     => '',
                                'show_option_none'    => __( 'Sin categorias' ),
                                'style'               => 'list',
                                'taxonomy'            => 'tipo-de-negocio',
                                'title_li'            => '',
                                'use_desc_for_title'  => 1,
                            );
                            wp_list_categories( $args );
                            ?>
                        </ul>
                    </div>
                    <hr />
                    <div class="clearix"></div>
                    <div class="well wellSidebar hidden-xs">
                        <h4><i class="zmdi zmdi-gps-dot"></i> <?php _e('Por Locación','foodtruckquito'); ?></h4>
                        <ul class="items-in-collapse">
                            <?php 
                            $args = array(
                                'child_of'            => 0,
                                'current_category'    => 0,
                                'depth'               => 3,
                                'echo'                => 1,
                                'exclude'             => '',
                                'exclude_tree'        => '',
                                'feed'                => '',
                                'feed_image'          => '',
                                'feed_type'           => '',
                                'hide_empty'          => 0,
                                'hide_title_if_empty' => false,
                                'hierarchical'        => true,
                                'order'               => 'ASC',
                                'orderby'             => 'name',
                                'separator'           => '<br />',
                                'show_count'          => 0,
                                'show_option_all'     => '',
                                'show_option_none'    => __( 'Sin categorias' ),
                                'style'               => 'list',
                                'taxonomy'            => 'patios',
                                'title_li'            => '',
                                'use_desc_for_title'  => 1,
                            );
                            wp_list_categories( $args );
                            ?>
                        </ul>
                    </div>
                    <?php 
                        abiertosHoy();
                    ?>
                    <?php
                        //Traer lo anuncios de sidebar-top
                        $args = array (
                            'post_type' => 'publicidad',
                            'posts_per_page' => 1,
                            'orderby' => 'rand',
                            'tax_query' => array(  
                                array(  
                                    'taxonomy' => 'anunciante',  
                                    'field' => 'slug',  
                                    'terms' => 'bottom-sidebar-ad-plus'  
                                )  
                            ) 
                        );
                        $anuncios = query_posts($args);
                        if (count($anuncios) > 0){
                        foreach($anuncios as $anuncio){
                            $link = get_post_meta($anuncio->ID, $prefix . 'a_link', true);
                        }
                        $imagen_destacada = get_the_post_thumbnail( $anuncio->ID ,'', array( 'class' => 'img-responsive') );
                    ?>
                    <div class="advertise-filter bottoom">
                    <?php 
                            if (empty($link)){
                                echo $imagen_destacada;
                            }else{
                                echo '<a href="'.$link.'" target="_blank">';
                                echo $imagen_destacada;
                                echo '</a>';       
                            }
                    ?>
                    </div>
                    <?php } //Cierre anuncio lateral top ?>
                    <?php wp_reset_query(); ?>