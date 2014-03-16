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
    /**
     * adminhtml_block_html_before
     *
     * @param Varien_Event_Observer $observer
     *
     * @return null
     */
    public function injectPace(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getBlock();
        if (!$block instanceof Mage_Adminhtml_Block_Page_Head) {
            return null;
        }
        /** @var Varien_Object $transport */
        $transport = $observer->getEvent()->getTransport();
        $html      = $transport->getHtml();
        $transport->setHtml($this->_getPaceHtml() . $html);
    }

    /**
     * gets css/js for pace.js and saves or loads it from cache
     *
     * @return string
     */
    protected function _getPaceHtml()
    {
        $cache    = Mage::app()->getCache();
        $cacheKey = 'pace.js_backend';
        $pace     = $cache->load($cacheKey);
        if (false === $pace) {
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
        return '<style type="text/css">' .
        $this->_getFile('themes/' . Mage::helper('magepace')->getThemeFileName()) .
        Mage::helper('magepace')->getCustomCSS()
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
        $path    = Mage::getBaseDir(Mage_Core_Model_Store::URL_TYPE_SKIN) . DS . 'adminhtml' . DS . 'default' . DS . 'default' . DS . 'pace' . DS;
        $content = file_get_contents($path . $file);
        if (strpos(strtolower($file), 'css') !== false) {
            $content = $this->_compressCss($content);
        }
        return $content;
    }

    protected function _compressCss($css)
    {
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        $css = str_replace(array(': ', ', '), array(':', ','), $css);
//        return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
        return preg_replace('~([\r\n\t]+|\s{2,})~', '', $css);
    }
}