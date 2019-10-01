<?php
/**
 * Human Element Inc.
 *
 * @package HumanElement_MiniCartAutoOpen
 * @copyright Copyright (c) 2017 Human Element Inc. (https://www.human-element.com)
 */

namespace HumanElement\MiniCartAutoOpen\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Cart sidebar block
 */
class Sidebar implements ArgumentInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Sidebar constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Xml path to checkout sidebar auto open value
     */
    const XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN = 'checkout/sidebar/auto_open';

    /**
     * Xml path to checkout sidebar auto open timeout value
     */
    const XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN_TIMEOUT = 'checkout/sidebar/auto_open_timeout';

    /**
     * Xml path to checkout sidebar scroll top value
     */
    const XML_PATH_CHECKOUT_SIDEBAR_SCROLL_TOP = 'checkout/sidebar/scroll_top';

    /**
     * Returns minicart config
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'canAutoOpen' => $this->getMiniCartCanAutoOpen(),
            'autoOpenTimeout' => $this->getMiniCartAutoOpenTimeout(),
            'canScrollTop' => $this->getMiniCartScrollTop(),
        ];
    }

    /**
     * Return whether the minicart can auto open
     *
     * @return int
     */
    protected function getMiniCartCanAutoOpen()
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Return whether the minicart can auto open
     *
     * @return int
     */
    protected function getMiniCartAutoOpenTimeout()
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_CHECKOUT_SIDEBAR_AUTO_OPEN_TIMEOUT,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Return whether to scroll to top of page after adding product to cart
     *
     * @return int
     */
    protected function getMiniCartScrollTop()
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH_CHECKOUT_SIDEBAR_SCROLL_TOP,
            ScopeInterface::SCOPE_STORE
        );
    }
}
