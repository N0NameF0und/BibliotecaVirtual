<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "cuenta":
            $routerCuenta = new RouterCuenta();
            return json_encode($routerCuenta->route());
            break;
         case "recursos":
            $routerRecursos = new RouterRecursos();
            return json_encode($routerRecursos->route());
            break;
         case "solicitudrecursos":
            $routerSolicitudRecursos = new RouterSolicitudRecursos();
            return json_encode($routerSolicitudRecursos->route());
            break;
         case "tiporecursos":
            $routerTipoRecursos = new RouterTipoRecursos();
            return json_encode($routerTipoRecursos->route());
            break;
         case "usuario":
            $routerUsuario = new RouterUsuario();
            return json_encode($routerUsuario->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
