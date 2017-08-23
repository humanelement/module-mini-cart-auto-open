<?php
/**
 * Human Element Inc.
 *
 * @package HumanElement_MiniCartAutoOpen
 * @copyright Copyright (c) 2017 Human Element Inc. (https://www.human-element.com)
 */

namespace HumanElement\MiniCartAutoOpen\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

/**
 * Cart sidebar block
 */
class Sidebar extends Template
{
    /**
     * Xml path to checkout sidebar auto open value
     */
    const XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN = 'checkout/sidebar/auto_open';

    /**
     * Xml pah to checkout sidebar auto open timeout value
     */
    const XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN_TIMEOUT = 'checkout/sidebar/auto_open_timeout';

    /**
     * Returns minicart config
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'canAutoOpen' => $this->getMiniCartCanAutoOpen(),
            'autoOpenTimeout' => $this->getMiniCartAutoOpenTimeout()
        ];
    }

    /**
     * Return whether the minicart can auto open
     *
     * @return int
     */
    private function getMiniCartCanAutoOpen()
    {
        return (bool)$this->_scopeConfig->getValue(
            self::XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Return whether the minicart can auto open
     *
     * @return int
     */
    private function getMiniCartAutoOpenTimeout()
    {
        return (int)$this->_scopeConfig->getValue(
            self::XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN_TIMEOUT,
            ScopeInterface::SCOPE_STORE
        );
    }
}
