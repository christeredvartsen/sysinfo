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
     * @return CPUInterface
     */
    function getCPU();

    /**
     * @return MemoryInterface
     */
    function getMemory();

    /**
     * @return LoadInterface
     */
    function getLoad();

    /**
     * @return UptimeInterface
     */
    function getUptime();

    /**
     * @return DiskInterface
     */
    function getDisk();
}
