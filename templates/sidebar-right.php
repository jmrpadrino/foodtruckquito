                    <div class="tag-cloud">
                        <?php
                            $args = array(
                                'smallest'                  => 12, 
                                'largest'                   => 36,
                                'unit'                      => 'px', 
                                'number'                    => 45,  
                                'format'                    => 'flat',
                                'separator'                 => "\n",
                                'orderby'                   => 'name', 
                                'order'                     => 'ASC',
                                'exclude'                   => null, 
                                'include'                   => null, 
                                'topic_count_text_callback' => default_topic_count_text,
                                'link'                      => 'view', 
                                'taxonomy'                  => 'post_tag', 
                                'echo'                      => true,
                                'child_of'                  => null, // see Note!
                            );
                            wp_tag_cloud( $args );
                        ?>
                    </div>