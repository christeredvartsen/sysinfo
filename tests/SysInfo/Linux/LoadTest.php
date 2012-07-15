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
    public function testLoad() {
        $load = new Load('0.78 0.72 0.68 1/428 19625');

        $this->assertSame(array(0.78, 0.72, 0.68), $load->getAvg());
    }
}
