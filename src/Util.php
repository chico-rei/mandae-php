<?php

namespace ChicoRei\Packages\Mandae;

class Util
{
    /**
     * Remove all null values from array
     *
     * @param array|null $array
     * @return array|null
     */
    public static function cleanArray(?array &$array): ?array
    {
        if (is_null($array)) {
            return null;
        }

        foreach ($array as $key => &$value) {
            if (is_null($value) || (is_array($value) && count($value) === 0)) {
                unset($array[$key]);
            } elseif (is_array($value)) {
                Util::cleanArray($value);
            }
        }

        return $array;
    }
}
