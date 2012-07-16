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
 * Factory test case
 */
class SysInfoTest extends \PHPUnit_Framework_TestCase {
    /**
     * @expectedException RuntimeException
     * @covers SysInfo\SysInfo::factory
     */
    public function testNonImplementedPlatform() {
        SysInfo::factory('Amiga');
    }

    /**
     * Data provider
     *
     * @return array[]
     */
    public function getPlatformMapping() {
        $values = array();

        foreach (SysInfo::$mapping as $platform => $class) {
            $values[] = array($platform, $class);
        }

        return $values;
    }

    /**
     * @dataProvider getPlatformMapping
     * @covers SysInfo\SysInfo::factory
     */
    public function testSupportedPlatforms($platform, $class) {
        $sysInfo = SysInfo::factory($platform);

        $this->assertInstanceOf('SysInfo\SysInfoInterface', $sysInfo);
        $this->assertInstanceOf($class, $sysInfo);
    }

    /**
     * @covers SysInfo\SysInfo::factory
     */
    public function testCurrentPlatform() {
        $os = PHP_OS;

        if (!isset(SysInfo::$mapping[$os])) {
            $this->markTestSkipped($os . ' is not implemented. Skipping test.');
        }

        $sysInfo = SysInfo::factory();

        $this->assertInstanceOf('SysInfo\SysInfoInterface', $sysInfo);
        $this->assertInstanceOf(SysInfo::$mapping[$os], $sysInfo);
    }
}
