$(document).ready( function() {
    console.log('cargo');
    
    // Owlslider
    $('#park-slider').owlCarousel({
        items:3, // if you want a slider, not a carousel, specify "1" here
        margin: 80,
        loop:true,
        autoPlay:true,
        autoplayHoverPause:false, // if slider is autoplaying, pause on mouse hover
        autoplayTimeout:380,
        autoplaySpeed:800,
        navSpeed:500,
        center: true,
        dots:false, // dots navigation below the slider
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                autoWidth: true
            },
            600:{
                items:2,
                autoWidth: true
            },
            1000:{
                items:3,
                autoWidth: true,
            }
        }
    });
    $('#promo-slider').owlCarousel({
        items:1, // if you want a slider, not a carousel, specify "1" here
        loop:true,
        autoPlay:true,
        autoplayHoverPause:false, // if slider is autoplaying, pause on mouse hover
        autoplayTimeout:380,
        autoplaySpeed:1500,
        navSpeed:500,
        center: true,
        dots:true, // dots navigation below the slider
        responsiveClass:true
    });
    
    // Sending mial via ajax
    $('#user-place-suggest').submit( function(e) {
        console.log('enviando');
        var name = $('input[name=name]');
        var email = $('input[name=email]');
        var phone = $('input[name=phone]');
        var inquiry = $('textarea[name=inquiry]');
        
        $.ajax({
            type        : 'POST', 
            url         : foodtruckquitoAjax.ajaxurl, 
            data        : 
            {
                'action': 'ajaxConversion',
                'action': 'send_mail_via_ajax',
                'g-recaptcha-response': grecaptcha.getResponse(),
                'name' : name.val(),
                'email' : email.val(),
                'phone' : phone.val(),
                'inquiry' : inquiry.val()
            },
            dataType: 'text',
            beforeSend  : function(){
                $('#submit-btn').val('Enviando');    
            },
            error       : function(data){
                console.log(data);
            },
            success     : function(data){
                $('#form-submit-wrapper').html(data);
                console.log(data);
                if( data == 0 ){
                    //show error
                    $('#message-wrapper').html(
                        '<p class="form-message error">' +
                        'Su mensaje no ha podido enviarse. Intentelo mas tarde.' +
                        '</p>'
                    ).css('display','block');
                    $('#submit-btn').val('Send');
                }else{
                    $('#message-wrapper').html(
                        '<p class="form-message success">' +
                        'Gracias por enviar el mensaje. Se pondrán en contacto con usted pronto.' +
                        '</p>'
                    ).css('display','block');
                    //clean inputs
                    name.val('');
                    email.val('');
                    phone.val('');
                    inquiry.val('');
                    $('#submit-btn').val('Enviar');
                    grecaptcha.reset();
                }
            }
        });
        
        // Prevenir que se envie el formulario
        e.preventDefault();
    });
    // Sending mial via ajax
    $('#user-place-suggest-on-search').submit( function(e) {
        console.log('enviando');
        var name = $('input[name=name]');
        var email = $('input[name=email]');
        var phone = $('input[name=phone]');
        var nameofplace = $('input[name=nameofplace]');
        var address = $('textarea[name=address]');
        
        $.ajax({
            type        : 'POST', 
            url         : foodtruckquitoAjax.ajaxurl, 
            data        : 
            {
                'action': 'ajaxConversion',
                'action': 'send_mail_via_ajax_subgest',
                'g-recaptcha-response': grecaptcha.getResponse(),
                'name' : name.val(),
                'email' : email.val(),
                'phone' : phone.val(),
                'nameofplace': nameofplace.val(),
                'address' : address.val()
            },
            dataType: 'text',
            beforeSend  : function(){
                $('#submit-btn').val('Enviando');    
            },
            error       : function(data){
                console.log(data);
            },
            success     : function(data){
                $('#form-submit-wrapper').html(data);
                console.log(data);
                if( data == 0 ){
                    //show error
                    $('#message-wrapper').html(
                        '<p class="form-message error">' +
                        'Su mensaje no ha podido enviarse. Intentelo mas tarde.' +
                        '</p>'
                    ).css('display','block');
                    $('#submit-btn').val('Send');
                }else{
                    $('#message-wrapper').html(
                        '<p class="form-message success">' +
                        'Gracias por enviar el mensaje. Se pondrán en contacto con usted pronto.' +
                        '</p>'
                    ).css('display','block');
                    //clean inputs
                    name.val('');
                    email.val('');
                    phone.val('');
                    nameofplace.val('');
                    address.val('');
                    $('#submit-btn').val('Enviar');
                    grecaptcha.reset();
                }
            }
        });
        
        // Prevenir que se envie el formulario
        e.preventDefault();
    });
});


