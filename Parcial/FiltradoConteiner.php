<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form method="post">
          <input type="text" name="pais" placeholder="pais">
          <input type="submit" name="enviar" value="enviar">
      </form>
  </body>
</html>


<?php
    if(isset($_POST["enviar"]))
    {
    try
    {
        $pdo = new PDO("mysql:host = localhost;dbname=pp_prog_iii","root","");
        $array = [];
        //echo "Conexcion Establecida";
        $datos = $pdo->query("SELECT * FROM containers");
        $array = $datos->fetchAll(PDO::FETCH_ASSOC);

        echo "<form method='post'>
        <table class='table'>
        <thead>
          <tr>
            <th>  NUMERO </th>
            <th>  DESCRIPCION     </th>
            <th>  PAIS      </th>
            <th>  FOTO    </th>
          </tr>
        </thead>";
        for ($i=0; $i < count($array) ; $i++)
        {
          if($array[$i]["PAIS"]==$_POST["pais"])
          {echo "  <tr>
              <td>".$array[$i]["NUMERO"]."</td>
              <td>".$array[$i]["DESCRIPCION"]."</td>
              <td>".$array[$i]["PAIS"]."</td>
              <td><img src='imagenes/".$array[$i]["FOTO"]."'></td>
            </tr>";
         }
       }
         echo "</table>";}

    catch(Exception $e)
    {
        $e->getMessage();
    }
  }

?>
