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
    <style type="text/css" media="screen">
    @import 'Estilos/estilos.css';
  </style>
  </head>
  <body style="background-color:lightblue">
    <div class="container" >
      <form method="post" id="form">
          <div class="form-group">
            <div class="section">
              <label for="user"></label>
              <input type="text" class="form-control"  name="Usuario" id="user" placeholder="Usuario" required>
              <label for="mail"></label>
              <input type="email" class="form-control"  name="Mail" id="mail" placeholder="E-Mail" required>
              <label for="pass"></label>
              <input type="password" class="form-control" name="Pass" id="pass" placeholder="Contraseña" required>
              <label for="edad"></label>
              <input type="date" class="form-control" name="Date" id="edad" required>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-xs-2">
                  <input type="submit" class="btn-success" name="Registrarse" value="Registrarse" onclick="Reg()">
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
    function Reg()
    {
      $.ajax({
      url: 'Register.php',
      type: 'POST',
      data: $("#form").serialize(),
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
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
if (isset($_POST["Registrarse"]))
{
  $usuarios = DevolverUsuarios();
  $valido = TRUE;
  $user = new Usuario($_POST["Usuario"],$_POST["Mail"],$_POST["Pass"],$_POST["Date"]);
  foreach ($usuarios as $value) {
    if($value == $_POST["Usuario"] )
    $valido = FALSE;
  }  
  if($valido === TRUE)
  {
    if($user->Escribir($user->ToString()))
    {
       print("Registro exitoso");
    }

  }
  else {
    print("Usuario no disponible");
  }


}
class Usuario
{
  private $user;
  private $email;
  private $pass;
  private  $fecha;

  function __construct($us,$mail,$pas,$date)
  {
      $this->user = $us;
      $this->email = $mail;
      $this->pass = $pas;
      $this->fecha = $date;
  }
  function ToString()
  {
    return $this->user." " .$this->email." ".$this->pass." ".$this->fecha . "\n\r";
  }
  function Escribir($string)
  {
       $archivo = fopen("archivo.txt","a");
       if(fwrite($archivo,$string))
       {
         fclose($archivo);
         return TRUE;
       }
       else {
         fclose($archivo);
         return FALSE;
       }


  }


}
function DevolverUsuarios()
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
      array_push($array,$user);

    }

  }
  fclose($archivo);
  return $array;

}



 ?>
