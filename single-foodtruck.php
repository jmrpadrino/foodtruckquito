<?php get_header(); ?>
<?php 
get_template_part('templates/navbar-single');
the_post();
$post_id = get_the_ID();
$prefix = 'foodtruckquito'; 
$plan = get_post_meta($post_id, $prefix .'plan', true);
$logo = get_post_meta($post_id, $prefix.'logo', true);
$email = get_post_meta($post_id, $prefix.'email', true);
$horario = get_post_meta($post_id, $prefix.'horas', true);

$args = array('orderby' => 'term_id', 'order' => 'ASC', 'fields' => 'all');
$dias = wp_get_post_terms($post_id, 'horario', $args);

$post_type = get_post_type();
$tipos_negocio = get_the_terms($post_id, 'tipo-de-negocio');
$tipos_comida = get_the_terms($post_id, 'tipo-de_comida');
$patios = get_the_terms($post_id, 'patios');
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
                <img class="foodtruck-logo single" src="<?php echo $logo ?>" alt="<?php echo get_the_title(); ?>" width="200">
                <?php } ?>
                <h1 class="hero-slogan"><?php echo get_post_meta($post_id, $prefix.'slogan', true); ?></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php get_template_part('templates/sidebar-filters'); ?>
        </div>
        <div class="col-sm-6">
            <?php get_template_part('templates/top-banner-ad'); ?>
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <article>
                            <div class="col-sm-12">
                                <?php the_title('<h2 class="single-title">','</h2>');?>
                                <hr />
                            </div>
                            <div class="col-sm-4">
                                <?php if ($tipos_comida != false){ ?>
                                <h4 class="clasif-group"><i class="zmdi zmdi-cutlery"></i> Especialidad</h4>
                                <ul class="taxos list-inline">
                                    <?php
    foreach( $tipos_comida as $tipo_comida ){
        echo '<li><a href="'. get_term_link( $tipo_comida ) .'">' . $tipo_comida->name . '</a></li>';
    }
                                    ?>
                                </ul>
                                <?php } ?>
                                <?php if ($tipos_negocio != false){ ?>
                                <h4 class="clasif-group"><i class="zmdi zmdi-store"></i> Establecimiento</h4>
                                <ul class="taxos list-inline">
                                    <?php
    foreach( $tipos_negocio as $tipo_negocio ){
        echo '<li><a href="'. get_term_link( $tipo_negocio ) .'">' . $tipo_negocio->name . '</a></li>';
    }
                                    ?>
                                </ul>
                                <?php } ?>
                                <?php if ($patios != false){ ?>
                                <h4 class="clasif-group"><i class="zmdi zmdi-gps-dot"></i> Locacion</h4>
                                <ul class="taxos list-inline">
                                    <?php
    foreach( $patios as $patio ){
        echo '<li><a href="'. get_term_link( $patio ) .'">' . $patio->name . '</a></li>';
    }
                                    ?>
                                </ul>
                                <?php } ?>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="clasif-group"><i class="zmdi zmdi-money"></i> Precio</h4>
                                <p class="meal-cost">$ <?php echo get_post_meta($post_id, $prefix.'costs', true); ?></p>
                                <p class="meal-cost-explain">Para 2 personas (aprox.). Se toma el costo de los servicios mas costosos del lugar. <strong>Claro todo dependera de tu apetito! :D</strong></p>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-4">
                                        <?php
                                        $atencion = get_post_meta($post_id, $prefix.'atencion', true);
                                        $tiempo = get_post_meta($post_id, $prefix.'tiempo', true);
                                        $sabor = get_post_meta($post_id, $prefix.'sabor', true);
                                        $ambiente = get_post_meta($post_id, $prefix.'ambiente', true);
                                        $puntuacion = ( $atencion + $tiempo + $sabor + $ambiente ) / 4;
                                        switch( $puntuacion ){
                                            case ($puntuacion <= 2): $gradeColor = 'gradeGray'; break; 
                                            case ($puntuacion <= 3): $gradeColor = 'gradeYellow'; break; 
                                            case ($puntuacion <= 4): $gradeColor = 'gradeLightgreen'; break; 
                                            case ($puntuacion <= 5): $gradeColor = 'gradeGreen'; break;
                                        }
                                        ?>
                                        <!--div class="grade-wrapper <?php echo $gradeColor; ?>">
                                            <span class="grade-number">
                                                <?php echo number_format ( $puntuacion , 1 ); ?><span class="sobrecinco">/5</span>
                                            </span>
                                        </div-->
                                    </div>
                                    <?php
                                    $website = get_post_meta($post_id, $prefix.'website', true);
                                    $facebook = get_post_meta($post_id, $prefix.'facebook', true);
                                    $twitter = get_post_meta($post_id, $prefix.'twitter', true);
                                    $instagram = get_post_meta($post_id, $prefix.'instagram', true);
                                    ?>
                                    <div class="col-sm-12 col-xs-8">
                                        <ul class="list-inline single-social-icons text-right">
                                            <?php if (!empty($website)){ ?>
                                            <li><a href="<?php echo $website; ?>" alt="Visita la página de <?php echo get_the_title(); ?>" target="_blank"><i class="zmdi zmdi-globe zmdi-hc-2x"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($facebook)){ ?>
                                            <li><a href="<?php echo $facebook; ?>" alt="Visita el Facebook de <?php echo get_the_title(); ?>" target="_blank"><i class="zmdi zmdi-facebook zmdi-hc-2x"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($twitter)){ ?>
                                            <li><a href="<?php echo $twitter; ?>" alt="Visita el Facebook de <?php echo get_the_title(); ?>" target="_blank"><i class="zmdi zmdi-twitter zmdi-hc-2x"></i></a></li>
                                            <?php } ?>
                                            <?php if (!empty($instagram)){ ?>
                                            <li><a href="<?php echo $instagram; ?>" alt="Visita el Facebook de <?php echo get_the_title(); ?>" target="_blank"><i class="zmdi zmdi-instagram zmdi-hc-2x"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <hr />
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h4 class="clasif-group"><i class="zmdi zmdi-pin-drop"></i> Dirección</h4>
                                        <p><?php echo get_post_meta($post_id, $prefix.'adress', true); ?></p>
                                        <h4 class="clasif-group"><i class="zmdi zmdi-phone"></i> Teléfono</h4>
                                        <p><a href="tel:<?php echo get_post_meta($post_id, $prefix.'phone', true); ?>"><?php echo get_post_meta($post_id, $prefix.'phone', true); ?></a></p>
                                    </div>
                                    <div class="col-sm-5">
                                        <?php
                                            if (count($dias) > 0){
                                        ?>
                                        <h4 class="clasif-group"><i class="zmdi zmdi-calendar-note"></i> Abierto los dias</h4>
                                        <ul class="taxos list-inline">
                                            <?php foreach ($dias as $dia){ ?>
                                            <li><a href="<?php echo get_term_link( $dia ); ?>"><?php echo $dia->name; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                        <?php if(!empty($horario)){ ?>
                                        <h4 class="clasif-group"><i class="zmdi zmdi-time"></i> Horario de apertura y cierre</h4>
                                        <p><?php echo $horario; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php if ($plan > 2){ ?>
                            <div class="col-xs-12">
                                <hr />
                                <div>
                                    <h3><i class="zmdi zmdi-info"></i> Conócelos</h3>
                                    <?php the_content(); ?>                                    
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <hr />
                                <h3><i class="zmdi zmdi-eye"></i> Esto se ve muy bien!</h3>
                                <?php 
                                    $fotos =  get_post_meta($post_id, $prefix.'gallery', false);
                                    foreach ( $fotos as $foto ){
                                        $url = wp_get_attachment_url( $foto );
                                        //echo '<a href="'.get_attachment_link( $foto ).'" rel="lightbox-foodtruck">';
                                        echo '<a href="'.$url.'" rel="lightbox-plaza">';
                                        echo wp_get_attachment_image( $foto, 'thumbnail', true, array( 'class' => 'foodtruck-gallery-image') );
                                        echo "</a>";
                                    }
                                ?>
                            </div>
                            <?php 
                                $coords = explode(',', get_post_meta($post_id, $prefix.'location_coords', true));
                                if (count($coords) > 1 ){
                            ?>
                            <div class="col-xs-12">
                                
                                <hr />
                                <h3><i class="zmdi zmdi-gps-dot"></i> Encuentralo en el mapa</h3>
                                <div id="foodtruck-map" class="foodtruck-map" style="width: 100%; height: 350px;"></div>
                                <script>
                                    function initMap() {
                                        var myLatLng = {lat: <?php echo $coords[0]; ?>, lng: <?php echo $coords[1]; ?>};
                                        var markericon = '<?php echo get_template_directory_uri(); ?>/images/foodtruckquito-mm.png';
                                        var map = new google.maps.Map(document.getElementById('foodtruck-map'), {
                                            zoom: 17,
                                            center: myLatLng,
                                            zoomControl: true,
                                            disableDoubleClickZoom: false,
                                            mapTypeControl: true,
                                            scaleControl: true,
                                            scrollwheel: false,
                                            panControl: true,
                                            streetViewControl: false,
                                            draggable : false,
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
                                        }
                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjjwxFAJedRfOaXCpDrIs5NjRaGJI395g&callback=initMap"
    async defer></script>
                            </div>
                            <?php } ?>
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
                            <?php } //oculto en planes menores al premium ?>
                        </article>
                    </main>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <?php get_template_part('templates/sidebar-foodtrucks'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <hr />
                    <h3><i class="zmdi zmdi-email"></i> Contacta</h3>
                    <form id="user-place-suggest">
                        <input type="hidden" value="<?php echo $email; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><i class="zmdi zmdi-account"></i> Su Nombre completo</label>
                            <input name="name" type="text" class="form-control" id="singleformname" placeholder="Queremos saber quien nos escribe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><i class="zmdi zmdi-email"></i> Email</label>
                            <input name="email" type="email" class="form-control" id="singleformmail" placeholder="Queremos darle las gracias">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><i class="zmdi zmdi-phone"></i> Teléfono</label>
                            <!--input name="tel" id="singleformphone" class="form-control" type='tel' pattern='[\+]\d{2}[\(]\d{2}[\)]\d{7}' title='Formato: +99(99)9999999' placeholder="Queremos verificar con usted!"-->
                            <input name="phone" id="singleformphone" class="form-control" type='tel' title='Formato: 0995555555' placeholder="Queremos verificar con usted!"> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><i class="zmdi zmdi-comment-alt"></i> Comentario</label>
                            <textarea name="inquiry" rows="4" class="form-control" id="singleformmsg" placeholder="Queremos saber donde esta"></textarea>
                        </div>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="g-recaptcha" data-sitekey="6Lc1Ch0UAAAAALQ6AC9daKKxK9ylopetZyAwjEoW"></div>
                        <div id="message-wrapper"></div>
                        <button type="submit" class="btn btn-default">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>