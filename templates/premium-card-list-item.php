<?php 
    $prefix = 'foodtruckquito'; 
    $atencion = get_post_meta(get_the_ID(), $prefix.'atencion', true);
    $tiempo = get_post_meta(get_the_ID(), $prefix.'tiempo', true);
    $sabor = get_post_meta(get_the_ID(), $prefix.'sabor', true);
    $ambiente = get_post_meta(get_the_ID(), $prefix.'ambiente', true);
    $puntuacion = ( $atencion + $tiempo + $sabor + $ambiente ) / 4;
    switch( $puntuacion ){
        case ($puntuacion <= 2): $gradeColor = 'gradeGray'; break; 
        case ($puntuacion <= 3): $gradeColor = 'gradeYellow'; break; 
        case ($puntuacion <= 4): $gradeColor = 'gradeLightgreen'; break; 
        case ($puntuacion <= 5): $gradeColor = 'gradeGreen'; break;
    }
                                        
?>                                   
                                    <div class="col-sm-12">
                                        <article>
                                            <div class="plan-a plan-premium">
                                                <?php if ($puntuacion > 0){ ?>
                                                    <!--div class="grade-wrapper <?php echo $gradeColor; ?>">
                                                        <span class="grade-number">
                                                            <?php echo number_format ( $puntuacion , 1 ); ?><span class="sobrecinco">/5</span>
                                                        </span>
                                                    </div-->
                                                    <?php } ?>
                                                <?php 
                                                    if ( has_post_thumbnail() ){
                                                        $featured_image = get_the_post_thumbnail_url( $id, 'thumbnail');
                                                    }else{
                                                        $featured_image = get_template_directory_uri() . '/images/foodtruckquito-premium-placeholder.png';
                                                    }
                                                ?>
                                                <div class="card-header" style="background-image: url(<?php echo $featured_image; ?>);">   
                                                    <div class="card-profile-link">
                                                        <a href="<?php the_permalink(); ?>"><i class="zmdi zmdi-plus-circle zmdi-hc-2x"></i></a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-content">
                                                    <a href="<?php the_permalink(); ?>"><h1 class="card-title"><?php the_title(); ?></h1></a>
                                                    <p><span class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> <?php _e('Dirección','foodtruckquito'); ?></span>: <?php echo get_post_meta(get_the_ID(), $prefix.'adress', true); ?></p>
                                                    <p><span class="clasif-group"><i class="zmdi zmdi-phone"></i> <?php _e('Teléfono','foodtruckquito'); ?></span>: <a href="tel:<?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?>"><?php echo get_post_meta(get_the_ID(), $prefix.'phone', true); ?></a></p>
                                                </div>                                   
                                            </div>
                                        </article>
                                    </div>