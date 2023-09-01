<?php

// @see https://ocramius.github.io/blog/automated-code-coverage-check-for-github-pull-requests-with-travis/

declare(strict_types=1);

$inputFile = $argv[1];
$percentage = min(100, max(0, (int) $argv[2]));

if (!file_exists($inputFile)) {
    throw new InvalidArgumentException('Invalid input file provided');
}

if (!is_int($percentage)) {
    throw new InvalidArgumentException('An integer checked percentage must be given as second parameter');
}

try {
    @$xml = new SimpleXMLElement((string) file_get_contents($inputFile));
} catch (Exception) {
    throw new RuntimeException('Cannot parse XML of Clover file report');
}

$metrics = $xml->xpath('//metrics');
$totalElements = 0;
$checkedElements = 0;

foreach ($metrics as $metric) {
    $totalElements += (int) $metric['elements'];
    $checkedElements += (int) $metric['coveredelements'];
}

$coverage = round(($checkedElements / $totalElements) * 100, 2);

if ($coverage < $percentage) {
    echo ' > Code coverage: '.$coverage.'%, which is below the accepted '.$percentage.'% ❌'.PHP_EOL;
    exit(1);
}

echo PHP_EOL.' > Code coverage: '.$coverage.'% - OK! ✅'.PHP_EOL.PHP_EOL;
