<?php
class ConfigurationTemplate{

    public function addTemplateBase(){
		include "view/template.php";
    }

    public function addContainer(){
        /*CONTENEDOR CAMBIANTE DE ACUERDO AL MODULO E ITEM */
        $routes = new Routes();
        $res = $routes->getResourceForContainer();
        include $res;
    }
    
}