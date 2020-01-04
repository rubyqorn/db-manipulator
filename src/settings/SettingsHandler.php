<?php

namespace Manipulator\Settings;


class SettingsHandler
{
    protected $file;
    protected $envFileHandler;
    protected $configFileHandler;

    public function __construct()
    {
        $this->configFileHandler = new ConfigFile();
        $this->envFileHandler = new EnvFile();
        // $this->file = new File();
    }

    public function setDatabaseSettings()
    {
        $envFile = $this->envFileHandler->getSettingsFromFile('./env.ini');
        $settingsFile = $this->configFileHandler->getSettingsFromFile('./config/settings.php');

        $this->configFileHandler->putContentInFile('./config/settings.php', 'w', "<?php
            return [
                'driver' => '{$envFile['DB_DRIVER']}',
                'host' => '{$envFile['DB_HOST']}',
                'db_user' => '{$envFile['DB_USER']}',
                'db_password' => '{$envFile['DB_PASSWORD']}',
                'db_name' => '{$envFile['DB_NAME']}',
            ];
        ");
    }



}