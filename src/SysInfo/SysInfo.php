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

use RuntimeException;

/**
 * SysInfo factory that can be used to dynamically fetch the correct SysInfo instance based on the
 * current platform.
 */
class SysInfo {
    /**
     * Mapping of OS => Class
     *
     * @var array
     */
    static public $mapping = array(
        'Linux' => 'SysInfo\Linux',
    );

    /**
     * @param string $os Optional forces OS. Defaults to PHP_OS
     * @throws RuntimeException
     * @return SysInfo\SysInfoInterface
     */
    static public function factory($os = null) {
        if (!$os) {
            $os = PHP_OS;
        }

        if (!isset(static::$mapping[$os])) {
            throw new RuntimeException('OS not yet implemented: ' . $os);
        }

        return new static::$mapping[$os];
    }
}
