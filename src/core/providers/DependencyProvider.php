<?php
namespace Inscriptus\API\Core\Providers; 

use \Silex\Application;
use \Silex\ServiceProviderInterface;

class DependencyProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['env'] = $_ENV['env'] ?: 'dev';
    }

    public function boot(Application $app)
    {
    }
}
