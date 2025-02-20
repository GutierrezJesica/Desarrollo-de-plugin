<?php

// Este archivo maneja la autenticación de usuarios con Google
// Clase para autenticación con Google

require_once 'vendor/autoload.php';

class GoogleAuth {
    private $client;

    public function __construct() {
        $this->client = new Google_Client();
        $this->client->setClientId('TU_CLIENT_ID');
        $this->client->setClientSecret('TU_CLIENT_SECRET');
        $this->client->setRedirectUri('URL_REDIRECCION');
        $this->client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
        $this->client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
    }

    public function obtener_url_autenticacion() {
        return $this->client->createAuthUrl();
    }

    public function obtener_datos_usuario($codigo) {
        $this->client->authenticate($codigo);
        $token = $this->client->getAccessToken();
        $oauth2 = new Google_Service_Oauth2($this->client);
        return $oauth2->userinfo->get();
    }
}
?>
