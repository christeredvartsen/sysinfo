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

use SysInfo\Linux;

/**
 * Linux sysinfo
 */
class Linux implements SysInfoInterface {
    /**
     * @see SysInfo\SysInfoInterface::getCPU
     */
    public function getCPU() {
        return new Linux\CPU();
    }

    /**
     * @see SysInfo\SysInfoInterface::getMemory
     */
    public function getMemory() {
        return new Linux\Memory();
    }

    /**
     * @see SysInfo\SysInfoInterface::getLoad
     */
    public function getLoad() {
        return new Linux\Load();
    }

    /**
     * @see SysInfo\SysInfoInterface::getUptime
     */
    public function getUptime() {
        return new Linux\Uptime();
    }

    /**
     * @see SysInfo\SysInfoInterface::getDisk
     */
    public function getDisk() {
        return new Linux\Disk();
    }
}
