<?php
/**
 * Webp2 add-on to make Yireo_Webp2 work for Amasty_Shopby
 *
 * @package     Yireo_Webp2ForAmastyShopby
 * @author      Yireo (https://www.yireo.com/)
 * @copyright   Copyright 2020 Yireo (https://www.yireo.com/)
 * @license     Open Source License
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Yireo_Webp2ForAmastyShopby',
    __DIR__
);
