<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class MarkdownExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('add_att_attributes', $this->addAttAttributes(...)),
        ];
    }

    /**
     * Add the "att" attributes on all links to have the tooltips.
     *
     * @see https://www.drupal.org/project/smart_trim/issues/3342481#comment-14982548
     */
    public function addAttAttributes(string $html): string
    {
        $dom = new \DOMDocument();
        $dom->loadHTML(mb_encode_numericentity($html, [0x80, 0x10FFFF, 0, ~0], 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $aTags = $dom->getElementsByTagName('a');
        foreach ($aTags as $aTag) {
            $aTag->setAttribute('att', '');
        }

        return (string) $dom->saveHTML();
    }
}
