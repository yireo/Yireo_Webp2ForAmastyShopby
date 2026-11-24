<?php
declare(strict_types=1);

namespace Yireo\Webp2ForAmastyShopby\Plugin;

use Amasty\Shopby\Plugin\Ajax\ProductListWrapper;
use Yireo\NextGenImages\Config\Config;
use Yireo\NextGenImages\Util\HtmlReplacer;

class ReplaceImagesInShopbyOutputPlugin
{
    public function __construct(
        private readonly HtmlReplacer $htmlReplacer,
        private readonly Config $config
    ) {
    }

    /**
     * @param ProductListWrapper $subject
     * @param mixed $result
     * @return mixed
     */
    public function afterAfterToHtml(ProductListWrapper $subject, mixed $result): mixed
    {
        if (!is_string($result) || $result === '') {
            return $result;
        }

        if (!$this->config->enabled()) {
            return $result;
        }

        return $this->htmlReplacer->replace($result);
    }
}
