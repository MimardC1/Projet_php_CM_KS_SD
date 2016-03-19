<?php
/**
 * Created by IntelliJ IDEA.
 * User: F.Hémery
 * Date: 06/12/2014
 * Time: 12:52
 */

// load Composer
require 'vendor/autoload.php';

//    require 'vendor/raveren/kint/Kint.class.php';
    Kint::dump( $_SERVER );
// create demo data
$variable = array(1, 17, "hello", null, array(1, 2, 3));

// use KINT directly (which has been loaded automatically via Composer)
d($variable);