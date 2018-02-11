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
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <?php get_template_part('templates/middle-body-ad'); wp_reset_query();?>
                        <?php 
                            if(have_posts()){
                                while(have_posts()){ the_post();
                                    //verificar que plan tiene para mostrar la maqueta
                                    $plan = get_post_meta(get_the_ID(), $prefix.'plan', true);
                                    if ($plan == 1){
                                        get_template_part('templates/free-card-list-item');
                                    } else if($plan == 2){
                                        get_template_part('templates/starter-card-list-item');
                                    }else if ($plan == 3){
                                        get_template_part('templates/premium-card-list-item');
                                    }

                                }
                                numeric_posts_nav();
                            }
                        ?>
                        <?php get_template_part('templates/bottom-body-ad'); ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>