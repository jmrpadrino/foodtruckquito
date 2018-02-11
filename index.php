<?php 
    get_header(); 
    get_template_part('templates/navbar-single');
    get_template_part('templates/hero-home');
    $prefix = 'foodtruckquito'; 
?>
        <main class="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <?php get_template_part('templates/sidebar-filters'); ?>
                    </div>
                    <div class="col-sm-9 main-content-wrapper">
                        <?php get_template_part('templates/top-banner-ad'); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <h1><?php _e('¿Donde están los Food Trucks en Quito?','foodtruckquito'); ?></h1>
                                <p>En FoodtruckQuito.com.ec by CHOCLOMedia, puedes ubicar los <strong>"food trucks"</strong> que son Camiones o Containers de Comida de Concepto dentro de la Ciudad de Quito.</p>
                                <p>Descubre aquí las mejores <a href="><?php echo home_url('/rutas/'); ?>">RUTAS</a> en propuestas gastronómicas de la tendencia Food Truck.</p>
                            </div>
                        </div>
                        <?php 
                            //LOS FOODTRUCKS DE PLAN PREMIUM
                            $args = array(
                                'post_type' => 'foodtruck',
                                'posts_per_page' => 6,
                                'orderby' => 'rand',
                                'meta_query' => array(
                                    array(
                                        'key'     => $prefix . 'plan',
                                        'value'   => '3',
                                        'compare' => '='
                                    ),
                                ),
                            );
                            $query = new WP_Query( $args );
                            //echo count($query);
                            //var_dump($query);
                            if ( $query->have_posts() ){ $i = 0;
                        ?>
                        <div class="row">
                        <?php 
                                while( $query->have_posts() ){ $query->the_post();
                                    if ( has_post_thumbnail() ){
                                        $featured_image = get_the_post_thumbnail_url( $id, 'medium');
                                    }else{
                                        $featured_image = get_template_directory_uri() . '/images/single-no-hero.jpg';
                                    }
                        ?>
                            <div class="col-sm-4">
                                <div class="premium-card">
                                    <article>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="card-header" style="background-image: url(<?php echo $featured_image; ?>);">   
                                                <div class="card-profile-link">
                                                    <i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card-title">
                                            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                                        </div>
                                        <div class="card-content">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="card-footer">
                                            <h4 class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <?php _e('Dirección','foodtruckquito'); ?></h4>
                                            <p><?php echo get_post_meta(get_the_ID(), $prefix.'adress', true); ?></p>
                                            <h4 class="clasif-group"><i class="zmdi zmdi-phone"></i> <?php _e('Teléfono','foodtruckquito'); ?></h4>
                                            <p><a href="tel:<?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?>"><?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?></a></p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        <?php 
                                    $i++;
                                    if($i % 3 == 0){
                        ?>
                                        <div class="clearfix"></div>
                        <?php if ($i == 3){ /*?>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-4">  
                                                <img src="https://yt3.ggpht.com/-JQKALJS3FZU/AAAAAAAAAAI/AAAAAAAAAAA/xyAp-CyyH74/s100-c-k-no-mo-rj-c0xffffff/photo.jpg" style="display:block;margin:0 auto;">
                                                <h2>PayPhone</h2>
                                                <p>TU MEJOR EXPERIENCIA EN PAGOS MÓVILES.</p>
                                                <p>Todas tus transacciones solamente con tu número de celular. Sin trámites, sin vouchers y sin perder el tiempo.</p>
                                                <a href="#" class="btn btn-success pull-right">Sepa más</a>
                                            </div>
                                            <div class="col-sm-8">
                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/slAp9MTjYVM" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="clearfix"></div>
                        <?php */} ?>
                        <?php
                                    }
                                } //End While foodtrucks premium
                        ?>
                        </div>
                        <?php 
                            } //End if foodtrucks premium
                        ?>
                        <?php get_template_part('templates/middle-body-ad'); ?>
                        <?php get_template_part('templates/home-plazas-slider'); ?>
                        <section>
                            <div class="row">
                                <div class="col-sm-12">
                                        <div class="well text-center">
                                        <h2 class="moreSection"><?php _e('Son muchos los Food Trucks en Quito donde puedes comer y disfrutar!','foodtruckquito'); ?></h2>
                                        <p><span class=""></span> <?php _e('#SigueLaRuta','foodtruckquito'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <!-- Food truck free list -->
                            <?php 
                            //LOS FOODTRUCKS DE PLAN PREMIUM
                                $args = array(
                                    'post_type' => 'foodtruck',
                                    'posts_per_page' => 10,
                                    'orderby' => 'rand',
                                    'meta_query' => array(
                                        'relation' => 'OR',
                                        array(
                                            'key'     => $prefix . 'plan',
                                            'value'   => '1',
                                            'compare' => '='
                                        ),
                                        array(
                                            'key'     => $prefix . 'plan',
                                            'value'   => '2',
                                            'compare' => '='
                                        ),
                                    ),
                                );
                                $query = new WP_Query( $args );
                                //echo count($query);
                                //var_dump($query);
                                if ( $query->have_posts() ){ $i = 0;
                                    while ($query->have_posts())
                                    { $query->the_post();
                                    
                                        //verificar que plan tiene para mostrar la maqueta
                                        $plan = get_post_meta(get_the_ID(), $prefix.'plan', true);
                                        if ($plan == 1){
                            ?>
                                <div class="col-sm-6">
                                    <article>
                                        <div class="plan-a">
                                            <?php 
                                                if ( has_post_thumbnail() ){
                                                    $featured_image = get_the_post_thumbnail_url( $id, 'thumbnail');
                                                }else{
                                                    $featured_image = get_template_directory_uri() . '/images/single-no-hero.jpg';
                                                }
                                            ?>
                                            <div class="card-header" style="background-image: url(<?php echo $featured_image; ?>);"></div>
                                            <div class="card-content">
                                                <h1 class="card-title"><?php the_title(); ?></h1>
                                                <p><span class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <?php _e('Dirección','foodtruckquito'); ?></span>: <?php echo get_post_meta(get_the_ID(), $prefix.'adress', true); ?></p>
                                                <p><span class="clasif-group"><i class="zmdi zmdi-phone"></i> <?php _e('Teléfono','foodtruckquito'); ?></span>: <?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?></p>
                                            </div>                                   
                                        </div>
                                    </article>
                                </div>
                            <?php 
                                        } else if($plan == 2){
                                            if ( has_post_thumbnail() ){
                                                $featured_image = get_the_post_thumbnail_url( $id, 'thumbnail');
                                            }else{
                                                $featured_image = get_template_directory_uri() . '/images/single-no-hero.jpg';
                                            }
                            ?>
                                <div class="col-sm-6">
                                    <article>
                                        <div class="plan-a">
                                            <div class="card-header" style="background-image: url(<?php echo $featured_image; ?>);">   
                                                <div class="card-profile-link">
                                                    <a href="<?php the_permalink(); ?>"><i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i></a>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <a href="<?php the_permalink(); ?>"><h1 class="card-title"><?php the_title(); ?></h1></a>
                                                <p><span class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <?php _e('Dirección','foodtruckquito'); ?></span>: <?php echo get_post_meta(get_the_ID(), $prefix.'adress', true); ?></p>
                                                <p><span class="clasif-group"><i class="zmdi zmdi-phone"></i> <?php _e('Teléfono','foodtruckquito'); ?></span>: <?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?></p>
                                            </div>                                   
                                        </div>
                                    </article>
                                </div>
                            <?php 
                                        }
                                        $i++;
                                        if ($i % 2 == 0 ){
                                            echo '<div class="clearfix"></div>';
                                        }  
                                    }
                                }
                            ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="show-archive" href="<?php echo home_url('foodtrucks'); ?>"><?php _e('Quiero ver mucho mas!','foodtruckquito'); ?></a>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-xs-12">
                                <?php get_template_part('templates/bottom-body-ad'); ?>
                            </div>
                        </div>
                        <section>
                            <div class="row rutas">
                                <div class="col-xs-12">
                                    <h2>Sigue la ruta con Food Truck Quito</h2>
                                    <p>Un dia cualquiera con la intención de tener excusas para alimentar nuestros #tbt, el equipo de <a href="https://choclomedia.com" target="_blank">CHOCLOmedia</a> y Food Truck Quito se lanza a la calle en busca de sabores, olores y vistas en la ciudad de Quito.</p>
                                    <p>Se recogen impresiones de la gente de a pie, quienes dan el dato importante de donde esta el sabor quiteño. Eso se transforma en una ruta que servirá de guía para todo aquel que desee estar en la aventura eterna de degustar, reir y compartir.</p>
                                    <p>Le invitamos a leernos... </p>
                                </div>
                            </div>
                            <div class="row">
                                <?php 
                                    $args = array(
                                        'post_type' => 'ruta',
                                        'posts_per_page' => 3,
                                        'orderby' => 'rand',
                                    );
                                    $query = new WP_Query( $args );
                                    if ($query->have_posts()){
                                        while($query->have_posts()){
                                            $query->the_post();
                                ?>
                                <div class="col-sm-4">
                                    <div class="premium-card rutas-home">
                                        <article>
                                            <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()){ ?>
                                            <div class="card-header" style="background-image: url(<?php echo the_post_thumbnail_url( 'medium' ); ?>); ">
                                            <?php }else{ ?>
                                            <div class="card-header">
                                            <?php } ?>
                                                <div class="card-profile-link">
                                                    <i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i>
                                                </div>
                                            </div>
                                            </a>
                                            <div class="card-title">
                                                <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                                            </div>
                                            <div class="card-content">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="foodParkHomeLink" href="<?php the_permalink(); ?>"><?php _e('Así pasó','foodtruckquito'); ?></a>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="show-archive" href="<?php echo home_url('rutas'); ?>"><?php _e('Quiero conocer todas las rutas!','foodtruckquito'); ?></a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div id="promos" class="row">
                                <div class="col-sm-12">
                                    <h2 class="moreSection"><?php _e('Promociones de Comida Rápida en la ciudad de Quito','foodtruckquito'); ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div id="promo-slider" class="col-sm-12 owl-carousel owl-theme">
                                    <?php get_template_part('templates/promociones-ad'); ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>     
<?php get_footer(); ?>
