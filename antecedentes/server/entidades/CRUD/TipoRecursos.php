<?php
class TipoRecursos
{
   public $idTipoRecursos;
   public $descripcion;

   function __construct(int $idTipoRecursos,string $descripcion){
      $this->idTipoRecursos = $idTipoRecursos;
      $this->descripcion = $descripcion;
   }
}
?>