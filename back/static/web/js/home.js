
(function() {
  var $html, contador = 1;

  $(function() {
    $('#btn').on('click', function(){
      if(contador == 1) {
        $('nav').animate({
          left:"0"
        });
        contador = 0;
      }
      else {
        contador = 1;
        $('nav').animate({
          left:"-100%"
        });
      }
    });
    $(".rslides").responsiveSlides({
        auto: true,
        speed: 1000
    });
    $('#name').filter_input({
      regex: '[a-z A-Z ñÑ áéíóú]'
    });
    $('#dni, #phone').filter_input({
      regex: '[0-9]'
    });
    $("form input[type='button']").on('click', function() {
      if ($("form").valid() === true) {
        $(this).off('click');

        $.ajax({
          type: "post",
          url: site + "home/validate",
          dataType: "json",
          data: {
            name:$('#name').val(),
            dni :$('#dni').val(),
            phone : $('#phone').val(),
            agencias : $('#agencias').val(),
            prestamo : $('#prestamo').val(),
            detalles : $('#detalles').val()
          },
          success: function(data) {
            if(data.print==false){
              // alert(data.message);
              $html = ''
              $html += '<p>Lo sentimos, pero hay un problema con el envío. Inténtelo más tarde.</p>'
              return $('article.fila1 > div').fadeOut('slow', function() {
                $(this).html($html).fadeIn('slow');
              });
            }
            else {
              $html = ''
              $html += '<h2>¡Correo enviado! Muchas gracias.</h2>'
              $html += '<p>Te confirmamos que hemos recibido tu consulta, nos pondremos en contacto contigo a la brevedad.<br /><br />Mientras tanto…</p>'
              $html += '<ul>'
                $html += '<li>¡Súmate a nuestros seguidores en <a href="https://www.facebook.com/MaxiefectivoPeru/" target="_blank">Facebook</a> y <a href="https://twitter.com/MaxiefectivoPE" target="_blank">Twitter</a>. Quédate en contacto para enterarte de las últimas promociones.</li>'
                $html += '<li>Te recordamos que nuestra central telefónica es (01) 419 8888.</li>'
                $html += '<li>Puedes visitarnos en cualquiera de nuestras 11 agencias en el país. Conoce más <a href="' + site + 'agencias">haciendo click aquí</a>.</li>'
              $html += '</ul>'
              return $('article.fila1 > div').fadeOut('slow', function() {
                $(this).html($html).fadeIn('slow');
              });
            }
          }
        });

      }
      return false;
    });
    return $("form").validate({
      ignore: "not:hidden, .ignore",
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        dni: {
          required: true,
          minlength: 8,
          maxlength: 8
        },
        phone: {
          required: true,
          minlength: 7,
          maxlength: 9
        },
        agencias: {
          required: true
        },
        prestamo: {
          required: true
        },
        detalles: {
          required: true,
          minlength: 2
        }
      },
      messages: {
        name: {
          required: "",
          minlength: ""
        },
        dni: {
          required: "",
          minlength: "",
          maxlength: ""
        },
        phone: {
          required: "",
          minlength: "",
          maxlength: ""
        },
        agencias: {
          required: ""
        },
        prestamo: {
          required: ""
        },
        detalles: {
          required: "",
          minlength: ""
        }
      }
    });
  });

}).call(this);
