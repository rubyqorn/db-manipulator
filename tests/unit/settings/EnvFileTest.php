<?php

namespace Tests\Unit\Settings;

use PHPUnit\Framework\TestCase;

class EnvFileTest extends TestCase 
{
    /**
     * @return string
     */ 
    public function test_that_env_file_is_string()
    {
        $envFile = './env.ini';
        $this->assertIsString($envFile);

        return $envFile;

        $this->markTestIncomplete();
    }

    /**
     * @depends test_that_env_file_is_string
     */ 
    public function test_that_the_get_settings_from_file_return_array(string $envFile)
    {
        $env = new \Manipulator\Settings\EnvFile();

        $this->assertIsString($envFile);
        $this->assertIsArray($env->getSettingsFromFile($envFile));
    }
}