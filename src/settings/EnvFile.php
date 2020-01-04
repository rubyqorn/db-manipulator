<?php

namespace Manipulator\Settings;

class EnvFile extends File
{
    public function getSettingsFromFile(string $file)
    {
        if ($this->checkFileExists($file)) {
            return parse_ini_file($file); 
        }
    }

}