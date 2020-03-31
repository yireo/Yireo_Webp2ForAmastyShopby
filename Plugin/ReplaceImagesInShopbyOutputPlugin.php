<?php
declare(strict_types=1);

namespace Yireo\Webp2ForAmastyShopby\Plugin;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\LayoutInterface;
use Amasty\Shopby\Plugin\Ajax\ProductListWrapper;
use Yireo\Webp2\Image\HtmlReplacer;

/**
 * Class ReplaceImagesInShopbyOutputPlugin
 *
 * @package Yireo\Webp2ForAmastyShopby\Plugin
 */
class ReplaceImagesInShopbyOutputPlugin
{
    /**
     * @var HtmlReplacer
     */
    private $htmlReplacer;

    /**
     * @var LayoutInterface
     */
    private $layout;

    /**
     * TestPlugin constructor.
     * @param HtmlReplacer $htmlReplacer
     * @param LayoutInterface $layout
     */
    public function __construct(
        HtmlReplacer $htmlReplacer,
        LayoutInterface $layout
    ) {
        $this->htmlReplacer = $htmlReplacer;
        $this->layout = $layout;
    }

    /**
     * Interceptor of ProductListWrapper::afterToHtml()
     *
     * @param ProductListWrapper $subject
     * @param $result
     * @return string
     * @throws LocalizedException
     * @throws Exception
     */
    public function afterAfterToHtml(ProductListWrapper $subject, $result): string
    {
        return $this->htmlReplacer->replaceImagesInHtml($this->layout, $result);
    }
}
