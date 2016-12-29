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

use SysInfo\Linux as OS;

/**
 * Linux sysinfo
 */
class Linux implements SysInfoInterface {
    /**
     * @see SysInfoInterface::getCPU
     */
    public function getCPU() {
        return new OS\CPU();
    }

    /**
     * @see SysInfoInterface::getMemory
     */
    public function getMemory() {
        return new OS\Memory();
    }

    /**
     * @see SysInfoInterface::getLoad
     */
    public function getLoad() {
        return new OS\Load();
    }

    /**
     * @see SysInfoInterface::getUptime
     */
    public function getUptime() {
        return new OS\Uptime();
    }

    /**
     * @see SysInfoInterface::getDisk
     */
    public function getDisk() {
        return new OS\Disk();
    }
}
