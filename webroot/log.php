<?php
$filename = '../tmp/logs/error.log';
if (!file_exists($filename)) {
    touch($filename);
}
if (isset($_GET['c'])) {
    file_put_contents($filename, "");
}
echo sprintf('<pre>%s</pre>', file_get_contents($filename));
