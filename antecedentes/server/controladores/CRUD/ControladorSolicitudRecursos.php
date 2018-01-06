<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/SolicitudRecursos.php');
class ControladorSolicitudRecursos extends ControladorBase
{
   function crear(SolicitudRecursos $solicitudrecursos)
   {
      $sql = "INSERT INTO SolicitudRecursos (idSolicitudRecursos,idUsuario,idRecursos,fechaSolicitud,fechaConcesion,fechaEntrega) VALUES (?,?,?,?,?,?);";
      $parametros = array($solicitudrecursos->idSolicitudRecursos,$solicitudrecursos->idUsuario,$solicitudrecursos->idRecursos,$solicitudrecursos->fechaSolicitud,$solicitudrecursos->fechaConcesion,$solicitudrecursos->fechaEntrega);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(SolicitudRecursos $solicitudrecursos)
   {
      $parametros = array($solicitudrecursos->idSolicitudRecursos,$solicitudrecursos->idUsuario,$solicitudrecursos->idRecursos,$solicitudrecursos->fechaSolicitud,$solicitudrecursos->fechaConcesion,$solicitudrecursos->fechaEntrega,$solicitudrecursos->id);
      $sql = "UPDATE SolicitudRecursos SET idSolicitudRecursos = ?,idUsuario = ?,idRecursos = ?,fechaSolicitud = ?,fechaConcesion = ?,fechaEntrega = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM SolicitudRecursos WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM SolicitudRecursos;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM SolicitudRecursos WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM SolicitudRecursos LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM SolicitudRecursos;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM SolicitudRecursos WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM SolicitudRecursos WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM SolicitudRecursos WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM SolicitudRecursos WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}