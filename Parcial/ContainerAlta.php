<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>alta</title>
  </head>
  <body>
    <form id="FormIngreso" method="post" enctype="multipart/form-data">
      <input type="numero" name="numero" placeholder="Ingrese numero"  />
      <input type="text" name="descripcion" placeholder="Ingrese descripcion"  />
      <input type="text" name="pais" placeholder="Ingrese pais">
      <input type="file" name="archivo" />

      <input type="submit" name="enviar" value="enviar" />
    </form>
  </body>
</html>
<?php
      if(isset($_POST["enviar"]))
      {
          $destino = "imagenes/" . $_FILES["archivo"]["name"];
          move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
          try
          {
              $coineter=new Conteiner($_POST["numero"],$_POST["descripcion"],$_POST["pais"],basename($_FILES["archivo"]["name"]));
          }
          catch(PDOException $e)
          {
              echo $e->getMessage();
          }
      }

      class Conteiner
      {
          function __construct($num,$des,$pais,$foto)
          {
              $pdo = new PDO("mysql:host=localhost;dbname=pp_prog_iii","root","");

              $consulta = $pdo->prepare("INSERT INTO `containers`(`NUMERO`, `DESCRIPCION`, `PAIS`, `FOTO`) VALUES (:numero,:descripcion,:pais,:foto)");
              $consulta->bindParam(":numero",$num);
              $consulta->bindParam(":descripcion",$des);
              $consulta->bindParam(":pais",$pais);
              $consulta->bindParam(":foto",$foto);

              return $consulta->execute();
          }
      }

?>
