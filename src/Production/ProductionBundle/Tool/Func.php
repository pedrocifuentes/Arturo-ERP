<?php

/**
 * 
 */

namespace Production\ProductionBundle\Func;

/**
 * 
 */
class Func {

    public function toSlug($str) {

        $clean = strtolower(trim($str, '-'));
        $clean = preg_replace(" /[^\p{Latin}0-9\/_|+ -]+/u", '', $clean);
        $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
        $clean = trim($clean, '-');

        return $clean;
    }

}

?>
