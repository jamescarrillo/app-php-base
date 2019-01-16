<?php
class Routes{

    public function getResourceForContainer(){
		$routes = new Routes();
		//$routes = $routes->isURLValidate();
		$path_resource = "view/modules/";
		//VALIDAMOS SI ES UNA URL CORRECTA
        if($routes->isURLValidate()){
			/*CAMBIAR EL CONTEXTO DE ACUERDO AL PROYECTO. DEJAR EN <</> CUANDO ESTA EN PRODUCCIÓN */
			$context = '/james-carrillo/';
			//EXTRAEMOS EL CONTEXTO + EL PATH
			$context_path = $_SERVER['REQUEST_URI'];
			//EXTRAEMOS SOLO EL PATH DEL (CONTEXTO + PATH)
			$path = substr($context_path,strlen($context));
			//HACEMOS UN SPLIT PARA DEJAR EL PATH SIN PARAMETROS
			$values_path = explode("?",$path);
			//TOMAMOS LA PRIMERA PARTICIÓN
			$path = $values_path[0];
			//VERIFICAMOS SI EL ULTIMO CARACTER ES /
			if(substr($path,strlen($path)-1, strlen($path)) == "/"){
				//EXTRAEMOS EL PATH SIN EL CARACTER PARA QUE VALIDE BIEN NUESTRA ITERACIÓN DE ABAJO
				$path = substr($path,0,strlen($path)-1);
			}
			/*
			AQUÍ ES DONDE VAMOS A CONFIGURAR NUESTRAS PAGINAS
			//EXAMPLE -> new BeanResource(path,path_resource);
			*/
			$list_pages = array();

			/* menu1 */
			$resource = new BeanResource('menu1','menu1/item1.html');
			array_push($list_pages, $resource);
			/* submenu1 */
			$resource = new BeanResource('menu1/submenu1','menu1/submenu1/subitem1.html');
			array_push($list_pages, $resource);
			/* submenu2 */
			$resource = new BeanResource('menu1/submenu2','menu1/submenu2/subitem2.html');
			array_push($list_pages, $resource);
			/* menu2 */
			$resource = new BeanResource('menu2','menu2/item2.html');
			array_push($list_pages, $resource);
			/* menu3 */
			$resource = new BeanResource('menu3','menu3/item3.html');
			array_push($list_pages, $resource);


			$exists = false;
			foreach($list_pages as $_resource){
				if($path == $_resource->path){
					$exists = true;
					$path_resource .= $_resource->path_resource;
					break;
				}
			}
			if(!$exists){
				$path_resource .= 'index.html';
			}
        }else{
            /*URL NO VALIDO */
			$path_resource .= 'index.html';
		}
		return $path_resource;
    }

    public function isURLValidate(){
		$url_actual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if (filter_var($url_actual, FILTER_VALIDATE_URL)) {
			return true;
		} else {
			return false;
		}
	}
}