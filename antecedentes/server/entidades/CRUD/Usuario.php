<?php
class Usuario
{
   public $idUsuario;
   public $documentoIdentificacion;
   public $nombre;
   public $genero;
   public $fechaNacimiento;
   public $carrera;
   public $nivel;

   function __construct(int $idUsuario,string $documentoIdentificacion,string $nombre,string $genero,date $fechaNacimiento,string $carrera,string $nivel){
      $this->idUsuario = $idUsuario;
      $this->documentoIdentificacion = $documentoIdentificacion;
      $this->nombre = $nombre;
      $this->genero = $genero;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->carrera = $carrera;
      $this->nivel = $nivel;
   }
}
?>