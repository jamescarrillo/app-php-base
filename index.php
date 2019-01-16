<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

#Enrutador y Utilitarios
require_once "conf_app/BeanResource.php";
require_once "conf_app/ConfigurationTemplate.php";
require_once "conf_app/Routes.php";


$configurationTemplate = new ConfigurationTemplate();
$configurationTemplate->addTemplateBase();

?>