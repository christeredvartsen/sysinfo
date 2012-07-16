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

namespace SysInfo;

/**
 * Linux test case
 *
 * @covers SysInfo\Linux
 */
class LinuxTest extends PlatformTests {
    /**
     * @see SysInfo\PlatformTests::getPlatform()
     */
    protected function getPlatform() {
        return new Linux();
    }
}
