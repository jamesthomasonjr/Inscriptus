<?php
namespace Inscriptus\API\Index\Providers; 

use \Silex\Application;
use \Silex\ServiceProviderInterface;

use Inscriptus\API\Index\Controllers\IndexController;
use Inscriptus\API\Index\Services\HyperMediaFactory;
use Inscriptus\API\Core\Models\HyperMediaSerializer;

class DependencyProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['index.controller'] = $app->share(function($app) {
            $url = $app['request']->getUri();
            $hyperMediaFactory = new HyperMediaFactory($url);
            $hyperMediaSerializer = new HyperMediaSerializer($app['contentType']);
            $accepted = $app['contentType'];

            return new IndexController($hyperMediaFactory, $hyperMediaSerializer, $accepted);
        });
    }

    public function boot(Application $app)
    {
    }
}
