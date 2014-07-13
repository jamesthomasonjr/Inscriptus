<?php
namespace Inscriptus\API\Index\Providers; 

use \Silex\Application;
use \Silex\ServiceProviderInterface;

use Inscriptus\API\Index\Controllers\IndexController;
use Inscriptus\API\Index\Services\HyperMediaFactory;

class DependencyProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['index.controller'] = $app->share(function($app) {
            $url = $app['request']->getUri();
            $hyperMediaFactory = new HyperMediaFactory($url);
            $accepted = $app['request']->headers->get('Accept');

            return new IndexController($hyperMediaFactory, $accepted);
        });
    }

    public function boot(Application $app)
    {
    }
}
