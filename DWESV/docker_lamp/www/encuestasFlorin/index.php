<?php
require_once 'config/config.php';
require_once 'helpers/helpers.php';
require_once 'helpers/helpers_dev.php';


use libs\App;

spl_autoload_register(function ($clase){
    $file = str_replace('\\', '/', $clase) . '.php';
   // dev($file);
    if (file_exists($file)){
        require_once $file;
    }
});
//echo "1";
$app = new App();


//echo "2";
//echo "FUNCIONA";