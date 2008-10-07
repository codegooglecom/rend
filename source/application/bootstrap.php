<?php
$root = dirname(dirname(__FILE__));

// Setup include path
set_include_path(
    get_include_path() .
    PATH_SEPARATOR .
    "{$root}/library" .
    PATH_SEPARATOR .
    "{$root}/application"
);

/** Zend_Loader */
require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

$setup = new Rend_Controller_Plugin_Setup($root, $_SERVER['REND_MODE']);

Zend_Controller_Front::getInstance()
                     ->registerPlugin($setup, 0)
                     ->addControllerDirectory("{$root}/application/controllers", 'default')
                     ->addModuleDirectory("{$root}/application/modules");

try {
    Zend_Controller_Front::getInstance()
                         ->dispatch();
} catch (Exception $e) {
?>
<html>
    <head>
        <title>Unhandled Exception</title>
    </head>
    <body>
        <h1>Unhandled Exception</h1>
        <h2>Message</h2>
        <p><?php echo $e->getMessage(); ?></p>
        <h2>Basic Stack Trace</h2>
        <pre><?php echo $e; ?></pre>
        <h2>Full Stack Trace</h2>
        <pre><?php var_dump($e->getTrace()); ?></pre>
    </body>
</html>
<?php
}