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

/**
 * Test the Disk component
 */
class DiskTest extends \PHPUnit_Framework_TestCase {
    /**
     * @covers SysInfo\Linux\Disk::__construct
     * @covers SysInfo\Linux\Disk::getReads
     * @covers SysInfo\Linux\Disk::getWrites
     * @covers SysInfo\Linux\Disk::getTimeSpentReading
     * @covers SysInfo\Linux\Disk::getTimeSpentWriting
     * @covers SysInfo\Linux\Disk::sumField
     */
    public function testDisk() {
        $disk = new Disk(file_get_contents(FIXTURES_DIR . '/diskstats'));

        $this->assertSame(18587, $disk->getReads());
        $this->assertSame(18587, $disk->getReads('sda'));
        $this->assertSame(18587, $disk->getReads(array('sda')));
        $this->assertSame(18424, $disk->getReads('sda', 1));
        $this->assertSame(18585, $disk->getReads('sda', array(1, 5)));

        $this->assertSame(4180, $disk->getWrites());
        $this->assertSame(4180, $disk->getWrites('sda'));
        $this->assertSame(4180, $disk->getWrites(array('sda')));
        $this->assertSame(4180, $disk->getWrites('sda', 1));
        $this->assertSame(4180, $disk->getWrites('sda', array(1, 5)));

        $this->assertSame(1574368, $disk->getTimeSpentReading());
        $this->assertSame(1574368, $disk->getTimeSpentReading('sda'));
        $this->assertSame(1574368, $disk->getTimeSpentReading(array('sda')));
        $this->assertSame(1573964, $disk->getTimeSpentReading('sda', 1));
        $this->assertSame(1574296, $disk->getTimeSpentReading('sda', array(1, 5)));

        $this->assertSame(642824, $disk->getTimeSpentWriting());
        $this->assertSame(642824, $disk->getTimeSpentWriting('sda'));
        $this->assertSame(642824, $disk->getTimeSpentWriting(array('sda')));
        $this->assertSame(642824, $disk->getTimeSpentWriting('sda', 1));
        $this->assertSame(642824, $disk->getTimeSpentWriting('sda', array(1, 5)));
    }

    /**
     * @covers SysInfo\Linux\Disk::__construct
     * @covers SysInfo\Linux\Disk::getReads
     * @covers SysInfo\Linux\Disk::getWrites
     * @covers SysInfo\Linux\Disk::getTimeSpentReading
     * @covers SysInfo\Linux\Disk::getTimeSpentWriting
     * @covers SysInfo\Linux\Disk::sumField
     */
    public function testDiskWithSystemData() {
        $disk = new Disk();

        $this->assertInternalType('int', $disk->getReads());
        $this->assertInternalType('int', $disk->getReads('sda'));
        $this->assertInternalType('int', $disk->getReads(array('sda')));
        $this->assertInternalType('int', $disk->getReads('sda', 1));
        $this->assertInternalType('int', $disk->getReads('sda', array(1, 5)));

        $this->assertInternalType('int', $disk->getWrites());
        $this->assertInternalType('int', $disk->getWrites('sda'));
        $this->assertInternalType('int', $disk->getWrites(array('sda')));
        $this->assertInternalType('int', $disk->getWrites('sda', 1));
        $this->assertInternalType('int', $disk->getWrites('sda', array(1, 5)));

        $this->assertInternalType('int', $disk->getTimeSpentReading());
        $this->assertInternalType('int', $disk->getTimeSpentReading('sda'));
        $this->assertInternalType('int', $disk->getTimeSpentReading(array('sda')));
        $this->assertInternalType('int', $disk->getTimeSpentReading('sda', 1));
        $this->assertInternalType('int', $disk->getTimeSpentReading('sda', array(1, 5)));

        $this->assertInternalType('int', $disk->getTimeSpentWriting());
        $this->assertInternalType('int', $disk->getTimeSpentWriting('sda'));
        $this->assertInternalType('int', $disk->getTimeSpentWriting(array('sda')));
        $this->assertInternalType('int', $disk->getTimeSpentWriting('sda', 1));
        $this->assertInternalType('int', $disk->getTimeSpentWriting('sda', array(1, 5)));
    }
}
