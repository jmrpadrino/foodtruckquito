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
            <main>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Estás buscando <span class="term-in-title"><?php echo get_search_query(); ?></span></h1>
                        <hr />
                    </div>
                </div>
                <div clas="row">
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
                            }else{
                        ?>
                        <h1>No hay nada de eso!</h1>
                        <p>Lo sentimos, no hemos podido encontrar lo que buscas.</p>
                        <p>Quizas otra búsqueda le puede ayudar.</p>
                        <form class="heroSearchForm">
                            <div class="form-inline">
                                <input name="s" type="text" class="form-control" placeholder="Pruebe con otros términos!">
                                <button type="submit" class="btn btn-default btn-find"><i class="zmdi zmdi-search"></i> Buscar</button>
                            </div>
                        </form>
                        <hr />
                        <div class="not-found-message-wrapper">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img class="foodtruck-logo" src="<?php echo get_template_directory_uri(); ?>/images/LogoFoodTruckQuito.png" alt="foodtruck Quito" width="200">
                                    <!--span class="error-message text-center" style="display: block; font-size: 18px; font-weight: 900;">Lo sentimos!, no hemos encontrado lo que buscas.</span-->
                                    <hr class="grayHr">
                                    <h3 class="text-center">¿Nos estamos perdiendo de algún lugar?</h3>
                                    <p>Comentanos un poco sobre ello...</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <form id="user-place-suggest-on-search">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Su Nombre completo</label>
                                            <input type="text" class="form-control" placeholder="Queremos saber quien nos escribe">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" placeholder="Queremos darle las gracias">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Teléfono</label>
                                            <input type="text" class="form-control" placeholder="Queremos verificar con usted!">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre del lugar</label>
                                            <input type="text" class="form-control" placeholder="Queremos saber como se llama el sitio">
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dirección del lugar</label>
                                            <textarea rows="4" class="form-control" placeholder="Queremos saber donde esta"></textarea>
                                        </div>
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <div class="g-recaptcha" data-sitekey="6Lc1Ch0UAAAAALQ6AC9daKKxK9ylopetZyAwjEoW"></div>
                                        <button type="submit" class="btn btn-warning">Enviar</button>
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
                        <?php get_template_part('templates/bottom-body-ad'); ?>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer(); ?>