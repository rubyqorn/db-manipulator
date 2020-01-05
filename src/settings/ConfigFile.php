<?php

namespace Manipulator\Settings;

use Manipulator\Settings\EnvFile;

class ConfigFile extends File
{
    /**
     * Check if file is exists and 
     * require it 
     * 
     * @param string $file
     * 
     * @return array
     */ 
    public function getSettingsFromFile(string $file) 
    {
        if ($this->checkFileExists($file)) {
            return require_once $file;
        }
    }
}