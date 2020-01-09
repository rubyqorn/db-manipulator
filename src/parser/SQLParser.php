<?php

namespace Manipulator\Parser;

class SQLParser
{
    /**
     * This is the abstraction of implode PHP method
     * 
     * @param array $arr 
     * @param string $delimiter 
     * 
     * @return string
     */ 
    public function convertToString(array $arr, string $delimiter)
    {
        return implode($delimiter, $arr);
    }

    /**
     * This is abstraction of explode PHP method
     * 
     * @param string $str 
     * @param string $delimiter 
     * 
     * @return array
     */ 
    public function convertToArray(string $str, string $delimiter)
    {
        return explode($delimiter, $str);
    }
}