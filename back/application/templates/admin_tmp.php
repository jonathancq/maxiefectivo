<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Préstamos en minutos con garantía de joyas de oro y electro. Somos la opción más rápida, segura y conveniente del mercado. Más de 10 años de experiencia nos han permitido conocer lo que nuestros clientes valoran de nuestro servicio, lo que nos motiva a brindarle siempre lo mejor.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Maxiefectivo Préstamos en minutos</title>
    <?php if($this->uri->segment(1)!="") { ?>
        <link rel="stylesheet" href="<?php echo site_url() ?>static/web/css/interior.min.css" />
    <?php }else{?>
        <link rel="stylesheet" href="<?php echo site_url() ?>static/web/css/index.min.css" />
     <?php }?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url(); ?>static/web/favicon.ico" />
</head>
<body>
    <header>
        <div class="logo">
            <a href="<?php echo site_url() ?>"><img src="<?php echo site_url() ?>static/web/img/logotipo-maxiefectivo.png" alt="Maxiefectivo Préstamos en minutos" border="0" /></a>
        </div>
        <i id="btn" class="fa fa-bars fa-3x btnMenu"></i><!-- Icono de 3 barras -->
        <nav><!-- Menues -->
            <ul class="menuSecundario">
                <li class="itemMenuSecundario"><a href="https://twitter.com/MaxiefectivoPE" target="_blank"><i class="fa fa-twitter fa-lg"></i></a></li>
                <li class="itemMenuSecundario"><a href="https://www.facebook.com/MaxiefectivoPeru/" target="_blank"><i class="fa fa-facebook-official fa-lg"></i></a></li>
                <li class="itemMenuSecundario"><a href="#">Trabaja con nosotros</a></li>
                <li class="itemMenuSecundario"><a href="#">Atención al cliente</a></li>
            </ul>
            <ul class="menuPrincipal">
                <li class="itemMenuPrincipal"><a href="<?php echo site_url().'nosotros' ?>">nosotros</a></li>
                <li class="itemMenuPrincipal"><a href="<?php echo site_url().'servicios' ?>">servicios</a></li>
                <li class="itemMenuPrincipal"><a href="<?php echo site_url().'agencias' ?>">agencias</a></li>
                <li class="itemMenuPrincipal"><a href="<?php echo site_url().'noticias' ?>">noticias</a></li>
                <li class="itemMenuPrincipal"><a href="#">promociones</a></li>
            </ul>
        </nav>
    </header>
    <section>
    <?php echo $body; ?>
    </section>
    <footer><!-- pie de página -->
        <ul>
            <li class=""><a href="<?php echo site_url().'nosotros' ?>">Nosotros</a></li>
            <li class=""><a href="<?php echo site_url().'servicios' ?>">Servicios</a></li>
            <li class=""><a href="<?php echo site_url().'agencias' ?>">Agencias</a></li>
            <li class=""><a href="<?php echo site_url().'noticias' ?>">Noticias</a></li>
            <li class=""><a href="#">Promociones</a></li>
            <li class=""><a href="#">Atención al cliente</a></li>
            <li class=""><a href="#">Trabaja con nosotros</a></li>
        </ul>
        <p>Maxiefectivo Perú 2015 © Derechos Reservados</p>
    </footer>
    <script> var site = "<?php echo site_url(); ?>"; </script>
    <script src="<?php echo site_url() ?>static/web/js/js.min.js"></script>
</body>
</html>