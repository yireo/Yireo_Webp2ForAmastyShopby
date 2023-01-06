<?php
declare(strict_types=1);

namespace Yireo\Webp2ForAmastyShopby\Plugin;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\LayoutInterface;
use Amasty\Shopby\Plugin\Ajax\ProductListWrapper;
use Yireo\NextGenImages\Util\HtmlReplacer;

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
     * TestPlugin constructor.
     * @param HtmlReplacer $htmlReplacer
     * @param LayoutInterface $layout
     */
    public function __construct(
        HtmlReplacer $htmlReplacer
    ) {
        $this->htmlReplacer = $htmlReplacer;
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
        return $this->htmlReplacer->replace($result);
    }
}
