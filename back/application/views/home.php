<article class="fila2"><!-- Slider y banners cuadrados -->
    <figure class="slideshow rslides_container">
        <ul class="rslides">
            <li><img src="<?php echo site_url() ?>static/web/img/banners/undiaparati.jpg" alt="Aproveche nuestros jueves dorados" border="0" /></li>
            <li><img src="<?php echo site_url() ?>static/web/img/banners/4servicios.jpg" alt="4 Servicios a tu alcance" border="0" /></li>
            <li><img src="<?php echo site_url() ?>static/web/img/banners/jueves-dorados.jpg" alt="Aproveche nuestros jueves dorados" border="0" /></li>
        </ul>
    </figure>

    <aside class="caja1">
        <img src="<?php echo site_url() ?>static/web/img/banner-prestamo-oro.jpg" alt="Préstamo oro Maxiefectivo" border="0" />
    </aside>
    <aside class="caja2">
        <img src="<?php echo site_url() ?>static/web/img/banner-prestamo-electro.jpg" alt="Préstamo electro Maxiefectivo" border="0" />
    </aside>
    <aside class="caja3">
        <div class="bannerAgencias">
            <a href="agencias.html"><img src="<?php echo site_url() ?>static/web/img/banner-agencia.jpg" alt="Conoce nuestras agencias" border="0" /></a>
            <a class="enlaceAgencias" href="agencias.html">Conoce nuestras agencias</a>
        </div>
        <div class="bannerLibro">
            <img src="<?php echo site_url() ?>static/web/img/libro-de-reclamaciones.jpg" alt="Libro de reclamaciones" border="0" />
            <a class="enlaceLibro" href="libro-de-reclamaciones.html">Libro de reclamaciones</a>
        </div>
    </aside>
</article>

<article class="fila1"><!-- Formulario de consultas -->
    <div>
        <h2>Consultas en línea</h2>
        <form action="">
            <label class="textoForm">Nombre*</label><br />
            <input type="text" class="campo" name="name" id="name" minlength="2"><br />
            <label class="textoForm">DNI*</label><br />
            <input name="dni" id="dni" type="text" class="campo" minlength="8" maxlength="8"><br />
            <label class="textoForm">Teléfono*</label><br />
            <input type="text" class="campo" name="phone" id="phone" minlength="7" maxlength="9"><br />
            <label class="textoForm">Agencia más cercana*</label><br />
            <select name="agencias" id="agencias" class="campo">
                <option value="">Seleccione...</option>
                <option value="0001">Mall Aventura Plaza Bellavista</option>
                <option value="0002">Psje. Olaya 113 Cercado</option>
                <option value="0003">Av. Gran Chimú 396 SJL</option>
                <option value="0004">Av. Pachacutec 2257 VMT</option>
                <option value="0005">Ciudad Comercial Minka</option>
                <option value="0006">Av. Venezuela 1265 Breña</option>
                <option value="0007">CC Plaza Norte</option>
                <option value="0008">CC Real Plaza Pro</option>
                <option value="0009">CC Plaza del Sol Huacho</option>
                <option value="0010">CC Real Plaza Trujillo</option>
                <option value="0011">CC Mall Aventura Plaza Trujillo</option>
            </select><br />
            <label class="textoForm">Tipo de préstamo*</label><br />
            <select name="prestamo" class="campo" id="prestamo">
                <option value="">Seleccione...</option>
                <option value="0001">Préstamo oro</option>
                <option value="0002">Préstamo electro</option>
            </select><br />
            <label class="textoForm">Detállanos tu consulta*</label><br />
            <textarea name="detalles" id="detalles" cols="30" rows="7" minlength="2"></textarea><br />
            <input type="button" class="boton" value="enviar">
        </form>
    <div>
</article>