<?php

include_once "Verificar.php";

?>

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
    <header>
      <div class="container">
        <h1>Listado</h1>
      </div>
    </header>
    <div class="container">
    <?php
    $array = DevolverDatos();
    if(empty($array))
    {
      session_destroy();
      header("location:index.html");
    }
    echo "<form method='post'>
        <table class='table'>
        <thead>
          <tr>
            <th>  Nombre </th>
            <th>  Mail     </th>
            <th>  Fecha      </th>
            <th>  Eliminar    </th>
          </tr>
        </thead>";
    for ($i=0; $i <count($array) ; $i++)
    {
      $array[$i]->ToString();
      echo  "<td> <input type='submit' class='btn-danger' value='Eliminar' name=".$i."></button> </td>
          </tr>";
    /*}
    for ($i=1; $i <= count($array); $i++)
        {*/
            $verificar = isset($_POST["$i"]) ? TRUE : FALSE;
            if($verificar)
            {
                  $archivo = "archivo.txt";
        					$usuarios=[];
        					if(file_exists($archivo))
        					{
                			$file = fopen($archivo,'r');
                      $j=0;
                			while(!feof($file))
        							{
        									$lineas=fgets($file);

        									if($lineas[0] != "")
        									{
                              if($i != $j)
                              {
                                  array_push($usuarios,$lineas);
                              }
        									}
                          $j++;
                			}
                			fclose($file);
        					}
        					$file = fopen($archivo, "w");

        					array_multisort($usuarios);

        					foreach( $usuarios as $usuario )
        					{
        							fwrite( $file, $usuario );
        							echo "escribi";
        					}
        					fclose($file);
                  header("location:Listar.php");
            }
        }

     ?>

     </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>





<?php

class UsuarioLista
{
  private $user;
  private $email;
  private $pass;
  private  $fecha;

  function __construct($us,$mail,$date)
  {
      $this->user = $us;
      $this->email = $mail;
      $this->fecha = $date;
  }

  function ToString()
  {
    echo "  <tr>
        	     	<td>".$this->user."</td>
        	     	<td>".$this->email."</td>
        	     	<td>".$this->fecha."</td>";

  }


}
function DevolverDatos()
{
  $array = [];
  $archivo = fopen("archivo.txt","r");
  while (!feof($archivo))
  {
    $stream = fgets($archivo);
    $datos = explode(" ",$stream);
    $datos[0] = trim($datos[0]);
    if($datos[0] != "")
    {
      $user = $datos[0];
      $mail = $datos[1];
      $date = $datos[3];
      $ses = new UsuarioLista($user,$mail,$date);
      array_push($array,$ses);

    }

  }
  fclose($archivo);

  return $array;
}





 ?>
