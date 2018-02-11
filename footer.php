        <section class="mailing-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Begin MailChimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                            #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
                            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                        <form action="//choclomedia.us15.list-manage.com/subscribe/post?u=a88d7631d1c9a3aafa895159c&amp;id=60e3b146f6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                            <img class="rocknroll text-center" src="<?php echo get_template_directory_uri(); ?>/images/gracias-por-suscripcion-foodtruckquito.png" alt="Gracias por tu suscripción">
                            <label class="subs-title" for="mce-EMAIL">Suscr&iacute;bete ahora!</label>
                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Correo electrónico" required>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a88d7631d1c9a3aafa895159c_60e3b146f6" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Suscribirme" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-center">Síguenos en nuestras redes sociales</h3>
                        <ul class="suscribe-list list-inline text-center">
                            <li><a href="https://www.instagram.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-instagram zmdi-hc-2x"></i></a></li>
                            <li><a href="https://www.facebook.com/foodtruckquito/" target="_blank"><i class="zmdi zmdi-facebook-box zmdi-hc-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#" alt="ir a Foodtruck Quito">
                            <img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/LogoFoodTruckQuitoSmoke.png" alt="Foodtruck Quito - Logo">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <?php
                        //Traer lo anuncios de sidebar-top
                        $args = array (
                            'post_type' => 'publicidad',
                            'posts_per_page' => 1,
                            'orderby' => 'rand',
                            'tax_query' => array(  
                                array(  
                                    'taxonomy' => 'anunciante',  
                                    'field' => 'slug',  
                                    'terms' => 'footer-ad'  
                                )  
                            ) 
                        );
                        $anuncios = query_posts($args);
                        if (count($anuncios) > 0){
                        foreach($anuncios as $anuncio){
                            $link = get_post_meta($anuncio->ID, $prefix . 'a_link', true);
                        }
                        $imagen_destacada = get_the_post_thumbnail( $anuncio->ID ,'', array( 'class' => 'img-responsive') );
                    ?>
                    <div class="ad-bottom-leader-board pull-right">
                    <?php 
                            if (empty($link)){
                                echo $imagen_destacada;
                            }else{
                                echo '<a href="'.$link.'" target="_blank">';
                                echo $imagen_destacada;
                                echo '</a>';       
                            }
                    ?>
                    </div>
                    <?php } //Cierre anuncio lateral top ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h4 class="footer-titles">Acerca de Foodtruck Quito</h4>
                        <ul class="footer-link-list">
                            <li><a href="<?php echo home_url('nosotros'); ?>" alt="Nosotros">Nosotros</a></li>
                            <li><a href="<?php echo home_url('cultura'); ?>" alt="Cultura">Cultura</a></li>
                            <li><a href="<?php echo home_url('contactar'); ?>" alt="Contatar">Contactar</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="footer-titles">Para Foodies</h4>
                        <ul class="footer-link-list">
                            <li><a href="<?php echo home_url('rutas/'); ?>" alt="Sigue la ruta" rel="nofollow">Sigue la Ruta</a></li>
                            <li><a href="<?php echo home_url('hacer-un-reclamo'); ?>" alt="Hacer un reclamo" rel="nofollow">Buzón de Sugerencias</a></li>
                            <!--li><a href="#" alt="Blog" rel="nofollow">Blog</a></li-->
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="footer-titles">Para Restaurantes</h4>
                        <ul class="footer-link-list">
                            <li><a href="<?php echo home_url('agregate-food-truck-quito'); ?>" alt="Agregarte a Foodtruck Quito" rel="nofollow">Agregarte a Foodtruck Quito</a></li>
                            <li><a href="<?php echo home_url('solicitar-recalificacion-del-foodtruck'); ?>" alt="Solicitar recalificación del Foodtruck" rel="nofollow">Solicitar recalificación del Foodtruck</a></li>
                            <li><a href="<?php echo home_url('solicitar-recalificacion-la-plaza'); ?>" alt="Solicitar recalificación de la plaza" rel="nofollow">Solicitar recalificación de la plaza</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="footer-titles">Mucho más</h4>
                        <ul class="footer-link-list">
                            <li><a href="<?php echo home_url('anuncia-foodtruck-quito'); ?>" alt="Anuncia en Foodtruck Quito" rel="nofollow">Anuncia en Foodtruck Quito</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <hr />
                        <p>Todas las marcas son propiedad de sus respectivos dueños. © 2016-2017 - <a href="https://choclomedia.com" rel="nofollow" target="_blank">Choclomedia.com™</a>. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
        <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us15.list-manage.com","uuid":"a88d7631d1c9a3aafa895159c","lid":"60e3b146f6"}) })</script>
    </body>
</html>