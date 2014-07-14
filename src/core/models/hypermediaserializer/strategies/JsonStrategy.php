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
            $output['rels'][] = array(
                "title" => $rel->getTitle(),
                "href" => $rel->getHref()
            );
        }

        return json_encode($output);
    }
}
