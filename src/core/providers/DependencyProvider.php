<?php
namespace Inscriptus\API\Core\Providers; 

use \Silex\Application;
use \Silex\ServiceProviderInterface;

class DependencyProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $accepted = split(',', $app['request']->headers->get('Accept'));
        $matches = array_intersect($app['accepts'], $accepted);

        $contentType = (empty($contentType) || $contentType[0] === "*/*")
            ? "application/json"
            : $matches[0];

        $app['contentType'] = $contentType;
    }

    public function boot(Application $app)
    {
    }
}
