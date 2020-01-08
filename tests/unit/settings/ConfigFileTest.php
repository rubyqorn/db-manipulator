<?php

namespace Tests\Unit\Settings;

use PHPUnit\Framework\TestCase;

class ConfigFileTest extends TestCase 
{
    /**
     * @return string
     */ 
    public function test_that_settings_file_is_string()
    {
        $file = './config/settings.php';
        $this->assertIsString($file);
        

        return $file;

        $this->markTestIncomplete('Not realized');
    }

    /**
     * @depends test_that_settings_file_is_string
     */ 
    public function test_get_settings_from_file_return_array(string $file)
    {
        $config = new \Manipulator\Settings\ConfigFile();

        $this->assertIsString($file);
        $this->assertIsArray($config->getSettingsFromFile($file));
    }
}