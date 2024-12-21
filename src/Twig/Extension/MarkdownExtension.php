<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use App\Helper\StringHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

use function Symfony\Component\String\u;

final class MarkdownExtension extends AbstractExtension
{
    public function __construct(
        private readonly StringHelper $stringHelper,
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('add_headers_anchors', $this->addHeadersAnchors(...)),
        ];
    }

    /**
     * Add the missing anchors on demo website homepage displaying the Githb README.
     *
     * @see https://microsymfony.ovh
     * @see https://github.com/strangebuzz/MicroSymfony/blob/main/README.md?plain=1
     */
    public function addHeadersAnchors(string $html): string
    {
        $dom = new \DOMDocument();
        $dom->loadHTML(mb_encode_numericentity($html, [0x80, 0x10FFFF, 0, ~0], 'UTF-8'), \LIBXML_HTML_NOIMPLIED | \LIBXML_HTML_NODEFDTD);

        // Allow to have the same "buggy" anchors as GitHub
        /** @var \DOMNodeList<\DOMNode> $tags */
        $tags = (new \DOMXPath($dom))->query('//h2 | //h3');
        foreach ($tags as $headerTag) {
            $slug = $this->stringHelper->slugify($headerTag->textContent);
            /** @var \DOMElement $headerTag */
            $headerTag->setAttribute('id', $slug.(u($slug)->length() !== u($headerTag->textContent)->length() ? '-' : '')); // add "-" when we have a final Emoji.
        }

        return (string) $dom->saveHTML();
    }
}
