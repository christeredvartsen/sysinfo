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
 * Uptime interface
 */
interface CPUInterface {
    /**
     * Get the time the CPU has spent in user mode
     *
     * @param boolean $nice Whether or not to fetch the amount of time in user mode with low
     *                      priority (nice)
     * @return int
     */
    function getUserTime($nice = false);

    /**
     * Get the time the CPU has spent in system mode
     *
     * @return int
     */
    function getSystemTime();

    /**
     * Get the time the CPU has spent doing nothing
     *
     * @return int
     */
    function getIdleTime();
}
