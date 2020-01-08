<?php

namespace Manipulator;

use Manipulator\Settings\SettingsHandler;
use Manipulator\Settings\ConfigFile;
use Manipulator\Exceptions\WrongSettings;
use PDO;

class Connector
{
    /**
     * @var \PDO
     */ 
    protected $connection;
    
    /**
     * @var \Manipulator\Settings\SettingsHandler
     */ 
    protected $settingsHandler;

    /**
     * \@var \Manipulator\Settings\ConfigFile
     * */ 
    protected $configFileHandler;
    
    /**
     * Contains an array with user settings 
     * from env.ini file
     * 
     * @var array
     */ 
    private $settings;


    public function __construct()
    {
        $this->configFileHandler = new ConfigFile();
        $this->settingsHandler = new SettingsHandler();
        $this->settingsHandler->setDatabaseSettings(); 
        $this->connection();
    }

    /**
     * Set connection with database
     * 
     * @return \PDO
     */ 
    protected function connection()
    {
        if (empty($this->getSettings())) {
            throw new WrongSettings('The getSettings method doesnt return a settings array');
        }

        $this->settings = $this->getSettings();

        if (!isset($this->connection)) {
            return $this->connection = new PDO(
                "{$this->settings['driver']}:host={$this->settings['host']};
                dbname={$this->settings['db_name']}", "{$this->settings['db_user']}", 
                "{$this->settings['db_password']}");
            }

        return $this->connection;
    }

    /**
     * Check if setting file is exists
     * and return settings array from 
     * this file
     * 
     * @return array
     */ 
    public function getSettings()
    {
        if ($this->configFileHandler->getSettingsFromFile('./config/settings.php')) {
            require './config/settings.php';

            return $settings;
        }
    }

    private function __wakeup()
    {
        //
    }

    private function __clone()
    {
        //
    }
}