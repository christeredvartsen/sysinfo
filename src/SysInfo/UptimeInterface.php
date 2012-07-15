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
interface UptimeInterface {
    /**
     * Get the uptime of the system in seconds
     *
     * @return int
     */
    function getUptime();

    /**
     * Get the idletime of the system in seconds
     *
     * @return int
     */
    function getIdletime();
}
