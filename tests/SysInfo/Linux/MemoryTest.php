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
    public function testMemory() {
        $memory = new Memory("MemTotal:        4056144 kB\nMemFree:         1080360 kB");

        $this->assertSame(4056144, $memory->getTotal());
        $this->assertSame(1080360, $memory->getFree());
        $this->assertSame(2975784, $memory->getUsed());
    }
}
