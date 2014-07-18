<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app['env'] = $_ENV['env'] ?: 'dev';

$app->register(
    new Igorw\Silex\ConfigServiceProvider(
        __DIR__ . '/config/' . $app['env'] . '.json'
    )
);

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Inscriptus\API\Core\Providers\DependencyProvider());

$app->register(new Inscriptus\API\Index\Providers\DependencyProvider());
$app->mount('/', new Inscriptus\API\Index\Providers\ControllerProvider());

//$app->register(new Inscriptus\API\Pages\Providers\DependencyProvider());
//$app->mount('/pages', new Inscriptus\API\Pages\Providers\ControllerProvider());

//$app->register(new Inscriptus\API\Posts\Providers\DependencyProvider());
//$app->mount('/posts', new Inscriptus\API\Posts\Providers\ControllerProvider());

//$app->register(new Inscriptus\API\Users\Providers\DependencyProvider());
//$app->register('/users', new Inscriptus\API\Users\Providers\ControllerProvider());

return $app;
