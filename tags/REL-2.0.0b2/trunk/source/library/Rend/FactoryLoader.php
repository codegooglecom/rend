<?php
/**
 *
 */

/** Zend_Loader_PluginLoader */
require_once "Zend/Loader/PluginLoader.php";

/**
 *
 */
class Rend_FactoryLoader extends Zend_Loader_PluginLoader
{

    /**
     * Factories
     * @var     array
     */
    protected $_factories = array();

    /**
     * Constructor
     *
     * @param     Zend_Config|array     $options
     */
    public function __construct($options = null)
    {
        parent::__construct(array(
            "Rend_Factory" => "Rend/Factory"
        ));

        if ($options instanceof Zend_Config) {
            $this->setConfig($options);
        } elseif (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Method overloader
     *
     * @param   string  $name
     * @param   array   $arguments
     * @return  mixed
     * @throws  Zend_Loader_PluginLoader_Exception
     */
    public function __call($name, $arguments)
    {
        return $this->getFactory($name)
                    ->create();
    }

    /**
     * Member access overloader
     *
     * @param   string  $name
     * @return  Rend_Factory_Interface
     * @throws  Zend_Loader_PluginLoader_Exception
     */
    public function __get($name)
    {
        return $this->getFactory($name);
    }

    /**
     * Isset overloader
     *
     * @param   string  $name
     * @return  boolean
     */
    public function __isset($name)
    {
        return isset($this->_factories[$name]);
    }

    /**
     * Set all the factories
     *
     * @param 	Traversable 	$factories
     * @return	Rend_FactoryLoader
     */
    public function setFactories($factories)
    {
        foreach ($factories as $name => $config) {
            $this->setFactory($name, $config);
        }
        return $this;
    }

    /**
     * Set a factory
     *
     * @param    string    $name
     * @param    Rend_Factory_Interface|array     $factory
     */
    public function setFactory($name, $factory)
    {
        $this->_factories[$name] = $factory;
        return $this;
    }

    /**
     * Get a factory by name
     *
     * @param   string  $name
     * @return  Rend_Factory_Interface
     * @throws  Zend_Loader_PluginLoader_Exception
     */
    public function getFactory($name)
    {
        if (!isset($this->_factories[$name])) {
            throw new Rend_FactoryLoader_Exception(
                "Could not find a factory named '{$name}'"
            );
        }

        if (!$this->_factories[$name] instanceof Rend_FactoryLoader_Factory_Interface) {
            $this->_factories[$name] = $this->_buildFactory($this->_factories[$name]);
        }

        return $this->_factories[$name];
    }

    /**
     * Set options from a Zend_Config object
     *
     * @param     Zend_Config     $config
     * @return    Rend_FactoryLoader
     */
    public function setConfig(Zend_Config $config)
    {
        return $this->setOptions($config->toArray());
    }

    /**
     * Set options from an array
     *
     * @param     array     $options
     * @return    Rend_FactoryLoader
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            switch ($key) {
                case "prefixPaths":
                    foreach ($value as $prefix => $path) {
                        $this->addPrefixPath($prefix, $path);
                    }
                break;

                case "factories":
                    $this->setFactories($value);
                break;
            }
        }
        return $this;
    }

    /**
     * Construct a factory
     *
     * @param   string  $type
     * @param   array|Zend_Config   $config
     * @return  Rend_FactoryLoader_Factory_Interface
     */
    protected function _buildFactory($config)
    {
        $className = $this->load(
            ucFirst($config["type"])
        );

        if (isset($config["options"])) {
            $factory = new $className($config["options"]);
        } else {
            $factory = new $className();
        }

        if ($factory instanceof Rend_FactoryLoader_Factory_Loadable_Interface) {
            $factory->setFactoryLoader($this);
        }

        return $factory;
    }

}
