<?php

if (false === class_exists('Symfony\Component\ClassLoader\UniversalClassLoader', false)) {
  require_once __DIR__.'/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';
}

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'   => __DIR__.'/vendor'
  , 'Guzzle'    => __DIR__.'/vendor/oauth2-php/vendor/guzzle/src'
  , 'OAuth2'    => __DIR__.'/vendor/oauth2-php/src'
  , 'MultiPass' => __DIR__.'/src'
));
$loader->register();
