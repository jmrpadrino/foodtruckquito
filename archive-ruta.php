<?php get_header(); ?>
<?php 
    get_template_part('templates/navbar-single');
    get_template_part('templates/hero-home');
    $prefix = 'foodtruckquito'; 
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <?php get_template_part('templates/sidebar-filters'); ?>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <?php 
                            if(have_posts()){ $i = 0;
                                while(have_posts()){
                                    the_post();
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
                                    $i++;
                                    if($i % 3 == 0){
                                        echo '<div class="clearfix"></div>';
                                    }
                                }
                        ?>
                        <div class="col-md-12 pagination">
                            <?php numeric_posts_nav(); ?>
                        </div>
                        <?php 
                                
                            }
                        ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>