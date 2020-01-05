<?php

namespace Manipulator\Settings;

class SettingsHandler
{
    /**
     * @var \Manipulator\Settings\EnvFile
     */ 
    protected $envFileHandler;
    
    /**
     * @var \Manipulator\Settings\ConfigFile
     */ 
    protected $configFileHandler;

    public function __construct()
    {
        $this->configFileHandler = new ConfigFile();
        $this->envFileHandler = new EnvFile();
    }

    /**
     * Set settings from env.ini file and 
     * put PHP code into config/settings.php 
     * file
     * 
     * @return bool
     */ 
    public function setDatabaseSettings()
    {
        $envFile = $this->envFileHandler->getSettingsFromFile('./env.ini');
        $settingsFile = $this->configFileHandler->getSettingsFromFile('./config/settings.php');

        $this->configFileHandler->putContentInFile('./config/settings.php', 'w', "<?php
            return \$settings = [
                'driver' => '{$envFile['DB_DRIVER']}',
                'host' => '{$envFile['DB_HOST']}',
                'db_user' => '{$envFile['DB_USER']}',
                'db_password' => '{$envFile['DB_PASSWORD']}',
                'db_name' => '{$envFile['DB_NAME']}',
            ];
        ");
    }



}