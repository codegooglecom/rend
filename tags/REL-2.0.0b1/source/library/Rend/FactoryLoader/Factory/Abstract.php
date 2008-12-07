<?php
/**
 *
 */

/** Rend_FactoryLoader_Factory_Interface */
require_once "Rend/FactoryLoader/Factory/Interface.php";

/**
 *
 */
abstract class Rend_FactoryLoader_Factory_Abstract implements Rend_FactoryLoader_Factory_Interface
{

    /**
     *
     */
    public function setConfig(Zend_Config $config)
    {
        return $this->setOptions($config->toArray());
    }

    /**
     *
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $method = "set" . ucFirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

}