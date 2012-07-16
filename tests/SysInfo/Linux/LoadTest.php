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
 * Test the Load component
 */
class LoadTest extends \PHPUnit_Framework_TestCase {
    /**
     * @covers SysInfo\Linux\Load::__construct
     * @covers SysInfo\Linux\Load::getAvg
     */
    public function testLoad() {
        $load = new Load(file_get_contents(FIXTURES_DIR . '/loadavg'));

        $this->assertSame(array(0.68, 0.45, 0.44), $load->getAvg());
    }

    /**
     * @covers SysInfo\Linux\Load::__construct
     * @covers SysInfo\Linux\Load::getAvg
     */
    public function testLoadWithSystemData() {
        $load = new Load();

        $result = $load->getAvg();
        $this->assertInternalType('array', $result);
        $this->assertInternalType('float', $result[0]);
        $this->assertInternalType('float', $result[1]);
        $this->assertInternalType('float', $result[2]);
    }
}
