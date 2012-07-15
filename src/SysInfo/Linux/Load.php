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

use SysInfo\LoadInterface;

/**
 * Load info
 */
class Load implements LoadInterface {
    /**
     * @var double[]
     */
    private $avg;

    /**
     * @param string $data Optional data. If null the data fill be fetched from /proc/loadavg
     */
    public function __construct($data = null) {
        if (!$data) {
            $data = file_get_contents('/proc/loadavg');
        }

        $parts = explode(' ', $data);

        $this->avg = array(
            (double) $parts[0], (double) $parts[1], (double) $parts[2],
        );
    }

    /**
     * @see SysInfo\LoadInterface::getAvg()
     */
    public function getAvg() {
        return $this->avg;
    }
}
