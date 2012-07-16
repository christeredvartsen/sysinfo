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
 * Base test case for platforms
 */
abstract class PlatformTests extends \PHPUnit_Framework_TestCase {
    /**
     * @var SysInfo\SysInfoInterface
     */
    private $platform;

    /**
     * Get an instance of the sysinfo platform to test
     *
     * @return SysInfo\SysInfoInterface
     */
    abstract protected function getPlatform();

    /**
     * Set up
     */
    public function setUp() {
        $this->platform = $this->getPlatform();
    }

    /**
     * Tear down
     */
    public function tearDown() {
        $this->platform = null;
    }

    public function testGetCPU() {
        $this->assertInstanceOf('SysInfo\CPUInterface', $this->platform->getCPU());
    }

    public function testGetMemory() {
        $this->assertInstanceOf('SysInfo\MemoryInterface', $this->platform->getMemory());
    }

    public function testGetLoad() {
        $this->assertInstanceOf('SysInfo\LoadInterface', $this->platform->getLoad());
    }

    public function testGetUptime() {
        $this->assertInstanceOf('SysInfo\UptimeInterface', $this->platform->getUptime());
    }

    public function testGetDisk() {
        $this->assertInstanceOf('SysInfo\DiskInterface', $this->platform->getDisk());
    }
}
