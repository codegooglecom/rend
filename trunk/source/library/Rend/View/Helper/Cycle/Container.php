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
 * @category    Rend
 * @package     View
 * @copyright   2008 Justin Hendrickson
 * @license     http://www.rendframework.com/license.html    New BSD License
 * @link        http://www.rendframework.com/
 * @since       1.0.0
 * @version     $Id: Truncate.php 183 2008-09-14 02:43:07Z justin.hendrickson $
 */

/**
 * @category    Rend
 * @package     View
 */
class Rend_View_Helper_Cycle_Container extends IteratorIterator
{

    /**
     * Get the current value and advance afterwards
     *
     * @return  mixed
     */
    public function getCurrentAndAdvance()
    {
        $current = $this->current();
        $this->next();
        return $current;
    }

}