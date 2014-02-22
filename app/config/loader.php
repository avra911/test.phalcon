<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(array(
    'Ips\Forms' => $config->application->formsDir,
));

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->formsDir,
        $config->application->modelsDir
    )
)->register();
