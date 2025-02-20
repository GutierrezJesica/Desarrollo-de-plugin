<?php
// Maneja la creación de eventos en Google Calendar.
// Clase para integración con Google Calendar

class GoogleCalendar {
    private $client;
    private $service;

    public function __construct($token) {
        $this->client = new Google_Client();
        $this->client->setAccessToken($token);
        $this->service = new Google_Service_Calendar($this->client);
    }

    public function agregar_evento($reserva) {
        $evento = new Google_Service_Calendar_Event(array(
            'summary' => 'Viaje a ' . $reserva['destino'],
            'start' => array('dateTime' => $reserva['fecha'], 'timeZone' => 'America/Argentina/Buenos_Aires'),
            'end' => array('dateTime' => date('Y-m-d\TH:i:s', strtotime($reserva['fecha'] . ' +2 hours')), 'timeZone' => 'America/Argentina/Buenos_Aires'),
            'attendees' => array(array('email' => $reserva['email']))
        ));

        return $this->service->events->insert('primary', $evento);
    }
}
?>
