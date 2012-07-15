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

use SysInfo\MemoryInterface;

/**
 * Memory info
 */
class Memory implements MemoryInterface {
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $free;

    /**
     * @param string $data Optional data. If null the data fill be fetched from /proc/meminfo
     */
    public function __construct($data = null) {
        if (!$data) {
            $data = file_get_contents('/proc/meminfo');
        }

        preg_match('/MemTotal:\s+(\d+) kB/', $data, $matches);
        $this->total = (int) $matches[1];

        preg_match('/MemFree:\s+(\d+) kB/', $data, $matches);
        $this->free = (int) $matches[1];
    }

    /**
     * @see SysInfo\MemoryInterface::getTotal()
     */
    public function getTotal() {
        return $this->total;
    }

    /**
     * @see SysInfo\MemoryInterface::getFree()
     */
    public function getFree() {
        return $this->free;
    }

    /**
     * @see SysInfo\MemoryInterface::getUsed()
     */
    public function getUsed() {
        return $this->getTotal() - $this->getFree();
    }
}
