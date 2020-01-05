<?php

namespace Manipulator\Settings;

class EnvFile extends File
{
    /**
     * Check if file is exists and
     * parse ini file 
     * 
     * @param string $file 
     * 
     * @return array
     */ 
    public function getSettingsFromFile(string $file)
    {
        if ($this->checkFileExists($file)) {
            return parse_ini_file($file); 
        }
    }

}