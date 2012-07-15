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
 * Test the CPU component
 */
class CPUTest extends \PHPUnit_Framework_TestCase {
    public function testCPU() {
        $cpu = new CPU('cpu  2579152 623 825419 43128163 305713 451 11807 0 0 0');

        $this->assertSame(2579152, $cpu->getUsertime());
        $this->assertSame(623, $cpu->getUsertime(true));
        $this->assertSame(825419, $cpu->getSystemtime());
        $this->assertSame(43128163, $cpu->getIdletime());
    }
}
