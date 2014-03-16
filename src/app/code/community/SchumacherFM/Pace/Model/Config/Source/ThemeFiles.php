<?php

/**
 * @category    SchumacherFM_Pace
 * @package     Model
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     The MIT License (MIT)
 */
class SchumacherFM_Pace_Model_Config_Source_ThemeFiles
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $readDir = Mage::getBaseDir() . DS . Mage_Core_Model_Store::URL_TYPE_JS . DS .
            'schumacherfm' . DS . 'pace' . DS . 'themes' . DS;

        $files = glob($readDir . '*.css');

        $return = array();

        foreach ($files as $file) {
            $bFile    = basename($file);
            $return[] = array('value' => $bFile, 'label' => $bFile);
        }

        return $return;
    }
}
