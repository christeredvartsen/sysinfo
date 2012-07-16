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
    /**
     * @covers SysInfo\Linux\Uptime::__construct
     * @covers SysInfo\Linux\Uptime::getUptime
     * @covers SysInfo\Linux\Uptime::getIdletime
     */
    public function testUptime() {
        $uptime = new Uptime(file_get_contents(FIXTURES_DIR . '/uptime'));

        $this->assertSame(1787, $uptime->getUptime());
        $this->assertSame(3292, $uptime->getIdletime());
    }

    /**
     * @covers SysInfo\Linux\Uptime::__construct
     * @covers SysInfo\Linux\Uptime::getUptime
     * @covers SysInfo\Linux\Uptime::getIdletime
     */
    public function testUptimeWithSystemData() {
        $uptime = new Uptime();

        $this->assertInternalType('int', $uptime->getUptime());
        $this->assertInternalType('int', $uptime->getIdletime());
    }
}
