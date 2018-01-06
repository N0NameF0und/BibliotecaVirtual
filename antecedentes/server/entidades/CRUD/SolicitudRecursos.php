<?php
class SolicitudRecursos
{
   public $idSolicitudRecursos;
   public $idUsuario;
   public $idRecursos;
   public $fechaSolicitud;
   public $fechaConcesion;
   public $fechaEntrega;

   function __construct(int $idSolicitudRecursos,int $idUsuario,int $idRecursos,date $fechaSolicitud,date $fechaConcesion,date $fechaEntrega){
      $this->idSolicitudRecursos = $idSolicitudRecursos;
      $this->idUsuario = $idUsuario;
      $this->idRecursos = $idRecursos;
      $this->fechaSolicitud = $fechaSolicitud;
      $this->fechaConcesion = $fechaConcesion;
      $this->fechaEntrega = $fechaEntrega;
   }
}
?>