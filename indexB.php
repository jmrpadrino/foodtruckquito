<?php 
    get_header(); 
    get_template_part('templates/navbar-single');
    get_template_part('templates/hero-home');
    $prefix = 'foodtruckquito'; 
?>
        <main class="home">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <img class="img-responsive ad-top-leader-board" src="<?php echo get_template_directory_uri(); ?>/images/AnimacionBelmonte.gif" style="margin: 0 auto;">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <?php get_template_part('templates/sidebar-filters'); ?>
                    </div>
                    <div class="col-sm-9 main-content-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1><?php _e('¿Dónde están los Foodtrucks en Quito?','foodtruckquito'); ?></h1>
                                <?php _e('<p>Los <strong>"food trucks"</strong> son una de las tendencias gastronómicas a posicionarse durante el 2016, año en el que el Ecuador aparentemente verá proliferar la oferta de comida bajo esta modalidad.</p>
                                <p>En Quito, los camiones de comida aparecieron en el 2014 con tres ofertas gastronómicas que se duplicaron para el 2015.</p>','foodtruckquito'); ?>
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
                                        <div class="card-header" style="background-image: url(<?php echo $featured_image; ?>);">   
                                            <div class="card-profile-link">
                                                <a href="<?php the_permalink(); ?>"><i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i></a>
                                            </div>
                                        </div>
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
                                        echo '<div class="clearfix"></div>';
                                    }
                                } //End While foodtrucks premium
                        ?>
                        </div>
                        <?php 
                            } //End if foodtrucks premium
                        ?>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <img class="img-responsive ad-top-leader-board" src="<?php echo get_template_directory_uri(); ?>/images/LaMisquilla.jpg" style="margin: 0 auto;">
                            </div>
                        </div>
                        <section>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="moreSection"><?php _e('¿Conóces estos Food Parks en Quito? - #SigueLaRuta','foodtruckquito'); ?></h2>
                                </div>
                            </div>
                            <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'patios',
                                    'hide_empty' => false,
                                    'orderby' => 'term_id',
                                    'order' => 'rand'
                                ) );
                                shuffle ($terms);
                                //var_dump( $terms );
                            ?>
                            <div class="row">
                                <div id="park-slider" class="col-sm-12 owl-carousel owl-theme">
                                    <?php foreach ($terms as $term){ ?>
                                    <div class="slide">
                                        <article>
                                            <div class="premium-card">
                                                <div class="card-header">   
                                                    <div class="card-profile-link">
                                                        <a class="foodParkHomeLink" href="<?php echo home_url('/locacion/') . $term->slug; ?>"><i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h1><?php echo $term->name; ?></h1>
                                                </div>
                                                <div class="card-content">
                                                    <p><?php echo $term->description; ?></p>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a class="foodParkHomeLink" href="<?php echo home_url('/locacion/') . $term->slug; ?>"><?php _e('Ver más', 'foodtruckquito'); ?></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <?php } ?>
                                </div>                            
                            </div>
                        </section>
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
                                <img class="img-responsive ad-top-leader-board" src="<?php echo get_template_directory_uri(); ?>/images/swissotel.jpg" style="margin: 0 auto;">
                            </div>
                        </div>
                        <section>
                            <div class="row rutas">
                                <div class="col-xs-12">
                                    <h2>Sigue la ruta con Food Truck Quito</h2>
                                    <p>Un dia cualquiera con la intención de tener excusas para alimentar nuestros #tbt, el equipo de <a href="https://choclomedia.com">CHOCLOmedia</a> y Food Truck Quito se lanza a la calle en busca de sabores, olores y vistas en la ciudad de Quito.</p>
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
                                    <div class="premium-card">
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
                                    <a class="show-archive" href="<?php echo home_url('rutas'); ?>"><?php _e('Quiero conocer toda las rutas!','foodtruckquito'); ?></a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>     
<?php get_footer(); ?>
