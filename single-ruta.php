<?php get_header(); ?>
<?php 
get_template_part('templates/navbar-single');
the_post();
$post_id = get_the_ID();
$prefix = 'foodtruckquito'; 
$places = get_post_meta($post_id, $prefix .'places', true);
$excerpt = get_the_excerpt();
if ( has_post_thumbnail() ){
    $featured_image = get_the_post_thumbnail_url( $id, 'large');
}else{
    $featured_image = get_template_directory_uri() . '/images/single-no-hero.jpg';
}
?>
<div id="hero" class="hero-header" style="background-image: url(<?php echo $featured_image; ?>);">
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($logo)){ ?>
                <img class="foodtruck-logo" src="<?php echo $logo ?>" alt="<?php echo get_the_title(); ?>" width="200" height="200">
                <?php } ?>
                
                <spam class="hero-slogan"><?php echo $excerpt; ?></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <?php get_template_part('templates/sidebar-filters'); ?>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <article>
                            <div class="col-xs-12">
                                <?php the_title('<h2 class="single-title">','</h2>'); echo $plan;?>
                                <p><?php _e('Publicado el', 'foodtruckquito'); echo ' '; the_date(); ?></p>
                                
                            </div>
                            <div class="col-xs-12 single-content-wrapper" style="background: white; padding: 16px; border-radius: 5px; font-size: 14px; line-height: 2; color: gray; text-align: justify;">
                                <?php the_content(); ?>
                            </div>
                            <?php /*
                            <div class="col-xs-12">
                                <hr />
                                <h3><?php _e('Lugares visitados en esta ruta','foodtruckquito'); ?></h3>
                                <div id="foodtruck-map" class="foodtruck-map" style="width: 100%; height: 350px;"></div>
                                <script>
                                    var x = document.getElementById("foodtruck-map");
                                    window.onload = function getLocation() {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(function savePosition(position){
                                                var myLatLng,lat,lng;
                                                lat =  position.coords.latitude;
                                                lng =  position.coords.longitude; 
                                                myLatLng = {lat, lng};
                                                var markericon = '<?php echo get_template_directory_uri(); ?>/images/foodtruckquito-mm.png';
                                                var map = new google.maps.Map(document.getElementById('foodtruck-map'), {
                                                    zoom: 13,
                                                    center: myLatLng,
                                                    zoomControl: true,
                                                    disableDoubleClickZoom: false,
                                                    mapTypeControl: true,
                                                    scaleControl: true,
                                                    scrollwheel: false,
                                                    panControl: true,
                                                    streetViewControl: false,
                                                    draggable : true,
                                                    overviewMapControl: false,
                                                    overviewMapControlOptions: {
                                                        opened: false,
                                                    },
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                  });

                                                  var marker = new google.maps.Marker({
                                                    icon: markericon,
                                                    position: myLatLng,
                                                    map: map,
                                                    title: '<?php echo $termino->name; ?>'
                                                  });
                                                  var infowindow = new google.maps.InfoWindow({
                                                    map: map,
                                                    position: myLatLng,
                                                    content: 'Location found using HTML5.'
                                                  });
                                            });
                                        } else {
                                            x.innerHTML = "Para una mejor experiencia de usuario active su GPS, Gracias.";
                                        }
                                    }
                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjjwxFAJedRfOaXCpDrIs5NjRaGJI395g&callback=savePosition"
    async defer></script>
                            </div>
                            */ ?>
                            <div class="col-xs-12">
                                <hr />
                                <h3><i class="zmdi zmdi-comments"></i> Déjales un comentario a <?php echo get_the_title(); ?></h3>
                                <div id="disqus_thread"></div>
                                <script>

                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://food-truck-quito.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <?php get_template_part('templates/sidebar-foodtrucks'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>