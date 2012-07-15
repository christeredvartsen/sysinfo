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

use SysInfo\CPUInterface;

/**
 * CPU info
 */
class CPU implements CPUInterface {
    /**
     * @var int
     */
    private $user;

    /**
     * @var int
     */
    private $userNice;

    /**
     * @var int
     */
    private $system;

    /**
     * @var int
     */
    private $idle;

    /**
     * @param string $data Optional data. If null the data fill be fetched from /proc/stat
     */
    public function __construct($data = null) {
        if (!$data) {
            $data = file('/proc/stat');
            $data = $data[0];
        }

        $parts = explode(' ', $data);

        $this->user = (int) $parts[2];
        $this->userNice = (int) $parts[3];
        $this->system = (int) $parts[4];
        $this->idle = (int) $parts[5];
    }

    /**
     * @see SysInfo\CPUInterface::getUsertime()
     */
    public function getUsertime($nice = false) {
        if ($nice) {
            return $this->userNice;
        }

        return $this->user;
    }

    /**
     * @see SysInfo\CPUInterface::getSystemtime()
     */
    public function getSystemtime() {
        return $this->system;
    }

    /**
     * @see SysInfo\CPUInterface::getIdletime()
     */
    public function getIdletime() {
        return $this->idle;
    }
}
