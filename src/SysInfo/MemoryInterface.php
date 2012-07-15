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
interface MemoryInterface {
    /**
     * Get the amount of total memory in kB
     *
     * @return int
     */
    function getTotal();

    /**
     * Get the amount of free memory in kB
     *
     * @return int
     */
    function getFree();

    /**
     * Get the amount of used memory in kB
     *
     * @return int
     */
    function getUsed();
}
