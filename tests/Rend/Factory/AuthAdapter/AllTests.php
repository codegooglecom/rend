<?php
/**
 * Rend
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.rendframework.com/license.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to justin.hendrickson+rend@gmail.com so I can send you a copy immediately.
 *
 * @category Rend
 * @subpackage UnitTest
 * @copyright 2008-2009 Justin Hendrickson
 * @license http://www.rendframework.com/license.html    New BSD License
 * @link http://www.rendframework.com/
 * @since 2.0.0
 * @version $Id$
 */

if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "Rend_Factory_AuthAdapter_AllTests::main");
}

require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/TestHelper.php";
require_once "Rend/Factory/AuthAdapter/DbTable.php";
require_once "Rend/Factory/AuthAdapter/Digest.php";

/**
 *
 */
class Rend_Factory_AuthAdapter_AllTests
{

    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite("Rend Factory AuthAdapter Tests");

        $suite->addTestSuite("Rend_Factory_AuthAdapter_DbTableTest");
        $suite->addTestSuite("Rend_Factory_AuthAdapter_DigestTest");

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == "Rend_Factory_AuthAdapter_AllTests::main") {
    Rend_Factory_AuthAdapter_AllTests::main();
}
