<?php

declare(strict_types=1);

namespace App\Tests\Integration\Twig\Extension;

use App\Twig\Extension\MarkdownExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

#[CoversClass(MarkdownExtension::class)]
final class MarkdownExtensionTest extends KernelTestCase
{
    private MarkdownExtension $extension;

    protected function setUp(): void
    {
        self::bootKernel();
        /** @var MarkdownExtension $extension */
        $extension = self::getContainer()->get(MarkdownExtension::class);
        $this->extension = $extension;
    }

    /**
     * @return iterable<string, array{0: string, 1: string}>
     */
    public static function provideAddHeadersAnchors(): iterable
    {
        yield 'h2 gets a slug id' => [
            '<h2>Getting started</h2>',
            'id="getting-started"',
        ];

        yield 'h3 gets a slug id' => [
            '<h3>Run the tests</h3>',
            'id="run-the-tests"',
        ];

        yield 'header with only ascii has no trailing dash' => [
            '<h2>Symfony is great</h2>',
            'id="symfony-is-great"',
        ];

        yield 'trailing emoji adds the GitHub-style dash suffix' => [
            '<h2>MicroSymfony 🎶</h2>',
            'id="microsymfony-"',
        ];
    }

    #[DataProvider('provideAddHeadersAnchors')]
    public function testAddHeadersAnchorsAddsIdAttribute(string $html, string $expectedIdAttribute): void
    {
        $output = $this->extension->addHeadersAnchors($html);
        self::assertStringContainsString($expectedIdAttribute, $output);
    }

    public function testH1AndH4AreNotTouched(): void
    {
        $html = '<div><h1>Title ⚡</h1><h4>Sub</h4></div>';
        $output = $this->extension->addHeadersAnchors($html);
        self::assertStringNotContainsString('id=', $output);
    }

    public function testMultipleHeadersAllGetAnchored(): void
    {
        $html = '<div><h2>First</h2><p>Some text.</p><h3>Second</h3><h2>Third 🙂</h2></div>';
        $output = $this->extension->addHeadersAnchors($html);
        self::assertStringContainsString('id="first"', $output);
        self::assertStringContainsString('id="second"', $output);
        self::assertStringContainsString('id="third-"', $output);
    }

    public function testInlineContentInHeaderIsPreserved(): void
    {
        $html = '<h2>Hello <code>world</code></h2>';
        $output = $this->extension->addHeadersAnchors($html);
        self::assertStringContainsString('id="hello-world"', $output);
        self::assertStringContainsString('<code>world</code>', $output);
    }
}
