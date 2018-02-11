<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="300">
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
            /* Get the bourbon mixin from http://bourbon.io */
            /* Reset */
            .flip-clock-wrapper * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                backface-visibility: hidden;
            }
            .flip-clock-wrapper a {
                cursor: pointer;
                text-decoration: none;
                color: #ccc; }
            .flip-clock-wrapper a:hover {
                color: #fff; }
            .flip-clock-wrapper ul {
                list-style: none; }
            .flip-clock-wrapper.clearfix:before,
            .flip-clock-wrapper.clearfix:after {
                content: " ";
                display: table; }
            .flip-clock-wrapper.clearfix:after {
                clear: both; }
            .flip-clock-wrapper.clearfix {
                *zoom: 1; }
            /* Main */
            .flip-clock-wrapper {
                font: normal 11px "Helvetica Neue", "Arial" Helvetica, sans-serif;
                -webkit-user-select: none; }
            .flip-clock-meridium {
                background: none !important;
                box-shadow: 0 0 0 !important;
                font-size: 36px !important; }
            .flip-clock-meridium a { color: #313333; }
            .flip-clock-wrapper {
                text-align: center;
                position: relative;
                width: 100%;
                margin: 1em;
            }
            .flip-clock-wrapper:before,
            .flip-clock-wrapper:after {
                content: " "; /* 1 */
                display: table; /* 2 */
            }
            .flip-clock-wrapper:after {
                clear: both;
            }
            /* Skeleton */
            .flip-clock-wrapper ul {
                position: relative;
                float: left;
                margin: 5px;
                width: 60px;
                height: 90px;
                font-size: 80px;
                font-weight: bold;
                line-height: 87px;
                border-radius: 6px;
                background: #000;
            }
            .flip-clock-wrapper ul li {
                z-index: 1;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                line-height: 87px;
                text-decoration: none !important;
            }
            .flip-clock-wrapper ul li:first-child {
                z-index: 2; }
            .flip-clock-wrapper ul li a {
                display: block;
                height: 100%;
                -webkit-perspective: 200px;
                -moz-perspective: 200px;
                perspective: 200px;
                margin: 0 !important;
                overflow: visible !important;
                cursor: default !important; }
            .flip-clock-wrapper ul li a div {
                z-index: 1;
                position: absolute;
                left: 0;
                width: 100%;
                height: 50%;
                font-size: 80px;
                overflow: hidden; 
                outline: 1px solid transparent; }
            .flip-clock-wrapper ul li a div .shadow {
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: 2; }
            .flip-clock-wrapper ul li a div.up {
                -webkit-transform-origin: 50% 100%;
                -moz-transform-origin: 50% 100%;
                -ms-transform-origin: 50% 100%;
                -o-transform-origin: 50% 100%;
                transform-origin: 50% 100%;
                top: 0; }
            .flip-clock-wrapper ul li a div.up:after {
                content: "";
                position: absolute;
                top: 44px;
                left: 0;
                z-index: 5;
                width: 100%;
                height: 3px;
                background-color: #000;
                background-color: rgba(0, 0, 0, 0.4); }
            .flip-clock-wrapper ul li a div.down {
                -webkit-transform-origin: 50% 0;
                -moz-transform-origin: 50% 0;
                -ms-transform-origin: 50% 0;
                -o-transform-origin: 50% 0;
                transform-origin: 50% 0;
                bottom: 0;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
            }
            .flip-clock-wrapper ul li a div div.inn {
                position: absolute;
                left: 0;
                z-index: 1;
                width: 100%;
                height: 200%;
                color: #ccc;
                text-shadow: 0 1px 2px #000;
                text-align: center;
                background-color: #333;
                border-radius: 6px;
                font-size: 70px; }
            .flip-clock-wrapper ul li a div.up div.inn {
                top: 0; }
            .flip-clock-wrapper ul li a div.down div.inn {
                bottom: 0; }
            /* PLAY */
            .flip-clock-wrapper ul.play li.flip-clock-before {
                z-index: 3; }
            .flip-clock-wrapper .flip {   box-shadow: 0 2px 5px rgba(0, 0, 0, 0.7); }
            .flip-clock-wrapper ul.play li.flip-clock-active {
                -webkit-animation: asd 0.5s 0.5s linear both;
                -moz-animation: asd 0.5s 0.5s linear both;
                animation: asd 0.5s 0.5s linear both;
                z-index: 5; }
            .flip-clock-divider {
                float: left;
                display: inline-block;
                position: relative;
                width: 20px;
                height: 100px; }
            .flip-clock-divider:first-child {
                width: 0; }
            .flip-clock-dot {
                display: block;
                background: #323434;
                width: 10px;
                height: 10px;
                position: absolute;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
                left: 5px; }
            .flip-clock-divider .flip-clock-label {
                position: absolute;
                top: -1.5em;
                right: -86px;
                color: black;
                text-shadow: none; }
            .flip-clock-divider.minutes .flip-clock-label {
                right: -88px; }
            .flip-clock-divider.seconds .flip-clock-label {
                right: -91px; }
            .flip-clock-dot.top {
                top: 30px; }
            .flip-clock-dot.bottom {
                bottom: 30px; }
            @-webkit-keyframes asd {
                0% {
                    z-index: 2; }
                20% {
                    z-index: 4; }
                100% {
                    z-index: 4; } }
            @-moz-keyframes asd {
                0% {
                    z-index: 2; }
                20% {
                    z-index: 4; }
                100% {
                    z-index: 4; } }
            @-o-keyframes asd {
                0% {
                    z-index: 2; }
                20% {

                    z-index: 4; }
                100% {
                    z-index: 4; } }
            @keyframes asd {
                0% {
                    z-index: 2; }
                20% {
                    z-index: 4; }
                100% {
                    z-index: 4; } }
            .flip-clock-wrapper ul.play li.flip-clock-active .down {
                z-index: 2;
                -webkit-animation: turn 0.5s 0.5s linear both;
                -moz-animation: turn 0.5s 0.5s linear both;
                animation: turn 0.5s 0.5s linear both; }
            @-webkit-keyframes turn {
                0% {
                    -webkit-transform: rotateX(90deg); }
                100% {
                    -webkit-transform: rotateX(0deg); } }
            @-moz-keyframes turn {
                0% {
                    -moz-transform: rotateX(90deg); }
                100% {
                    -moz-transform: rotateX(0deg); } }
            @-o-keyframes turn {
                0% {
                    -o-transform: rotateX(90deg); }
                100% {
                    -o-transform: rotateX(0deg); } }
            @keyframes turn {
                0% {
                    transform: rotateX(90deg); }
                100% {
                    transform: rotateX(0deg); } }
            .flip-clock-wrapper ul.play li.flip-clock-before .up {
                z-index: 2;
                -webkit-animation: turn2 0.5s linear both;
                -moz-animation: turn2 0.5s linear both;
                animation: turn2 0.5s linear both; }
            @-webkit-keyframes turn2 {
                0% {
                    -webkit-transform: rotateX(0deg); }
                100% {
                    -webkit-transform: rotateX(-90deg); } }
            @-moz-keyframes turn2 {
                0% {
                    -moz-transform: rotateX(0deg); }
                100% {
                    -moz-transform: rotateX(-90deg); } }
            @-o-keyframes turn2 {
                0% {
                    -o-transform: rotateX(0deg); }
                100% {
                    -o-transform: rotateX(-90deg); } }
            @keyframes turn2 {
                0% {
                    transform: rotateX(0deg); }
                100% {
                    transform: rotateX(-90deg); } }
            .flip-clock-wrapper ul li.flip-clock-active {
                z-index: 3; }
            /* SHADOW */
            .flip-clock-wrapper ul.play li.flip-clock-before .up .shadow {
                background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0.1)), color-stop(100%, black));
                background: linear, top, rgba(0, 0, 0, 0.1) 0%, black 100%;
                background: -o-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: -ms-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: linear, to bottom, rgba(0, 0, 0, 0.1) 0%, black 100%;
                -webkit-animation: show 0.5s linear both;
                -moz-animation: show 0.5s linear both;
                animation: show 0.5s linear both; }
            .flip-clock-wrapper ul.play li.flip-clock-active .up .shadow {
                background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0.1)), color-stop(100%, black));
                background: linear, top, rgba(0, 0, 0, 0.1) 0%, black 100%;
                background: -o-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: -ms-linear-gradient(top, rgba(0, 0, 0, 0.1) 0%, black 100%);
                background: linear, to bottom, rgba(0, 0, 0, 0.1) 0%, black 100%;
                -webkit-animation: hide 0.5s 0.3s linear both;
                -moz-animation: hide 0.5s 0.3s linear both;
                animation: hide 0.5s 0.3s linear both; }
            /*DOWN*/
            .flip-clock-wrapper ul.play li.flip-clock-before .down .shadow {
                background: -moz-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, black), color-stop(100%, rgba(0, 0, 0, 0.1)));
                background: linear, top, black 0%, rgba(0, 0, 0, 0.1) 100%;
                background: -o-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: -ms-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: linear, to bottom, black 0%, rgba(0, 0, 0, 0.1) 100%;
                -webkit-animation: show 0.5s linear both;
                -moz-animation: show 0.5s linear both;
                animation: show 0.5s linear both; }
            .flip-clock-wrapper ul.play li.flip-clock-active .down .shadow {
                background: -moz-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, black), color-stop(100%, rgba(0, 0, 0, 0.1)));
                background: linear, top, black 0%, rgba(0, 0, 0, 0.1) 100%;
                background: -o-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: -ms-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.1) 100%);
                background: linear, to bottom, black 0%, rgba(0, 0, 0, 0.1) 100%;
                -webkit-animation: hide 0.5s 0.3s linear both;
                -moz-animation: hide 0.5s 0.3s linear both;
                animation: hide 0.5s 0.2s linear both; }
            @-webkit-keyframes show {
                0% {
                    opacity: 0; }
                100% {
                    opacity: 1; } }
            @-moz-keyframes show {
                0% {
                    opacity: 0; }
                100% {
                    opacity: 1; } }
            @-o-keyframes show {
                0% {
                    opacity: 0; }
                100% {
                    opacity: 1; } }
            @keyframes show {
                0% {
                    opacity: 0; }
                100% {
                    opacity: 1; } }
            @-webkit-keyframes hide {
                0% {
                    opacity: 1; }
                100% {
                    opacity: 0; } }
            @-moz-keyframes hide {
                0% {
                    opacity: 1; }
                100% {
                    opacity: 0; } }
            @-o-keyframes hide {
                0% {
                    opacity: 1; }
                100% {
                    opacity: 0; } }
            @keyframes hide {
                0% {
                    opacity: 1; }
                100% {
                    opacity: 0; } 
            }
            .flip-clock-divider .flip-clock-label
            {
                color: white !important;
                font-weight: bold;
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
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-93837190-1', 'auto');
            ga('send', 'pageview');
        </script>
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
                    <div class="the-clock" style="display:block;margin: 3rem;
    margin-left: 170px;"></div>
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
        <script src="<?php echo get_template_directory_uri(); ?>/js/flipclock.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/launch.js"></script>
    </body>

</html>