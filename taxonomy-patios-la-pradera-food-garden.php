<?php 
    get_header();
    get_template_part('templates/navbar-single');

    $termino = get_term_by( 'slug', $term, $taxonomy );
    $prefix = 'foodtruckquito';
    
    switch ( $taxonomy ){
        case 'tipo-de-negocio':
            $string = 'Establecimientos de ';
            $featured_image = get_template_directory_uri(). '/images/foodtruckquito-establecimientos.jpg';
            break;
        case 'tipo-de_comida':
            $string = 'Comida ';
            $featured_image = get_template_directory_uri(). '/images/foodtruckquito-especialidades.jpg';
            break;
        case 'patios':
            $string = '<i class="zmdi zmdi-gps-dot"></i> Locales ubicados en ';
            $featured_image = get_template_directory_uri(). '/images/foodtruckquito-locaciones.jpg';
            break;
    }
?>
        <style>
            #park-map {
                height:250px;
                width:100%;
            }
            .gm-style-iw * {
                display: block;
                width: 100%;
            }
            .gm-style-iw h4, .gm-style-iw p {
                margin: 0;
                padding: 0;
            }
            .gm-style-iw a {
                color: #4272db;
            }
            video#bgvid { 
                position: absolute;
                top: -50%;
                left: 0;
                width: 100vw;
                z-index: 0;
                /*-ms-transform: translateX(-50%) translateY(-50%);
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);*/
                background-position: center;
                background-attachment: fixed;
                background-size: cover;
            }
            @media screen and (max-width: 768px){
                video#bgvid { 
                    top: -25%;
                    width: auto;
                }
            }
        </style>
        <!--[if lt IE 9]>
        <script>
            document.createElement('video');
        </script>
        <![endif]-->
        <div id="hero" class="hero-header " style="background-image: url(<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug; ?>-4.jpg); display: block;">
            <!--<video playsinline autoplay loop poster="<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug; ?>-4.jpg" id="bgvid">
                <source src="<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/la-pradera-food-garden-hero-video.mp4" type="video/mp4">
            </video>-->
            <div class="hero-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img class="foodtruck-logo" src="<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug; ?>-logo.png" alt="La Pradera Food Garden" width="200">
                        <h1 class="hero-slogan"><?php echo $termino->name; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 hidden-xs">
                    <?php get_template_part('templates/sidebar-filters'); ?>
                </div>
                <div class="col-sm-9 col-md-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="plaza-desc"><?php echo $termino->description; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <hr />
                            <h3><i class="zmdi zmdi-gps-dot"></i> Valen mas que mil palabras</h3>
                            <div class="gallery">
                                <?php for($i=0;$i<=17;$i++){ ?>
                                <div class="col-sm-4 image-gallery">
                                    <a href="<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug . '-' . $i; ?>.jpg" rel="lightbox-plaza" title="<?php echo $termino->name; ?>">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug . '-' . $i; ?>.jpg" alt="<?php echo $termino->name; ?>">
                                    </a>
                                </div>
                                <?php if ($i % 3 == 0){ echo '<div class="clearfix"></div>'; } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php get_template_part('templates/middle-body-ad'); wp_reset_query();?>
                    <div class="row">    
                        <div class="col-sm-12">
                            <hr />
                            <main>
                                <h3><i class="zmdi zmdi-cutlery"></i> Disfruta aqui de</h3>
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
                                    }else{
                                ?>
                                <div class="not-found-message-wrapper">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img class="foodtruck-logo" src="<?php echo get_template_directory_uri(); ?>/images/LogoFoodTruckQuito.png" alt="foodtruck Quito" width="200">
                                            <span class="error-message text-center" style="display: block; font-size: 18px; font-weight: 900;">Lo sentimos!, no hemos encontrado lo que buscas.</span>
                                            <hr class="grayHr">
                                            <h3 class="text-center">¿Nos estamos perdiendo de algún lugar?</h3>
                                            <p>Comentanos un poco sobre ello...</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <form id="user-place-suggest">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Su Nombre completo</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Queremos saber quien nos escribe">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Queremos darle las gracias">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Teléfono</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Queremos verificar con usted!">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nombre del lugar</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Queremos saber como se llama el sitio">
                                                </div> 
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Dirección del lugar</label>
                                                    <textarea rows="4" class="form-control" id="exampleInputEmail1" placeholder="Queremos saber donde esta"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </form>
                                        </div>
                                        <div class="col-sm-5 col-md-offset-1 how-it-works">
                                            <h4>Cómo funciona</h4>
                                            <ul>
                                                <li>Si eres el dueño de un restaurante, o si es un usuario que ha descubierto un lugar que no aparece en <strong>Foodtruck Quito</strong>, haznos saber a través de este formulario.</li>
                                                <li>Una vez que envíes la información a nosotros, nuestro equipo de contenido la verificará. Para ayudar a acelerar el proceso, por favor proporciona un número de contacto o dirección de correo electrónico.</li>
                                                <li>¡Eso es! Una vez verificada la lista comenzará a aparecer en <strong>Foodtruck Quito</strong>.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr />
                                        <h3>Sigue nuestras rutas</h3>
                                    </div>
                                </div>
                                <?php 
                                    }
                                ?>
                                <?php numeric_posts_nav(); ?>
                            </main>
                        </div>
                    </div>
                    <?php get_template_part('templates/bottom-body-ad'); ?>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><i class="zmdi zmdi-share"></i> Contáctalos!</h3>
                            <ul class="list-inline plaza-contacto">
                                <li><a href="https://www.facebook.com/praderamega/" target="_blank"><i class="zmdi zmdi-facebook zmdi-hc-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3><i class="zmdi zmdi-gps-dot"></i> Encuentralo en el mapa</h3>
                            <div id="park-map" class="park-map"></div>
                            <hr />
                        </div>
                    </div>
                    <?php get_template_part('templates/sidebar-foodtrucks'); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <hr />
                            <h3><i class="zmdi zmdi-email"></i> Envía un mensaje</h3>
                            <form id="user-place-suggest">
                                <input type="hidden" value="jmrpadrino@gmail.com">
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
                                <button type="submit" class="btn btn-default">Enviar Mensaje</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function initMap() {
                var myLatLng = {lat: -0.19272, lng: -78.4856495};
                var markericon = '<?php echo get_template_directory_uri(); ?>/images/foodtruckquito-mm.png';
                var map = new google.maps.Map(document.getElementById('park-map'), {
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
<?php get_footer(); ?>