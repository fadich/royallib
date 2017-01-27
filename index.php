<?php

require "autoloader.php";
require "error_handler.php";




$matrix =  new \royallib\type\Matrix();

$matrix->value = [
    '123',
    [
        8 => 8.8956,
    ]

//    [
//        new Error(),
//        new \royallib\type\Matrix()
//    ]
];


$res = $matrix->multiImplode();














echo '<pre>';

//var_dump($matrix->multiImplode());


var_dump(get_defined_vars());
die;