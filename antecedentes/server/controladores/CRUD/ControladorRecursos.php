<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Recursos.php');
class ControladorRecursos extends ControladorBase
{
   function crear(Recursos $recursos)
   {
      $sql = "INSERT INTO Recursos (idRecursos,idTipoRecursos,descripcion,titulo,imagen,adjunto) VALUES (?,?,?,?,?,?);";
      $parametros = array($recursos->idRecursos,$recursos->idTipoRecursos,$recursos->descripcion,$recursos->titulo,$recursos->imagen,$recursos->adjunto);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Recursos $recursos)
   {
      $parametros = array($recursos->idRecursos,$recursos->idTipoRecursos,$recursos->descripcion,$recursos->titulo,$recursos->imagen,$recursos->adjunto,$recursos->id);
      $sql = "UPDATE Recursos SET idRecursos = ?,idTipoRecursos = ?,descripcion = ?,titulo = ?,imagen = ?,adjunto = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Recursos WHERE id = ?;";
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
         $sql = "SELECT * FROM Recursos;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Recursos WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Recursos LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Recursos;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Recursos WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Recursos WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Recursos WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Recursos WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}