<?php get_header(); ?>
<?php 
get_template_part('templates/navbar-single');
the_post();
if ( has_post_thumbnail() ){
    $featured_image = get_the_post_thumbnail_url( $id, 'large');
}else{
    $featured_image = get_template_directory_uri() . '/images/foodtruckquito-hero-image-pages.jpg';
}
?>
<div id="hero" class="hero-header" style="background-image: url(<?php echo $featured_image; ?>);">
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($logo)){ ?>
                <img class="foodtruck-logo" src="<?php echo $logo ?>" alt="<?php echo get_the_title(); ?>" width="200">
                <?php } ?>
                <h1 class="hero-slogan"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container forpages">
    <div class="row">
        <div class="col-sm-9">
            <?php the_content(); ?>
        </div>
        <div class="col-sm-3">
            
        </div>
    </div>
</div>
<?php get_footer(); ?>