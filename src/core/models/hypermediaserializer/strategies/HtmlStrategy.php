<?php

namespace Inscriptus\API\Core\Models\HyperMediaSerializer\Strategies;

class HtmlStrategy
{
    public function serialize($hypermedia)
    {   
        $output = array();
        $output['title'] = $hypermedia->getTitle();
        $output['href'] = $hypermedia->getHref();
        $output['rels'] = array();

        foreach($hypermedia->getRels() as $rel) {
            $output['rels'][$rel->getTitle()] = array(
                "href" => $rel->getHref(),
                "title" => $rel->getTitle()
            );
        }

        // @TODO Might be worth refactoring Twig stuff out into
        // a dependency provider... But its probably harmless.
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/html');
        $twig = new \Twig_Environment($loader);

        return $twig->render('response.twig', $output);
    }
}
