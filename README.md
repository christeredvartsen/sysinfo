SysInfo
=======
PHP library that can be used to fetch system information like CPU usage, load averages and memory usage (amongst other features). The library was made to accomodate a PHPUnit test listener, so the featureset is pretty slim, and only works on Linux. Feel free to play around with it and send a PR if you want to add some features (unit tests required).

Installation
------------
To use this library you can specify `christeredvartsen/sysinfo` in your [composer.json](http://getcomposer.org) file.

Usage
-----
```php
<?php
$sysInfo = SysInfo\SysInfo::factory();

$cpu = $sysInfo->getCPU();
$load = $sysInfo->getLoad();
$uptime = $sysInfo->getUptime();
$memory = $sysInfo->getMemory();
```

See the CPUInterface.php, LoadInterface.php, UptimeInterface.php and MemoryInterface.php interfaces for more docs.
