<?php
    $i = rand(1,5);
?>
        <div id="hero" class="hero-header pic<?php echo $i ?>">
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