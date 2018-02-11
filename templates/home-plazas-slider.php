<?php
    $plazas = array(
        'festival-street-station',
        'la-pradera-food-garden',
        'plazoleta-live',
        'la-rambla',
        'quito-food-festival-la-gasca',
        'vagon-gastro-plaza'
    );
?>                         
                        <section id="slider-plazas">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="moreSection"><?php _e('¿Conoces estas plazas de comida rápida en Quito? - #SigueLaRuta','foodtruckquito'); ?></h2>
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
                                    <?php
                                        $t_id = $term->term_id;
                                        $term_meta = get_option( "taxonomy_$t_id" );
                                        //var_dump($term_meta);
                                        //buscar el attachment por slug segun término.
                                        $args = array(
                                            'post_type' => 'attachment',
                                            'name' => sanitize_title($term->slug),
                                            'posts_per_page' => 1,
                                            'post_status' => 'inherit',
                                        );
                                        $_header = get_posts( $args );
                                        //var_dump( $_header );
                                    ?>
                                    <?php
                                        if (in_array($term->slug, $plazas)){
                                    ?>
                                    <div class="slide">
                                        <article>
                                            <a class="foodParkHomeLink" href="<?php echo home_url('/locacion/') . $term->slug; ?>" style="background-image: url(<?php echo $_header[0]->guid; ?>);">
                                                <div class="foodParkHomeLink-mask"></div>
                                            </a>
                                            <div class="card-title">
                                                <a href="<?php echo home_url('/locacion/') . $term->slug; ?>"><h1 class="text-center"><?php echo $term->name; ?></h1></a>
                                                <?php if (!empty($term_meta['patio_direccion'])){ ?>
                                                <p class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <strong><?php _e('Dirección','foodtruckquito'); ?></strong> <?php echo $term_meta['patio_direccion']; ?></p>
                                                <?php } ?>
                                                <div class="card-profile-link">
                                                    <i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="slide">
                                        <article>
                                            <a class="foodParkHomeLink" style="background-image: url(<?php echo $_header[0]->guid; ?>);">
                                                <div class="foodParkHomeLink-mask"></div>
                                            </a>
                                            <div class="card-title">
                                                <h1 class="text-center"><?php echo $term->name; ?></h1>
                                                <?php if (!empty($term_meta['patio_direccion'])){ ?>
                                                <p class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <strong><?php _e('Dirección','foodtruckquito'); ?></strong> <?php echo $term_meta['patio_direccion']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </article>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>                            
                            </div>
                        </section>