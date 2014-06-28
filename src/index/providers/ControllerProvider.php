<?php
namespace Inscriptus\API\Index\Providers; 

use \Silex\Application;
use \Silex\ControllerProviderInterface;

class ControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', 'index.controller:index');

        return $controllers;
    }
}
