<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Foodtruck Quito y sigue la ruta | Un desarrollo de Choclomedia.com</title>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Fugaz+One|Roboto+Slab" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/owl.transitions.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            .mainWrapper{
                position: relative;
                height: 100vh;
                width: 100%;
                background: green;
            }
            #backSlider{
                position: absolute;
                height: 100vh;
                width: 100%;
                top: 0;
                left 0;
            }
            .slide{
                height: 100vh;
                width: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover
            }
            .foodtruckquito-title,.foodtruckquito-title:link,.foodtruckquito-title:hover,.foodtruckquito-title:active,.foodtruckquito-title:focus{
                font-family: 'Fugaz One', cursive;
                font-size: 80px;
                color: #ffc600;
                text-decoration: none;
            }
            @media screen and (max-width: 768px){
                .foodtruckquito-title,.foodtruckquito-title:link,.foodtruckquito-title:hover,.foodtruckquito-title:active,.foodtruckquito-title:focus{
                    font-size: 24px;
                }
            }
            .homeCopyText{
                font-family: 'Roboto Slab', serif;
                color: white;
                font-size: 36px;
                width: 950px;
            }
            @media screen and (max-width: 768px){
                body{
                    overflow: hidden;
                }
                article{
                    padding: 16px;
                    z-index: 9;
                }
                .homeCopyText{
                    
                    font-size: 24px;
                    width: 100%;
                }
            }
            .gotoinstagram{
                display: block;
                margin: 0 auto;
                width: 50px;
                height: 50px;
            }
            .overlayContainer{
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/overlay.png);
                position: absolute;
                height: 100vh;
                width: 100%;
                top: 0;
                left 0;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
                text-align: center;
                z-index: 1;
            }
            .cornerShadow{
                position: absolute;
                right: 0;
                bottom: 0;
                background-image: url(<?php echo get_template_directory_uri(); ?>/images/cornerShadow.png);
                background-repeat: no-repeat;
                width: 675px;
                height: 610px;
            }
            .byChoclomedia{
                position: absolute;
                bottom: 0;
                right: 0;
            }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <div class="mainWrapper">
            <div id="backSlider" class="owl-carousel owl-theme">
                <div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slide1.jpg);"></div>
                <div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slide2.jpg);"></div>
                <div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slide3.jpg);"></div>
                <div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slide4.jpg);"></div>
                <div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slide5.jpg);"></div>
            </div>
            <div class="overlayContainer">
                <article>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/FoodtruckQuito-HomeLogo.png" alt="FoodtruckQuito Logo">
                    <p class="homeCopyText">Estamos trabajando para darte la mejor informaci&oacute;n, mientras tanto s&iacute;guenos en</p>
                    <h1><a class="foodtruckquito-title" href="https://www.instagram.com/foodtruckquito/" target="_blank">@FoodTruckQuito</a></h1>
                    <a class="gotoinstagram" href="https://www.instagram.com/foodtruckquito/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/FoodtruckQuito-Instagram.png" alt="Sigue al Instagram de @FoodtruckQuito">
                    </a>
                </article>
                <div class="cornerShadow">
                    <a class="byChoclomedia" href="http://choclomedia.com" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/byChoclomedia.png" alt="Un producto de Choclomedia.com">
                    </a>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/launch.js"></script>
    </body>
</html>