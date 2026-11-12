<?php declare(strict_types=1);

namespace Amasty\Shopby\Plugin\Ajax;

class ProductListWrapper
{
    /**
     * @param mixed $subject
     * @param string $result
     * @return string
     */
    public function afterToHtml($subject, $result)
    {
        return $result;
    }
}
