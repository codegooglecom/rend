<?php
/**
 *
 */

/**
 *
 */
abstract class Rend_Factory_Abstract
{

    /**
     * Constructor
     *
     * @param   Zend_Config|array   $options
     */
    public function __construct($options)
    {
        if ($options instanceof Zend_Config) {
            $this->setConfig($options);
        } elseif (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Get the factory name
     *
     * @return string
     */
    public function getName()
    {
        $classname = get_class($this);

        if (preg_match('/.*_(.*)/', $classname, $matches)) {
            return $matches[1];
        }

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
            $method = 'set' . ucFirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

}
