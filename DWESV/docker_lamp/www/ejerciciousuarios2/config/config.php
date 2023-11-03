<?php
function url(){
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    $app = isset($uri[1]) ? $uri[1] : '';
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . '/' . $app;
}

define('APP_NAME','ejerciciousuarios2');
define('BASE_URL',url());

# Define la BD
define ('DB_HOST', 'db:3306');
define ('DB_NAME', 'dwesv');
define ('DB_USER', 'dwesv');
define ('DB_PASSWORD', 'castelar');
define('DB_CHARSET','utf8mb4');

# Directiorios Uploads
define('UPLOAD', APP_PATH.'/uploads');
define('UPLOAD_FOTOS', UPLOAD.'/fotos');
define('UPLOAD_FOTOS_CLIENTES', UPLOAD_FOTOS.'/clientes');
define('UPLOAD_FOTOS_USUARIOS', UPLOAD_FOTOS.'/usuarios');