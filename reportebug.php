<?php
    $reporte=$_POST["reporte"];
    $server_name="127.0.0.1";
    $password="alumnoipm";
    $user="alumno";
    $database_name="dar_soul";

    $conexion = mysqli_connect($server_name, $user, $password, $database_name);
    $query = "insert into bugs values(null,'$reporte');";
    $resultado=mysqli_query($conexion, $query);
    header("Location: index.html");
?>
