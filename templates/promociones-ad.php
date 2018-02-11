                                <?php
                                    $prefix = 'foodtruckquito'; 
                                    //Traer lo anuncios de sidebar-top
                                    $args = array (
                                        'post_type' => 'publicidad',
                                        'posts_per_page' => 5,
                                        'orderby' => 'rand',
                                        'tax_query' => array(  
                                            array(  
                                                'taxonomy' => 'anunciante',  
                                                'field' => 'slug',  
                                                'terms' => 'promociones'  
                                            )  
                                        ) 
                                    );
                                    $anuncios = query_posts($args);
                                    //echo count($anuncios);
                                    foreach($anuncios as $anuncio){
                                        $link = get_post_meta($anuncio->ID, $prefix . 'a_link', true);
                                        $imagen_destacada = get_the_post_thumbnail( $anuncio->ID ,'', array( 'class' => 'img-responsive ad-top-leader-board') );
                                ?>
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
                                <?php } ?>