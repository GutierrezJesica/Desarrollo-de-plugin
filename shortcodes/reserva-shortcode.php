<?php

// Shortcode para mostrar el formulario
// El usuario podrá reservar viajes desde Elementor.
function mostrar_formulario_reserva() {
    ob_start();
    ?>
    <form id="form-reserva" method="post">
        <input type="text" name="nombre" placeholder="Tu Nombre" required>
        <input type="email" name="email" placeholder="Tu Correo" required>
        <input type="datetime-local" name="fecha" required>
        <input type="text" name="destino" placeholder="Destino" required>
        <button type="submit">Reservar</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('reserva_viaje', 'mostrar_formulario_reserva');
?>
