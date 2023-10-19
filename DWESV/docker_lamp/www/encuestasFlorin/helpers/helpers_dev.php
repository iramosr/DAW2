<?php
function dev($data){
    $format = print_r('<pre>');
    $format .= var_export($data);
    $format .= print_r('</pre>');
    return $format;

}