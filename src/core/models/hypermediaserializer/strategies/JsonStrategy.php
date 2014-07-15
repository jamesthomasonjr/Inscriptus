<?php

namespace Inscriptus\API\Core\Models\HyperMediaSerializer\Strategies;


class JsonStrategy
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

        return json_encode($output);
    }
}
