<?php
class Cuenta
{
   public $idCuenta;
   public $idUsuario;
   public $contraseña;

   function __construct(int $idCuenta,int $idUsuario,string $contraseña){
      $this->idCuenta = $idCuenta;
      $this->idUsuario = $idUsuario;
      $this->contraseña = $contraseña;
   }
}
?>