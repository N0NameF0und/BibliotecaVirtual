<?php
class Recursos
{
   public $idRecursos;
   public $idTipoRecursos;
   public $descripcion;
   public $titulo;
   public $imagen;
   public $adjunto;

   function __construct(int $idRecursos,int $idTipoRecursos,string $descripcion,string $titulo,string $imagen,string $adjunto){
      $this->idRecursos = $idRecursos;
      $this->idTipoRecursos = $idTipoRecursos;
      $this->descripcion = $descripcion;
      $this->titulo = $titulo;
      $this->imagen = $imagen;
      $this->adjunto = $adjunto;
   }
}
?>