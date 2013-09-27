<?php
/**
 * @category    SchumacherFM_Markdown
 * @package     Observer
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
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
        if (get_class($block) !== 'Mage_Adminhtml_Block_Page_Head') {
            return NULL;
        }
        $transport = $observer->getEvent()->getTransport();

        $html = $transport->getHtml();
        $transport->setHtml(
            $this->_getCss() .
            $this->_getJs() .
            $html
        );
    }

    protected function _getCss()
    {
        return '<style type="text/css">' .
        $this->_getFile('themes/pace-theme-corner-indicator.css')
        . '</style>';
    }

    protected function _getJs()
    {
        return '<script type="text/javascript">' .
        $this->_getFile('pace.min.js')
        . '</script>';
    }

    protected function _getFile($file)
    {
        $path = Mage::getBaseDir(Mage_Core_Model_Store::URL_TYPE_SKIN) . DS . 'adminhtml' . DS . 'default' . DS . 'default' . DS . 'pace' . DS;
        return file_get_contents($path . $file);
    }
}