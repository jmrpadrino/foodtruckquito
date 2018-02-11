<div class="row">
    <div class="col-xs-12">
        <div  class="google-ads">
            <a href="https://foodtruckquito.com.ec/anuncia-foodtruck-quito/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/anuncia-en-food-truck-quito.jpg" class="img-responsive" title="Llama ahora al 099 823 0364" alt="Anuncia en Food Truck Quito">
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h3>#Foodtrucketas</h3>
        <div class="tag-cloud">
            <?php
                $args = array(
                    'smallest'                  => 12, 
                    'largest'                   => 28,
                    'unit'                      => 'px', 
                    'number'                    => 45,  
                    'format'                    => 'flat',
                    'separator'                 => "\n",
                    'orderby'                   => 'name', 
                    'order'                     => 'rand',
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
    </div>
</div>
                    