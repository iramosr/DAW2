<?php

namespace services;


use dao\LogsDao;

require_once "dao/LogsDao.php";

class LogService{

    private static function logToDatabase($logType, $logMessage){
        $logDao = new LogsDao();
        $logDao->insertLog($logType, $logMessage);
    }

    private static function createDirectoryLog(){
        $path = fullPath(APP_PATH, 'log');
        if (!file_exists($path)){
            if(!mkdir($path)) {
                die("No se puede crear el directorio log");
            }
        }
    }

    private static function line($type, $msg){
        self::createDirectoryLog();
        $fecha = date("Y-m-d H:i:s");
        $linea = $type.":".$fecha.":".$msg."\n";
        $path = fullPath(APP_PATH, 'log/log_'.date("Y-m-d").".log");
        file_put_contents($path, $linea, FILE_APPEND);
    }
    public static function info($msg){
        self::logToDatabase("INFO", $msg);
        self::line("INFO", $msg);

    }

    public static function error($msg){
        self::logToDatabase("ERROR", $msg);
        self::line("ERROR", $msg);
    }

    public static function debug($msg){
        self::logToDatabase("DEBUG", $msg);
        self::line("DEBUG", $msg);
    }

    public static function warning($msg){
        self::logToDatabase("WARNING", $msg);
        self::line("WARNING", $msg);
    }

    # --------------------------------------------
    # Hace lo mismo que las otras 4 pero en vez de
    # tener que llamar a cada una, simplemente se
    # pasa el tipo de log y el mensaje
    # --------------------------------------------
    public static function log($type, $msg){
        self::logToDatabase(strtoupper($type), $msg);
        self::line(strtoupper($type), $msg);

    }
}