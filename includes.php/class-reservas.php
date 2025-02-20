<?php

// Este archivo maneja la creación y almacenamiento de reservas.
// Clase para gestionar reservas

class Reservas {
    public function __construct() {
        add_action('init', array($this, 'crear_tabla_reservas'));
    }

    public function crear_tabla_reservas() {
        global $wpdb; // $wpdb hace consultas a la BD de wordpress
        $tabla = $wpdb->prefix . 'reservas_viajes';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $tabla (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id INT NOT NULL,
            nombre VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            fecha DATETIME NOT NULL,
            destino VARCHAR(255) NOT NULL,
            status VARCHAR(50) DEFAULT 'pendiente'
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    public function guardar_reserva($datos) {
        global $wpdb;
        $tabla = $wpdb->prefix . 'reservas_viajes';

        $wpdb->insert($tabla, array(
            'usuario_id' => $datos['usuario_id'],
            'nombre'     => $datos['nombre'],
            'email'      => $datos['email'],
            'fecha'      => $datos['fecha'],
            'destino'    => $datos['destino'],
            'status'     => 'pendiente'
        ));

        return $wpdb->insert_id;
    }
}

new Reservas();
?>
