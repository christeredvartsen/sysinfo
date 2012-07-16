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
 * Disk interface
 */
interface DiskInterface {
    /**
     * Get the amount of reads
     *
     * @param string|string[] $devices The name of the device to fetch, for instance "sda", or an
     *                                 array of device names: array('hda', 'hdb').
     * @param int|int[] $partitions Which partition(s) to fetch info about.
     * @return int
     */
    function getReads($devices = null, $partitions = null);

    /**
     * Get the time spent reading
     *
     * @param string|string[] $devices The name of the device to fetch, for instance "sda", or an
     *                                 array of device names: array('hda', 'hdb').
     * @param int|int[] $partitions Which partition(s) to fetch info about.
     * @return int Amount of time spent reading in milliseconds
     */
    function getTimeSpentReading($devices = null, $partitions = null);

    /**
     * Get the amount of writes
     *
     * @param string|string[] $devices The name of the device to fetch, for instance "sda", or an
     *                                 array of device names: array('hda', 'hdb').
     * @param int|int[] $partitions Which partition(s) to fetch info about.
     * @return int
     */
    function getWrites($devices = null, $partitions = null);

    /**
     * Get the time spent writing
     *
     * @param string|string[] $devices The name of the device to fetch, for instance "sda", or an
     *                                 array of device names: array('hda', 'hdb').
     * @param int|int[] $partitions Which partition(s) to fetch info about.
     * @return int Amount of time spent writing in milliseconds
     */
    function getTimeSpentWriting($devices = null, $partitions = null);
}
