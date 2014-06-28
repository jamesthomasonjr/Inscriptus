<?php
namespace Inscriptus\API\Index\Providers; 

use \Silex\Application;
use \Silex\ServiceProviderInterface;

use Inscriptus\API\Index\Controllers\IndexController;

class DependencyProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['index.controller'] = $app->share(function() {
            return new IndexController();
        });
    }

    public function boot(Application $app)
    {
    }
}
