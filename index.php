<?php 

error_reporting(-1);

require_once './vendor/autoload.php';

use Manipulator\Settings\SettingsHandler;

$config = new SettingsHandler();
$config->setDatabaseSettings();
