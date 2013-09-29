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
    public function getThemeFileName()
    {
        return Mage::getStoreConfig('system/magepace/pace_theme');

    }
}