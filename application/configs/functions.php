<?php

function pr($x_array, $x_die=false)
{
    echo '<pre>';
    print_r($x_array);
    echo '</pre>';

    if ($x_die) {
        die();
    }
}

function vd($x_data, $x_die=false)
{
    echo '<pre>';
    var_dump($x_data);
    echo '</pre>';

    if ($x_die) {
        die();
    }
}