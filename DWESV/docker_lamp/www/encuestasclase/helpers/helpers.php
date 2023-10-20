<?php
function fullPath($path, $filename){
    if(substr($path, -1) === "/"){
        $path = rtrim($path, "/");
    }
    if(substr($filename,1) === "/"){
        $filename = ltrim($filename, "/");
    }
    return $path . "/" . $filename;
}