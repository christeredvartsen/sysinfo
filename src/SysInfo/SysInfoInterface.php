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
 * Sysinfo interface for all platforms to implement
 */
interface SysInfoInterface {
    /**
     * @return SysInfo\CPUInterface
     */
    function getCPU();

    /**
     * @return SysInfo\MemoryInterface
     */
    function getMemory();

    /**
     * @return SysInfo\LoadInterface
     */
    function getLoad();

    /**
     * @return SysInfo\UptimeInterface
     */
    function getUptime();

    /**
     * @return SysInfo\DiskInterface
     */
    function getDisk();
}
