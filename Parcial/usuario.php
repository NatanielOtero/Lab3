<?php

  class usuario
  {
      private $_nombre,$_email,$_edad,$_clave;
      function __construct($name,$pass,$mail,$edad)
      {
          $this->_nombre=$name;
          $this->_email=$mail;
          $this->_edad=$edad;
          $this->_clave=$pass;
      }

      function ToString()
      {
          return $this->_nombre."-".$this->_clave." ".$this->_email." ".$this->_edad;
      }
  }

?>
