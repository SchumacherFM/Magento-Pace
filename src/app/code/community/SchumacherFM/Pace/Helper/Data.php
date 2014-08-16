<?php

/**
 * @category    SchumacherFM_Pace
 * @package     Helper
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     The MIT License (MIT)
 */
class SchumacherFM_Pace_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @param string $type
     * @param null   $storeId
     *
     * @return mixed
     */
    public function getThemeFileName($type = 'backend', $storeId = null)
    {
        return Mage::getStoreConfig('system/magepace/' . $type . '_pace_theme', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function getThemeColor($storeId = null)
    {
        return Mage::getStoreConfig('system/magepace/backend_pace_color', $storeId);
    }

    /**
     * @param string $type
     * @param null   $storeId
     *
     * @return string
     */
    public function getCustomCSS($type = 'backend', $storeId = null)
    {
        return (string)Mage::getStoreConfig('system/magepace/' . $type . '_custom_css', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return bool
     */
    public function isFrontendEnabled($storeId = null)
    {
        return Mage::getStoreConfigFlag('system/magepace/frontend_enable', $storeId);
    }
}