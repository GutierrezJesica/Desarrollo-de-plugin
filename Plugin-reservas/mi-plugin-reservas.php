<?php

// Archivo principal del plugin


/**
 * Plugin Name: Reservas de Viajes
 * Plugin URI:  https://tuweb.com
 * Description: Plugin para agendar viajes y sincronizarlos con Google Calendar.
 * Version:     1.0.0
 * Author:      Jesica Gutierrez
 * Author URI:  https://tuweb.com
 */

if (!defined('ABSPATH')) {
    exit; // Seguridad
}

// Definir constantes
define('MI_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MI_PLUGIN_URL', plugin_dir_url(__FILE__));

// Cargar archivos necesarios
require_once MI_PLUGIN_DIR . 'includes/class-reservas.php';
require_once MI_PLUGIN_DIR . 'includes/class-google-auth.php';
require_once MI_PLUGIN_DIR . 'includes/class-google-calendar.php';
require_once MI_PLUGIN_DIR . 'shortcodes/reserva-shortcode.php';

// Activación y desactivación
function activar_mi_plugin() {
    // Crear tabla en la base de datos si es necesario
}
register_activation_hook(__FILE__, 'activar_mi_plugin');

function desactivar_mi_plugin() {
    // Opcional: Eliminar configuraciones
}
register_deactivation_hook(__FILE__, 'desactivar_mi_plugin');
