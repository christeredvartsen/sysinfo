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
    /**
     * @covers SysInfo\Linux\CPU::__construct
     * @covers SysInfo\Linux\CPU::getUsertime
     * @covers SysInfo\Linux\CPU::getSystemtime
     * @covers SysInfo\Linux\CPU::getIdletime
     */
    public function testCPU() {
        $cpu = new CPU(file_get_contents(FIXTURES_DIR . '/stat'));

        $this->assertSame(12517, $cpu->getUsertime());
        $this->assertSame(76, $cpu->getUsertime(true));
        $this->assertSame(5828, $cpu->getSystemtime());
        $this->assertSame(326633, $cpu->getIdletime());
    }

    /**
     * @covers SysInfo\Linux\CPU::__construct
     * @covers SysInfo\Linux\CPU::getUsertime
     * @covers SysInfo\Linux\CPU::getSystemtime
     * @covers SysInfo\Linux\CPU::getIdletime
     */
    public function testCPUWithSystemData() {
        $cpu = new CPU();

        $this->assertInternalType('int', $cpu->getUsertime());
        $this->assertInternalType('int', $cpu->getUsertime(true));
        $this->assertInternalType('int', $cpu->getSystemtime());
        $this->assertInternalType('int', $cpu->getIdletime());
    }
}
