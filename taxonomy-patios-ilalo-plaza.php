<?php 
    get_header();
    get_template_part('templates/navbar-single');

    $termino = get_term_by( 'slug', $term, $taxonomy );
    $prefix = 'foodtruckquito';
    if (qtranxf_getLanguage() == 'en') {
        switch ( $taxonomy ){
            case 'tipo-de-negocio':
                $string = '<i class="zmdi zmdi-store"></i> <strong class="term-in-title">'.$termino->name.'</strong> Establishments in Quito ';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-establecimientos.jpg';
                break;
            case 'tipo-de_comida':
                $string = '<i class="zmdi zmdi-cutlery"></i> <strong class="term-in-title">'.$termino->name.'</strong> Food in Quito ';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-especialidades.jpg';
                break;
            case 'patios':
                $string = '<i class="zmdi zmdi-gps-dot"></i> Food Trucks located at <strong class="term-in-title">'.$termino->name.'</strong> in Quito';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-locaciones.jpg';
                break;
        }
    }else{
        switch ( $taxonomy ){
            case 'tipo-de-negocio':
                $string = '<i class="zmdi zmdi-store"></i> Establecimientos de <strong class="term-in-title">' . $termino->name . '</strong> en Quito';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-establecimientos.jpg';
                break;
            case 'tipo-de_comida':
                $string = '<i class="zmdi zmdi-cutlery"></i> Comida <strong class="term-in-title">'. $termino->name . '</strong> en Quito';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-especialidades.jpg';
                break;
            case 'patios':
                $string = '<i class="zmdi zmdi-gps-dot"></i> Locales ubicados en <strong class="term-in-title">'. $termino->name . '</strong> en Quito';
                $featured_image = get_template_directory_uri(). '/images/foodtruckquito-locaciones.jpg';
                break;
        }
    }
?>
        <div id="hero" class="hero-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/plaza/<?php echo $termino->slug; ?>/<?php echo $termino->slug; ?>.jpg);">
            <div class="hero-mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img class="foodtruck-logo" src="<?php echo get_template_directory_uri(); ?>/images/LogoFoodTruckQuito.png" alt="foodtruck Quito" width="200">
                        <span class="hero-slogan"><?php _e('Descubre lo mejor que tiene Quito para ti','foodtruckquito'); ?>.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form class="heroSearchForm" action="<?php echo home_url(); ?>/">
                            <div class="form-inline">
                                <input name="s" type="text" class="form-control homeTextInput" placeholder="Por aqui se consigue donde comer!">
                                <button type="submit" class="btn btn-default btn-find"><i class="zmdi zmdi-search"></i> <?php _e('Buscar','foodtruckquito'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 hidden-xs">
                    <?php get_template_part('templates/sidebar-filters'); ?>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1><?php echo $string ; ?></h1>
                            <p><?php echo term_description( $termino, $taxonomy ); ?></p>
                            <hr />
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-xs-12">
                            <main>
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
                            </main>
                        </div>
                    </div>
                </div>
                <div class="hidden-sm visible-md visible-lg col-md-3">
                    <?php get_template_part('templates/sidebar-foodtrucks'); ?>
                </div>
            </div>
        </div>
<?php get_footer(); ?>