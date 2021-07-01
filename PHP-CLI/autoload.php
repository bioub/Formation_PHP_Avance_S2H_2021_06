<?php

$configPsr4 = [
    'Openska\\' =>  __DIR__ . '/lib/',
];

// FQCN : Fully Qualified Class Name
// le nom complet de la classe avec ses namespaces préfixes
// ex : Openska\Entity\Contact

spl_autoload_register(function ($fqcn) use ($configPsr4) {

    $matchPrefix = '';
    $matchBaseDir = '';

    foreach ($configPsr4 as $prefix => $base_dir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $fqcn, $len) === 0) {
            $matchPrefix = $prefix;
            $matchBaseDir = $base_dir;
            break;
        }
    }

    // does the class use the namespace prefix?
    $len = strlen($matchPrefix);

    // get the relative class name
    $relative_class = substr($fqcn, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $matchBaseDir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});