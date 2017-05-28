<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pagina1</title>
  </head>
  <body>
      <form method="post">
          <input type="password" name="Pass" value="">
          <input type="mail" name="mail" value="">
          <input type="submit" name="enviar" value="Enviar">
      </form>
  </body>
</html>

<?php

    $verificar = isset($_POST["enviar"]) ? TRUE : FALSE;
    $band=0;
    if($verificar)
    {
        $ar = "usuarios.txt";
        if(file_exists($ar))
        {
            $file = fopen($ar,'r');
            while(!feof($file))
            {
                $lineas=fgets($file);
                $usuario=explode("-",$lineas);
                $usuario[0]=trim($usuario[0]);
                if($usuario[0] != "")
                {
                    if(strncmp($usuario[1],$_POST["Pass"],strlen($usuario[1]))==0 && strncmp($usuario[2],$_POST["mail"],strlen($usuario[2]))==0)
                    {
                        echo "<a href='Listado.php'>Mostrar</a>";
                        $band=1;
                    }
                }
            }
            if($band){}
            else
            {echo "La contraseña y/o mail no coincide/m";}
        }

        fclose($file);
    }

?>
