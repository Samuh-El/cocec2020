<?php
// variables de configuracion 
$dominio_sistema="http://www.eventospais.cl";
$base_de_datos="eventosp_sistema_ferial";
$host_bd="database";
$usuario_bd="eventosp_adminsf";
$password_bd="84850691";
$datoAbuscar=$_POST['correo'];

// Comprueba si conecto
$conexion=mysqli_connect($host_bd, $usuario_bd, $password_bd) 
or die("No se puede conectar a la base de datos");

if (!mysqli_select_db($conexion, $base_de_datos))
      die("No se puede conectar a la base de datosa");

      $sql=mysqli_query($conexion, "SELECT * FROM sf_visitantes WHERE correo LIKE '.$datoAbuscar.'");
      while ($row=mysqli_fetch_array($sql))
      {
      $rut=$row['rut'];
      $nombre=$row['nombre'];
      $correo=$row['correo'];
     
      // echo 'RUT:'.$rut;
      // echo '<br>';
      // echo 'Nombre:'.$nombre;
      // echo '<br>';
      // echo 'Correo:'.$correo;
      // echo '<br>';
      // echo 'Consulta realizada exitosamente';
      }

      $sql=mysqli_query($conexion, "SELECT * FROM sf_asistencias WHERE fk_visitante=$rut AND fk_evento=3103");


      while ($row=mysqli_fetch_array($sql))
      {
            echo("<br>Existe en ambas tablas.");
            $existe=true;
      }

      if($existe==true)
      {
            // Si se comprueba el dato en ambas tablas...
            echo("<br>Comprobaci&oacute;n exitosa.");
      }
      
      else
      {
            echo("<br>Comprobaci&oacute;n fallida.");
      }
?>
