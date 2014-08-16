<?php

/**
 * @category    SchumacherFM_Pace
 * @package     Model
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     The MIT License (MIT)
 */
class SchumacherFM_Pace_Model_Config_Source_ThemeColors
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $h      = Mage::helper('magepace');
        $colors = array('black', 'blue', 'green', 'orange', 'pink', 'purple', 'red', 'silver', 'white', 'yellow');
        $return = array(
            array('value' => '', 'label' => $h->__('Default'))
        );
        foreach ($colors as $color) {
            $return[] = array('value' => $color, 'label' => $h->__($color));
        }
        return $return;
    }
}
