<?php
/**
 * Created by PhpStorm.
 * User: mgrloren
 * Date: 12/17/15
 * Time: 1:50 PM
 */

namespace App\Helpers;


class ArrayHelper
{

    public static function changeKey($array, $old_key, $new_key)
    {
        if (!array_key_exists($old_key, $array)) {
            return $array;
        }

        $keys                                = array_keys($array);
        $keys[array_search($old_key, $keys)] = $new_key;

        return array_combine($keys, $array);
    }

}