
<?php

require_once "Verificar.php";

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
  <body style="background-color: lightblue">
    <header style="text-align: center">
      <div class="container">
        <h1><p class="text-success"> Bienvenido </p></h1>
      </div>
    </header>
      <ul>
        <label for="baja"></label>
        <li><a href="Listar.php"><button type="button"  id="baja" class="btn-danger" name="btnListar" >Listar</button></a></li>
        <label for="out"></label>
        <li><button type="button" id="out" class="btn-warning" name="btnLogOut">Log Out</button></li>
        <label for="dats"></label>
        <li><a href="ListarBase.php"><button type="button" id="dats" class="btn-success" name="btnDatos">Ir a base de datos</button></a></li>
        <label for="index"></label>
        <li><a href="index.html"><button type="button" id="index" class="btn-primary" name="btnIndex">Ir al inicio</button></a></li>
      </ul>




    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
