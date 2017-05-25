<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color:lightblue">
    <?php
      try {
        $pdo = new PDO("mysql:host = localhost;dbname=practica","root","");
        $array = [];
        //echo "Conexcion Establecida";
        $datos = $pdo->query("SELECT * FROM productos");
        $array = $datos->fetchAll(PDO::FETCH_ASSOC);

        $datos2 = $pdo->prepare("SELECT MIN(`Numero`) FROM `productos`");
        $datos2->execute();
        $valorIni = $datos2->fetchColumn();
        $id = $valorIni;

        echo "<form method='post'>
        <table class='table'>
        <thead>
          <tr>
            <th>  Numero </th>
            <th>  Cantidad     </th>
            <th>  Nombre      </th>
            <th>  Fabricante    </th>
            <th>  Eliminar       </th>
          </tr>
        </thead>";
        for ($i=0; $i < count($array) ; $i++) {
          echo "  <tr>
                    <td>".$array[$i]["Numero"]."</td>
                    <td>".$array[$i]["Cantidad"]."</td>
                    <td>".$array[$i]["Nombre"]."</td>
                    <td>".$array[$i]["Fabricante"]."</td>
                    <td> <input type='submit' class='btn-danger' value='Eliminar' name=".$i."></button> </td>
                  </tr>";
      $verificar = isset($_POST[$array[$i]['Numero']]) ? TRUE : FALSE;
      if($verificar)
      {

            $resultado = $i;
            $datos2 = $pdo->prepare("DELETE  FROM `productos` WHERE `numero` = :id");
            $datos->bindValue(':id',$resultado);
            $datos2->execute();

            //header("location:Listar.php");
      }
      echo "</table>";
  }


      } catch (PDOException $e) {
        echo $e->getMessage();

      }
     ?>
     <div class="container">
       <div class="row">
         <div class="col-xs-5">
           <h2><button type="button"  class="btn-success" name="button">Alta</button></h2>
         </div>
       </div>
     </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
