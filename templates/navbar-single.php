        <!-- header del single -->
        <header class="single-navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        Food Truck Quito
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse foodtruckNavbar" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-cutlery"></i> <?php _e('Especialidades','foodtruckquito'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                                    'hide_empty'          => true,
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
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-store"></i> <?php _e('Establecimientos','foodtruckquito'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                                    'hide_empty'          => true,
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
                                <!--<li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
<li role="separator" class="divider"></li>
<li><a href="#">Separated link</a></li>
<li role="separator" class="divider"></li>
<li><a href="#">One more separated link</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-gps-dot"></i> <?php _e('Locaciones','foodtruckquito'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                                    'hide_empty'          => true,
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
                        </li>
                        <li class="dropdown siguelarutaitemmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-run"></i> <?php _e('Sigue la Ruta','foodtruckquito'); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                    $args = array(
                                        'post_type' => 'ruta',
                                        'posts_per_page' => 10,
                                    );
                                    $rutas = new WP_query($args);
                                    if ( $rutas->have_posts() ){
                                        while( $rutas->have_posts() )
                                        { 
                                            $rutas->the_post();
                                ?>
                                <li><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php 
                                        }
                                    }
                                ?>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo home_url('rutas/'); ?>"><?php _e('Todas nuestras rutas','foodtruckquito'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#promos" class="btn btn-warning cta-promos" style="color: white"><i class="zmdi zmdi-fire"></i> Mira estas promociones</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-languajes">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-translate"></i> <span class="caret"></span></a>
                            <?php dynamic_sidebar( 'translation' ); ?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs">
                        <!--li><?php //date_default_timezone_set('America/Bogota'); echo date( 'D H', current_time( 'timestamp', 1 ) ); ?></li-->
                        <li><a href="https://www.instagram.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-facebook-box"></i></a></li>
                    </ul>
                    <div class="responsive-social-icons visible-xs">
                        <ul class="list-inline text-center">
                            <li><a href="https://www.instagram.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-instagram zmdi-hc-2x"></i></a></li>
                            <li><a href="https://www.facebook.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-facebook-box zmdi-hc-2x"></i></a></li>
                        </ul>
                        <p class="responsive-copyright">Copyright &copy; 2017 Food Truck Quito &amp; Choclomedia.com</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- fin header del single -->