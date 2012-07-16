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
 * Test the Memory component
 */
class MemoryTest extends \PHPUnit_Framework_TestCase {
    /**
     * @covers SysInfo\Linux\Memory::__construct
     * @covers SysInfo\Linux\Memory::getTotal
     * @covers SysInfo\Linux\Memory::getFree
     * @covers SysInfo\Linux\Memory::getUsed
     */
    public function testMemory() {
        $memory = new Memory(file_get_contents(FIXTURES_DIR . '/meminfo'));

        $this->assertSame(4056144, $memory->getTotal());
        $this->assertSame(3023068, $memory->getFree());
        $this->assertSame(1033076, $memory->getUsed());
    }

    /**
     * @covers SysInfo\Linux\Memory::__construct
     * @covers SysInfo\Linux\Memory::getTotal
     * @covers SysInfo\Linux\Memory::getFree
     * @covers SysInfo\Linux\Memory::getUsed
     */
    public function testMemoryWithSystemData() {
        $memory = new Memory();

        $this->assertInternalType('int', $memory->getTotal());
        $this->assertinternalType('int', $memory->getFree());
        $this->assertinternalType('int', $memory->getUsed());
    }
}
