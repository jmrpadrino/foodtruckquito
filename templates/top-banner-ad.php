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
                            'terms' => 'top-banner-ad'  
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
            <!--div class="container"-->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ad-top-leader-board">
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
                    </div>
                </div>
            <!--</div> -->
            <?php } //Cierre anuncio lateral top ?>