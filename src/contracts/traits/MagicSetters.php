<?php

namespace Inscriptus\API\Core\Traits;

trait MagicSetters
{
    public function __set($name, $value)
    {
        try {
            $method = "set" . ucfirst($name);
            return $this->$method($value);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
