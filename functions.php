<?php
    
    // Foodtruck Quito theme functions
    //requerir los CPTs
    require_once('includes/foodtruckquito-cpt.php');
    require_once('includes/foodtruckquito-meta.php');
    require_once('includes/foodtruckquito-taxonomies.php');

    function foodtruckquito_setup(){

        load_theme_textdomain( 'foodtruckquito', 
                              get_template_directory() 
                              . '/languages/' );
        /* Theme components */
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'html5', array(
            'search-form', 
            'comment-form', 
            'comment-list', 
            'gallery', 
            'caption'
        ) );

        add_theme_support( 'post-thumbnails' );


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }
    add_action( 'after_setup_theme', 'foodtruckquito_setup' );

    function poner_los_scripts(){
        if( !is_admin() ){
            wp_deregister_script('jquery');  

            // Load a copy of jQuery from the Google API CDN  
            // The last parameter set to TRUE states that it should be loaded  
            // in the footer.  
            wp_register_script(
                'jquery', 
                'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', 
                FALSE, 
                '1.11.0', 
                TRUE
            );  

            wp_enqueue_script('jquery');  
        }
        // Including Bootstrap, Owlcarousel and PrettyPhoto files
        wp_enqueue_style( 
            'bootstrap', 
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', 
            array(), 
            '3.3.7', 
            'all' 
        );
        wp_enqueue_style( 'owlslider', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltransition', get_template_directory_uri() . '/css/owl.transitions.css', array(), '2.2.0', null );
        wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
        //wp_enqueue_script( 'instafeed', get_stylesheet_directory_uri() . '/js/instafeed.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'owlsliderjs', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );
        //wp_enqueue_script( 'sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array('jquery'), null, true );
        if (is_tax() || is_single()){
            wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/slimbox2.css', array(), '2.2.0', null );
            wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/js/slimbox2.js', array('jquery'), null, true );
        }
        // Including theme styles
        wp_enqueue_style( 'foodtruckquito_common', get_template_directory_uri() . '/css/foodtruckquito.css', array(), '1.1', 'all');
        wp_enqueue_style( 'foodtruckquito_fonts', 'https://fonts.googleapis.com/css?family=Lato|Merriweather', array(), '', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_register_script( 'foodtruckquito', get_template_directory_uri() .'/js/launch.js', array('jquery') );
        wp_localize_script( 'foodtruckquito', 'foodtruckquitoAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));  
        wp_localize_script( 'wp-api', 'wpApiSettings', array( 'root' => esc_url_raw( rest_url() ), 'nonce' => wp_create_nonce( 'wp_rest' ) ) );

        wp_enqueue_script( 'foodtruckquito', get_template_directory_uri() . '/js/launch.js', array ( 'jquery' ), '1.1', true);
    }
    add_action( 'wp_enqueue_scripts', 'poner_los_scripts' );

    //Widget support
    if (function_exists('register_nav_menus')) {
        register_nav_menus( array(
            'languages-nav' => __( 'Lenguajes', 'foodtruckquito' ),
            'sidebar-nav' => __( 'Navegacion Alterna Sidebar', 'foodtruckquito' )
        ) );
    };
    if (function_exists('register_sidebar')) {
        register_sidebar( array(
            'name'          => __( 'Multi Idioma', 'foodtruckquito' ),
            'id'            => 'translation',
            'description'   => __( 'Uso exclusivo del qTranslate-x', 'foodtruckquito' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );
    };
    /* Pagination Support */

    function numeric_posts_nav() {

        if( is_singular() )
            return;

        global $wp_query;

        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 )
            return;

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );

        /**	Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;

        /**	Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
        echo '<hr />';
        echo '<div class="navigation">';
        echo '<div class="row">';

        //	Previous Post Link 
        echo '<div class="col-sm-3">';
        if ($paged == 1){
            echo '<span class="deactivated-nav">'._e('Anterior','foodtruckquito').'</span>';
        }else{
            if ( get_previous_posts_link() )
            echo get_previous_posts_link( _x('Anterior','foodtruckquito') );   
        }
        echo '</div>';
        echo '<div class="col-sm-6 text-center">';

        // List begins
        echo '<ul class="list-inline">' . "\n";

        /**	Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

            if ( ! in_array( 2, $links ) )
                echo '<li>…</li>';
        }

        /**	Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );
        foreach ( (array) $links as $link ) {
            $class = $paged == $link ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        }

        /**	Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) {
            if ( ! in_array( $max - 1, $links ) )
                echo '<li>…</li>' . "\n";

            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }

        // List ends
        echo '</ul></div>' . "\n";

        // Next Post Link
        echo '<div class="col-sm-3 text-right">';
        if ( $paged == $max ){
            echo '<span class="deactivated-nav">'._e('Siguiente','foodtruckquito').'</span>';
        }else{
            if ( get_next_posts_link() )
            echo get_next_posts_link( _x('Siguiente','foodtruckquito') );   
        }
        echo '</div>';

        // Close navigation row and container
        echo '</div>';
        echo '</div>';

    }

    function abiertosHoy(){
        date_default_timezone_set('America/Bogota');
        $dia =  date('D', current_time( 'timestamp', 1 ));
        switch ($dia){
            case 'Mon': $dia = 'lunes'; break;
            case 'Tue': $dia = 'martes'; break;
            case 'Wed': $dia = 'miercoles'; break;
            case 'Thu': $dia = 'jueve'; break;
            case 'Fri': $dia = 'viernes'; break;
            case 'Sat': $dia = 'sabado'; break;
            case 'Sun': $dia = 'domingo'; break;
        }
        $args = array(
            'post_type' => 'foodtruck',
            'posts_per_page' => 4,
            'tax_query' => array(
                array(
                    'taxonomy' => 'horario',
                    'terms' => $dia,
                    'field' => 'slug'
                )
            ),
            'orderby' => 'rand'
        );
        $foodtrucks = get_posts( $args );
        //var_dump ($foodtrucks);
        echo '<div class="abiertosHoy hidden-xs">';
        echo '<i class="zmdi zmdi-store filter-section-icon"></i>';
        echo '<h3 class="text-center">' . _x('Establecimientos abiertos hoy','foodtruckquito') . '</h3>';
        echo '<ul class="">';
        foreach ($foodtrucks as $foodtruck){
            echo '<li><a href="' . get_permalink( $foodtruck->ID ) . '"><span class="abiertoHoy">' . $foodtruck->post_title . '</span></a></li>';
        }
        echo '</ul>';
        echo '<a class="show-archive sidebar" href="'. home_url('establecimientos-abiertos-los') . '/' . $dia .'">';
        _e('Quiero verlos todos!','foodtruckquito');
        echo '</a>';
        echo '</div>';
    }

/*

if (qtranxf_getLanguage() == 'en') {
// run code here if the current language is English
} elseif (qtranxf_getLanguage() == 'de') {
// run code here if the current language is German
}

*/
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('foodtruck'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
    return $query;
    }
}
add_action( 'pre_get_posts', 'sk_portfolio_archive_random' );
/**
 * Set Random order for entries in Portfolio archive page
 *
 * @author Bill Erickson
 * @author Sridhar Katakam
 * @link http://www.billerickson.net/customize-the-wordpress-query/
 * @param object $query data
 *
 */
function sk_portfolio_archive_random( $query ) {

	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'foodtruck' ) ) {
		$query->set( 'orderby', 'rand' );
	}
    if ( $query->is_tax() ){
        $query->set( 'orderby', 'rand' );
    }
    if ( $query->is_tag() ){
        $query->set( 'orderby', 'rand' );
    }
}

/* Send ajax mail */
function send_mail_via_ajax(){

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $inquiry = filter_input(INPUT_POST, 'inquiry');

    // Google reCaptcha features
    $secret = "6Lc1Ch0UAAAAALVmIyV_K8Bf5uspZL09RfwzY_JH";
    $response = null;

    $path = 'https://www.google.com/recaptcha/api/siteverify?';
    $path .= 'secret=' . $secret;
    $path .= '&remoteip=' . $_SERVER["REMOTE_ADDR"];
    $path .= '&v=php_1.0';
    $path .= '&response='. $_POST["g-recaptcha-response"];

    $response = file_get_contents( $path );

    $answers = json_decode($response, true);

    if ( $response != null && trim($answers ['success']) == true ) {

        ob_start();
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana, Helvetica;">
        <tr style="background-color: #232323;">
            <td align="center">
                <h1>Usted tiene un mensaje!</h1>
            </td>
        </tr>
        <tr>
            <td style="color:#222222!important; padding: 30px;">
                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 35px;">Informacion del contacto</h2>
                <p><strong>Nombre:</strong> <?php echo $name ?></p>
                <p><strong>Telefono:</strong> <a href="phone:<?php echo $phone ?>"><?php echo $phone ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>

                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 70px;">Contenido del Mensaje</h2>
                <p style="font-size:20px;"><?php echo $inquiry ?></p>
            </td>
        </tr>
        <tr style="background-color: #FF3C00; color: #ffffff; margin-top: 35px;">
            <td align="center">
                <p style="margin-top:35px;margin-bottom:35px;">Este email fue enviado desde Food Truck Quito Website, el <?php echo date("d/m/Y") ?> a las <?php echo date("h:i") ?></p>
            </td>
        </tr>
    </table>
</table>
<?php
            $body = ob_get_clean();

        //$contacto = get_page_by_path('contact');
        //$mail_admin = get_post_meta($contacto->ID, 'em', true);
        //$to = 'colocar un solo email';
        $subject = 'Genia! un mensaje para usted. - Food Truck Quito';

        require_once ABSPATH . WPINC . '/class-phpmailer.php';

        $mail = new PHPMailer( true );

        //$mail->AddAddress($to);
        $mail->AddAddress('jmrpadrino@gmail.com', 'First Contact');
        $mail->AddAddress('contacto@choclomedia.com', 'Second Contact');
        $mail->FromName = 'Contacto - Food Truck Quito';
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML();
        $mail->CharSet = 'utf-8';
        $mail->Send();
        echo trim($answers ['success']);
        /*try {
            $mail->AddAddress($to);
            $mail->FromName = 'Sentry Wellhead Systems - Contact';
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->IsHTML();
            $mail->CharSet = 'utf-8';
            $mail->Send();
            echo trim($answers ['success']);
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo trim($answers ['success']);
          echo $e->getMessage(); //Boring error messages from anything else!
        }*/
    }else{
        echo trim($answers ['success']);
    }
}
add_action('wp_ajax_send_mail_via_ajax', 'send_mail_via_ajax');
add_action('wp_ajax_nopriv_send_mail_via_ajax', 'send_mail_via_ajax');

/* Send ajax mail */
function send_mail_via_ajax_subgest(){

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $nameofplace = filter_input(INPUT_POST, 'nameofplace');
    $address = filter_input(INPUT_POST, 'address');

    // Google reCaptcha features
    $secret = "6Lc1Ch0UAAAAALVmIyV_K8Bf5uspZL09RfwzY_JH";
    $response = null;

    $path = 'https://www.google.com/recaptcha/api/siteverify?';
    $path .= 'secret=' . $secret;
    $path .= '&remoteip=' . $_SERVER["REMOTE_ADDR"];
    $path .= '&v=php_1.0';
    $path .= '&response='. $_POST["g-recaptcha-response"];

    $response = file_get_contents( $path );

    $answers = json_decode($response, true);

    if ( $response != null && trim($answers ['success']) == true ) {

        ob_start();
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#cccccc" style="width: 100%;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin-top:35px;margin-bottom:35px;font-family:Verdana, Helvetica;">
        <tr style="background-color: #232323;">
            <td align="center">
                <h1>Enviaron una sugerenia!</h1>
            </td>
        </tr>
        <tr>
            <td style="color:#222222!important; padding: 30px;">
                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 35px;">Informacion del contacto</h2>
                <p><strong>Nombre:</strong> <?php echo $name ?></p>
                <p><strong>Telefono:</strong> <a href="phone:<?php echo $phone ?>"><?php echo $phone ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                <p><strong>Nombre del Sitio:</strong> <a href="mailto:<?php echo $nameofplace ?>"><?php echo $nameofplace ?></a></p>

                <h2 style="color:#ff3c00;text-transform:uppercase;font-weight:800;margin-top: 70px;">Direccion del sitio</h2>
                <p style="font-size:20px;"><?php echo $address ?></p>
            </td>
        </tr>
        <tr style="background-color: #FF3C00; color: #ffffff; margin-top: 35px;">
            <td align="center">
                <p style="margin-top:35px;margin-bottom:35px;">Este email fue enviado desde Food Truck Quito Website, el <?php echo date("d/m/Y") ?> a las <?php echo date("h:i") ?></p>
            </td>
        </tr>
    </table>
</table>
<?php
            $body = ob_get_clean();

        //$contacto = get_page_by_path('contact');
        //$mail_admin = get_post_meta($contacto->ID, 'em', true);
        //$to = 'colocar un solo email';
        $subject = 'Genia! hay una sugerencia. - Food Truck Quito';

        require_once ABSPATH . WPINC . '/class-phpmailer.php';

        $mail = new PHPMailer( true );

        //$mail->AddAddress($to);
        $mail->AddAddress('jmrpadrino@gmail.com', 'First Contact');
        $mail->AddAddress('sugerencias@foodtruckquito.com.ec', 'Second Contact');
        $mail->FromName = 'Sugerencia - Food Truck Quito';
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML();
        $mail->CharSet = 'utf-8';
        $mail->Send();
        echo trim($answers ['success']);
        /*try {
            $mail->AddAddress($to);
            $mail->FromName = 'Sentry Wellhead Systems - Contact';
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->IsHTML();
            $mail->CharSet = 'utf-8';
            $mail->Send();
            echo trim($answers ['success']);
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo trim($answers ['success']);
          echo $e->getMessage(); //Boring error messages from anything else!
        }*/
    }else{
        echo trim($answers ['success']);
    }
}
add_action('wp_ajax_send_mail_via_ajax_subgest', 'send_mail_via_ajax_subgest');
add_action('wp_ajax_nopriv_send_mail_via_ajax_subgest', 'send_mail_via_ajax_subgest');

// Edit term page
function taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[patio_direccion]"><?php _e( 'Dirección del Patio', 'foodtruckquito' ); ?></label></th>
		<td>
            <textarea class="qtranxs-translatable" name="term_meta[patio_direccion]" id="term_meta[patio_direccion]"><?php echo esc_attr( $term_meta['patio_direccion'] ) ? esc_attr( $term_meta['patio_direccion'] ) : ''; ?></textarea>
			<p class="description"><?php _e( 'Indique la direccion de la plaza','foodtruckquito' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'patios_edit_form_fields', 'taxonomy_edit_meta_field', 1, 2 );
// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_patios', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_patios', 'save_taxonomy_custom_meta', 10, 2 );

?>