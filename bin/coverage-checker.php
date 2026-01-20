<?php

declare(strict_types=1);

$argv = $argv ?? [];
if (count($argv) !== 3) {
    throw new InvalidArgumentException('Two arguments are required by this script: 1) the coverage file path. 2) the code coverage threshold.');
}

[, $inputFile, $threshold] = $argv;

if (!is_numeric($threshold)) {
    throw new InvalidArgumentException('An integer checked percentage must be given as second parameter');
}
$percentage = min(100, max(0, (int) $threshold));

if (!file_exists($inputFile)) {
    throw new InvalidArgumentException('Invalid input file provided');
}

$content = file_get_contents($inputFile);
if ($content === false) {
    throw new RuntimeException('Cannot read coverage file.');
}

// Extract coverage percentage from line like: [30;42m  Lines:   96.43% (108/112)[0m
if (!preg_match('/Lines:\s+(\d+\.\d+)%/', $content, $matches)) {
    throw new RuntimeException('Cannot find coverage metrics in coverage file.');
}

$coverage = (float) $matches[1];
if ($coverage < $percentage) {
    echo sprintf(' > Code coverage: %s%%, which is below the accepted threshold: %s%% ❌', $coverage, $percentage).\PHP_EOL.\PHP_EOL;
    exit(1);
}

echo \PHP_EOL.sprintf(' > Code coverage: %s%% - OK! ✅', $coverage).\PHP_EOL.\PHP_EOL;
