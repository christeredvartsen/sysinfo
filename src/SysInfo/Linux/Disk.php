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

use SysInfo\DiskInterface;

/**
 * Disk info
 */
class Disk implements DiskInterface {
    /**
     * @var array
     */
    private $devices = array();

    /**
     * @var int
     */
    private $reads;

    /**
     * @param string $data Optional data. If null the data fill be fetched from /proc/diskstats
     */
    public function __construct($data = null) {
        if (!$data) {
            $data = file_get_contents('/proc/diskstats');
        }

        $matches = array();
        preg_match_all('/^\s*\d+\s+\d+\s+(.*?)(\d+) (\d+) \d+ \d+ (\d+) (\d+) \d+ \d+ (\d+) \d+ \d+ \d+\s*$/m', $data, $matches, PREG_SET_ORDER);

        foreach ($matches as $set) {
            $this->devices[$set[1]][$set[2]]['reads'] = $set[3];
            $this->devices[$set[1]][$set[2]]['readTime'] = $set[4];
            $this->devices[$set[1]][$set[2]]['writes'] = $set[5];
            $this->devices[$set[1]][$set[2]]['writeTime'] = $set[6];
        }
    }

    /**
     * @see SysInfo\DiskInterface::getReads()
     */
    public function getReads($devices = null, $partitions = null) {
        return $this->sumField($devices, $partitions, 'reads');
    }

    /**
     * @see SysInfo\DiskInterface::getTimeSpentReading()
     */
    public function getTimeSpentReading($devices = null, $partitions = null) {
        return $this->sumField($devices, $partitions, 'readTime');
    }

    /**
     * @see SysInfo\DiskInterface::getWrites()
     */
    public function getWrites($devices = null, $partitions = null) {
        return $this->sumField($devices, $partitions, 'writes');
    }

    /**
     * @see SysInfo\DiskInterface::getTimeSpentWriting()
     */
    public function getTimeSpentWriting($devices = null, $partitions = null) {
        return $this->sumField($devices, $partitions, 'writeTime');
    }

    /**
     * Calcuate a sum
     *
     * @param string|string[] $devices The name of the device to fetch, for instance "sda", or an
     *                                 array of device names: array('hda', 'hdb').
     * @param int|int[] $partitions Which partition(s) to fetch info about.
     * @return int
     */
    private function sumField($devices = null, $partitions = null, $field) {
        $result = 0;

        if ($devices) {
            $devices = (array) $devices;
        }

        if (is_array($devices)) {
            $devices = array_flip($devices);
        }

        if ($partitions) {
            $partitions = (array) $partitions;
        }

        if (is_array($partitions)) {
            $partitions = array_flip($partitions);
        }

        foreach ($this->devices as $device => $partition) {
            if ($devices && !isset($devices[$device])) {
                continue;
            }

            foreach ($partition as $p => $info) {
                if ($partitions && !isset($partitions[$p])) {
                    continue;
                }

                $result += $info[$field];
            }
        }

        return $result;
    }
}
