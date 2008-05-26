<?php
/**
 *
 */

if(!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'AllTests::main');
}

/** TestHelper */
require_once 'TestHelper.php';

/**
 *
 */
class AllTests
{

    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Tests');
        $suite->addTest(Rend_AllTests::suite());
        return $suite;
    }

}

if(PHPUnit_MAIN_METHOD == 'AllTests::main') {
    AllTests::main();
}
