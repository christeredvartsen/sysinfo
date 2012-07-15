<?php
/**
 * This file is part of the SysInfo package.
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed
 * with this source code.
 *
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sysinfo
 */

namespace SysInfo\Linux;

/**
 * Test the Uptime component
 */
class UptimeTest extends \PHPUnit_Framework_TestCase {
    public function testUptime() {
        $uptime = new Uptime('232626.14 427950.77');

        $this->assertSame(232626, $uptime->getUptime());
        $this->assertSame(427950, $uptime->getIdletime());
    }
}
