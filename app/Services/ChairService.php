<?php
/**
 * Created by PhpStorm.
 * User: mamad
 * Date: 05/06/2020
 * Time: 05:32 PM
 */

namespace App\Services;


class ChairService
{

    public function chair($job)
    {
        $output = [];
        if (count($job) > 0 ) {
            foreach ($job as $key => $a) {
//                foreach ($a as $k => $name) {
                    $output[$key] = $a;
//                }
            }
        }
        return $output;

    }


}
