<?php get_header(); ?>
<?php 
    get_template_part('templates/navbar-single');
    $prefix = 'foodtruckquito'; 
?>
<div class="container container-404">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>404</h1>
            <p>eeh!... no entendemos como llegaste aquí!</p>
            <p>pero no importa, igualmente te recomendamos estos Food Trucks en Quito</p>
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
        <div class="col-xs-12 text-center">
            <p class="too-404">Estas etiquetas te pueden ayudar</p>
            <div class="tag-cloud">
                <?php
                    $args = array(
                        'smallest'                  => 12, 
                        'largest'                   => 36,
                        'unit'                      => 'px', 
                        'number'                    => 45,  
                        'format'                    => 'flat',
                        'separator'                 => "\n",
                        'orderby'                   => 'name', 
                        'order'                     => 'ASC',
                        'exclude'                   => null, 
                        'include'                   => null, 
                        'topic_count_text_callback' => default_topic_count_text,
                        'link'                      => 'view', 
                        'taxonomy'                  => 'post_tag', 
                        'echo'                      => true,
                        'child_of'                  => null, // see Note!
                    );
                    wp_tag_cloud( $args );
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>