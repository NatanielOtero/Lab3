<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pagina1</title>
  </head>
  <body>
      <form method="post">
          <input type="text" name="Name" value="">
          <input type="password" name="Pass" value="">
          <input type="mail" name="mail" value="">
          <input type="number" name="edad" value="">
          <input type="submit" name="enviar" value="Enviar">
      </form>
  </body>
</html>

<?php
      require_once "usuario.php";

      $alta = isset($_POST["enviar"]) ? TRUE : FALSE;

      if($alta)
      {
          $usuario=new usuario($_POST["Name"],$_POST["Pass"],$_POST["mail"],$_POST["edad"]);

          $ar = "usuarios.txt";

          if(file_exists($ar))
          {
              $ar = fopen("usuarios.txt", "a");
              fwrite($ar, $_POST["Name"]."-".$_POST["Pass"]."-".$_POST["mail"]."-".$_POST["edad"]."\r\n");
          }
          else
          {
              $ar = fopen("usuarios.txt", "a");
              fwrite($ar, $_POST["Name"]."-".$_POST["Pass"]."-".$_POST["mail"]."-".$_POST["edad"]."\r\n");
          }
          fclose($ar);
      }


?>
