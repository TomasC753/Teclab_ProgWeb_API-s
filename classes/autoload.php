<?php

define("DS", DIRECTORY_SEPARATOR);

function appAutoLoad($className) {
    $className = str_replace("\\", DS, $className).".php";
    require_once $className;
}

spl_autoload_register("appAutoLoad");