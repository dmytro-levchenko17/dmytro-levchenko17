<?php

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    //$bytes /= pow(1024, $pow);
    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

$file = "generators_test.txt";

function file_lines_parse($filename): Generator
{
    $file = fopen($filename, 'r');
    while (($line = fgets($file)) !== false) {
        yield $line;
    }
    fclose($file);
}

$before = memory_get_usage(true);

foreach (file_lines_parse($file) as $line) {
    echo nl2br("$line\n");
}

echo '<hr>';
echo formatBytes(memory_get_usage(true) - $before);
