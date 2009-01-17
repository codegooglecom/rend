<?php
/**
 *
 */

/** Rend_Factory_Interface */
require_once "Rend/Factory/Interface.php";

/**
 *
 */
interface Rend_Factory_AuthStorage_Interface extends Rend_Factory_Interface
{

    /**
     * Create an auth storage object
     *
     * @return Zend_Auth_Storage_Interface
     */
    public function create();

}