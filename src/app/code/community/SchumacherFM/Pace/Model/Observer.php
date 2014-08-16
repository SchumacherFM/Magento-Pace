<?php

/**
 * @category    SchumacherFM_Pace
 * @package     Observer
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     The MIT License (MIT)
 */
class SchumacherFM_Pace_Model_Observer
{
    protected $_type = 'backend';

    /**
     * adminhtml_block_html_before
     *
     * @param Varien_Event_Observer $observer
     *
     * @return null
     */
    public function injectPace(Varien_Event_Observer $observer)
    {
        /** @var Mage_Core_Block_Abstract $block */
        $block = $observer->getEvent()->getBlock();

        if (false === $this->_isAllowed($block)) {
            return null;
        }
        /** @var Varien_Object $transport */
        $transport = $observer->getEvent()->getTransport();
        $html      = $transport->getHtml();
        $transport->setHtml($this->_getPaceHtml() . $html);
    }

    /**
     * @param Mage_Core_Block_Abstract $block
     *
     * @return bool
     */
    protected function _isAllowed(Mage_Core_Block_Abstract $block)
    {
        if ($block instanceof Mage_Adminhtml_Block_Page_Head) {
            return true;
        }
        if (true === Mage::helper('magepace')->isFrontendEnabled() && $block instanceof Mage_Page_Block_Html_Head) {
            $this->_type = 'frontend';
            return true;
        }
        return false;
    }

    /**
     * gets css/js for pace.js and saves or loads it from cache
     *
     * @return string
     */
    protected function _getPaceHtml()
    {
        /** @var Varien_Cache_Core $cache */
        $cache = Mage::app()->getCache();
        $key   = array(
            Mage::app()->getStore()->getId(),
            'pace_js',
            $this->_type,
            Mage::helper('magepace')->getThemeColor(),
            Mage::helper('magepace')->getThemeFileName(),
        );

        $cacheKey = implode('_', $key);
        $pace     = $cache->load($cacheKey);
        if (true === empty($pace)) {
            $pace = $this->_getCss() . $this->_getJs();
            $cache->save($pace, $cacheKey, array(Mage_Core_Model_Layout_Update::LAYOUT_GENERAL_CACHE_TAG));
        }
        return $pace;
    }

    /**
     * @return string
     */
    protected function _getCss()
    {
        $color = Mage::helper('magepace')->getThemeColor();
        $color = true === empty($color) ? '' : $color . '/';

        return '<style type="text/css">' .
        $this->_getFile('themes/' . $color . Mage::helper('magepace')->getThemeFileName($this->_type)) .
        Mage::helper('magepace')->getCustomCSS($this->_type)
        . '</style>';
    }

    /**
     * @return string
     */
    protected function _getJs()
    {
        return '<script type="text/javascript">' .
        $this->_getFile('pace.min.js')
        . '</script>';
    }

    /**
     * @param string $file
     *
     * @return string
     */
    protected function _getFile($file)
    {
        $path    = Mage::getBaseDir() . DS . Mage_Core_Model_Store::URL_TYPE_JS . DS . 'schumacherfm' . DS . 'pace' . DS;
        $content = file_get_contents($path . $file);
        if (strpos(strtolower($file), 'css') !== false) {
            $content = $this->_compressCss($content);
        }
        return $content;
    }

    /**
     * @param $css
     *
     * @return string
     */
    protected function _compressCss($css)
    {
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        $css = str_replace(array(': ', ', '), array(':', ','), $css);
        return preg_replace('~([\r\n\t]+|\s{2,})~', '', $css);
    }
}