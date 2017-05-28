<?php
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
              <th>  Eliminar       </th>
            </tr>
          </thead>";
          for ($i=0; $i < count($array) ; $i++)
          {
            echo "  <tr>
                <td>".$array[$i]["NUMERO"]."</td>
                <td>".$array[$i]["DESCRIPCION"]."</td>
                <td>".$array[$i]["PAIS"]."</td>
                <td><img src='imagenes/".$array[$i]["FOTO"]."'></td>
                <td> <input type='submit' class='btn-danger' value='Eliminar' name=".$i."></button> </td>
              </tr>";

              if(isset($_POST["$i"]))
              {
                  $numero=$array[$i]["NUMERO"];

                  $datos=$pdo->prepare("DELETE FROM `containers` WHERE NUMERO='$numero' ");
                  $datos->execute();

                  header("Location:ListadoBD.php");
              }
           }
           echo "</table>";
      }
      catch (PDOException $e)
      {
           echo $e->getMessage();
      }
?>
