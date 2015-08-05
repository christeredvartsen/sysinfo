<?php
namespace SysInfo\TestListener;

use PHPUnit_Framework_TestSuite,
    SysInfo\SysInfo;

class SysInfoListener extends Listener {
    private $logPath;
    private $sysInfo;
    private $preAvg;

    public function __construct($logPath) {
        $this->logPath = $logPath;
        $this->sysInfo = SysInfo::factory();
        $this->preAvg = $this->sysInfo->getLoad()->getAvg();
    }

    public function __destruct() {
        $postAvg = $this->sysInfo->getLoad()->getAvg();
        $log = $this->logPath . '/sysinfo.csv';

        echo PHP_EOL . "Generating system info log ... ";

        $lines = array(
            implode(',', array(
                'Load before tests(1m)',
                'Load before tests(5m)',
                'Load before tests(15m)',
                'Load after tests(1m)',
                'Load after tests(5m)',
                'Load after tests(15m),'
            )),
            implode(',', array(
                $this->preAvg[0],
                $this->preAvg[1],
                $this->preAvg[2],
                $postAvg[0],
                $postAvg[1],
                $postAvg[2],
            )),
        );

        if (!file_put_contents($log, implode(PHP_EOL, $lines))) {
            echo "Permission denied: " . $log . PHP_EOL;
        } else {
            echo "done" . PHP_EOL;
        }
    }
}
