<?php

// @see https://ocramius.github.io/blog/automated-code-coverage-check-for-github-pull-requests-with-travis/

declare(strict_types=1);

$argv = $argv ?? [];
if (count($argv) !== 3) {
    throw new InvalidArgumentException('Two arguments are required by this script: 1) the clover file report path. 2) the code coverage threshold.');
}

[,$inputFile, $threshold] = $argv;

if (!is_numeric($threshold)) {
    throw new InvalidArgumentException('An integer checked percentage must be given as second parameter');
}
$percentage = min(100, max(0, (int) $threshold));

if (!file_exists($inputFile)) {
    throw new InvalidArgumentException('Invalid input file provided');
}

try {
    @$xml = new SimpleXMLElement((string) file_get_contents($inputFile));
} catch (Exception) {
    throw new RuntimeException('Cannot parse XML of Clover file report.');
}

/** @var array<SimpleXMLElement> $metrics */
$metrics = $xml->xpath('//metrics');
if (count($metrics) === 0) {
    throw new RuntimeException('Cannot find coverage metrics.');
}

$totalElements = 0;
$checkedElements = 0;
foreach ($metrics as $metric) {
    $totalElements += (int) $metric['elements'];
    $checkedElements += (int) $metric['coveredelements'];
}

$coverage = round(($checkedElements / $totalElements) * 100, 2);
if ($coverage < $percentage) {
    echo ' > Code coverage: '.$coverage.'%, which is below the accepted '.$percentage.'% ❌'.\PHP_EOL.\PHP_EOL;
    exit(1);
}

echo \PHP_EOL.' > Code coverage: '.$coverage.'% - OK! ✅'.\PHP_EOL.\PHP_EOL;
