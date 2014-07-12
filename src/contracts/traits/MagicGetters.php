<?php

namespace Inscriptus\API\Core\Traits;

trait MagicGetters
{
    public function __get($name)
    {
        try {
            $method = "get" . ucfirst($name);
            return $this->$method();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
