<?php

namespace Manipulator\Settings;

use Manipulator\Settings\EnvFile;

class ConfigFile extends File
{
    public function getSettingsFromFile(string $file) 
    {
        if ($this->checkFileExists($file)) {
            return require_once $file;
        }
    }
}