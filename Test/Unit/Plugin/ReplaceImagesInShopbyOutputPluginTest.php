<?php
declare(strict_types=1);

namespace Yireo\Webp2ForAmastyShopby\Test\Unit\Plugin;

use Amasty\Shopby\Plugin\Ajax\ProductListWrapper;
use PHPUnit\Framework\TestCase;
use Yireo\NextGenImages\Config\Config;
use Yireo\NextGenImages\Util\HtmlReplacer;
use Yireo\Webp2ForAmastyShopby\Plugin\ReplaceImagesInShopbyOutputPlugin;

class ReplaceImagesInShopbyOutputPluginTest extends TestCase
{
    public function testReplacesHtmlWhenEnabled(): void
    {
        $htmlReplacer = $this->createMock(HtmlReplacer::class);
        $htmlReplacer->expects($this->once())
            ->method('replace')
            ->with('<img src="a.png">')
            ->willReturn('<picture></picture>');

        $result = $this->createPlugin($htmlReplacer, true)
            ->afterAfterToHtml($this->createMock(ProductListWrapper::class), '<img src="a.png">');

        $this->assertSame('<picture></picture>', $result);
    }

    public function testSkipsReplacementWhenDisabled(): void
    {
        $htmlReplacer = $this->createMock(HtmlReplacer::class);
        $htmlReplacer->expects($this->never())->method('replace');

        $result = $this->createPlugin($htmlReplacer, false)
            ->afterAfterToHtml($this->createMock(ProductListWrapper::class), '<img src="a.png">');

        $this->assertSame('<img src="a.png">', $result);
    }

    public function testReturnsNonStringResultUnchanged(): void
    {
        $htmlReplacer = $this->createMock(HtmlReplacer::class);
        $htmlReplacer->expects($this->never())->method('replace');
        $plugin = $this->createPlugin($htmlReplacer, true);
        $subject = $this->createMock(ProductListWrapper::class);

        $this->assertNull($plugin->afterAfterToHtml($subject, null));
        $this->assertSame('', $plugin->afterAfterToHtml($subject, ''));
        $this->assertSame(['html' => 'foo'], $plugin->afterAfterToHtml($subject, ['html' => 'foo']));
    }

    private function createPlugin(HtmlReplacer $htmlReplacer, bool $enabled): ReplaceImagesInShopbyOutputPlugin
    {
        $config = $this->createMock(Config::class);
        $config->method('enabled')->willReturn($enabled);

        return new ReplaceImagesInShopbyOutputPlugin($htmlReplacer, $config);
    }
}
