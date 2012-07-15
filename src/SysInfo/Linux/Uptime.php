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

namespace SysInfo\Linux;

use SysInfo\UptimeInterface;

/**
 * Uptime info
 */
class Uptime implements UptimeInterface {
    /**
     * @var int
     */
    private $uptime;

    /**
     * @var int
     */
    private $idletime;

    /**
     * @param string $data Optional data. If null the data fill be fetched from /proc/uptime
     */
    public function __construct($data = null) {
        if (!$data) {
            $data = file_get_contents('/proc/uptime');
        }

        list($uptime, $idletime) = explode(' ', $data);

        $this->uptime = (int) $uptime;
        $this->idletime = (int) $idletime;
    }

    /**
     * @see SysInfo\UptimeInterface::getUptime()
     */
    public function getUptime() {
        return $this->uptime;
    }

    /**
     * @see SysInfo\UptimeInterface::getIdletime()
     */
    public function getIdletime() {
        return $this->idletime;
    }
}
