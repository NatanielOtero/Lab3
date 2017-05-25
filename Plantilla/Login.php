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
    <div class="container" >
      <form method="post" id="form">
          <div class="form-group">
            <div class="section">
              <label for="user"></label>
              <input type="text" class="form-control"  name="Usuario" id="user" placeholder="Usuario" required>
              <label for="pass"></label>
              <input type="password" class="form-control" name="Pass" id="pass" placeholder="Contraseña" required>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-xs-2">
                  <input type="submit" class="btn-success" name="Logear" value="Logear" onclick="Logear()">
              </div>
            </div>
            <h1><a href="index.html"><button type="button" class="btn-primary" name="button">Volver</button></a></h1>
          </div>
      </form>
    </div>
    <script type="text/javascript" src="jquery/jquery.js">
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function AdministrarGif(mostrar, cual){

    	var gif = cual === 1 ? "Estilos/gif-load.gif" : "Estilos/200.webp";

    	if(mostrar){
    		$("#divGif").css("display", "block");
    		$("#divGif").css("top", "50%");
    		$("#divGif").css("left", "45%");
    		$("#imgGif").attr("src", gif);
    	}

    	if(!mostrar){
    		$("#divGif").css("display", "none");
    		$("#imgGif").attr("src", "");
    	}

      }
    function Logear()
    {

      AdministrarGif(true, 2);
      $.ajax({
        url: 'Login.php',
        type: 'POST',
        data: $("#form").serialize(),
        success: function(data)
        {
          $("#resp").html(html)

        }
      })
      .done(function() {
        AdministrarGif(false);
        console.log("success");
      })
      .fail(function() {
        AdministrarGif(false);
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      })

    }
    </script>
  </body>
</html>
<?php

///ARCHIVOS///

if(isset($_POST["Logear"]))
{
  ////ALTA////
  $user = new Sesion($_POST["Usuario"],$_POST["Pass"]);
  $array = DevolverDatos();
  foreach ($array as $valor) {
    if($valor==$user)
    {
      session_start();
      $_SESSION["Usuario"] = $user;
      sleep(2);
      echo "Usuario Correcto";
      header("location: Menu.php");
      break;
    }
  }

}
/**
 *
 */
class Sesion
{
  private $user;
  private $pass;

  function __construct($us,$pas)
  {
    $this->user = $us;
    $this->pass = $pas;

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
      $pass = $datos[2];
      $ses = new Sesion($user,$pass);
      array_push($array,$ses);

    }

  }
  fclose($archivo);
  return $array;

}


 ?>
