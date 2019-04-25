<?php

namespace Modules\CommonModule\Helper;

/**
 * Trait used to convert Arabic numerals.
 */
trait convertArabicNumerals
{
    /**
     * Convert Arabic Numerals.
     *
     * @param   [type]  $arabic  [$arabic description]
     *
     * @return  [type]           [return description]
     */
    function convertArabicNumbers($arabic) {
        $trans = array(
            "٠" => "0",
            "١" => "1",
            "٢" => "2",
            "٣" => "3",
            "٤" => "4",
            "٥" => "5",
            "٦" => "6",
            "٧" => "7",
            "٨" => "8",
            "٩" => "9",
        );
        return strtr($arabic, $trans);
    }
}

