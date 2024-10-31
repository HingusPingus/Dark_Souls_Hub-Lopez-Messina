<!DOCTYPE html>
<?php
    $server_name="127.0.0.1";
    $password="alumnoipm";
    $user="alumno";
    $database_name="dar_soul";

    $conexion = mysqli_connect($server_name, $user, $password, $database_name);

    $tipo=$_GET["tipo"];
    $query="select titulo, categorias.descripcion from categorias join secciones on categorias_codigo=categorias.codigo where secciones.codigo=$tipo";
    $query2="select nombre, descripcion from secciones where codigo=$tipo";
    $query3="select categorias_codigo from secciones where codigo=$tipo";
    $query4="select * from armas";
    $query5="select * from armadura";
    $query6="select * from arcos";
    $query7="select * from escudos";
    $query8="select * from anillos";
    $query9="select * from catalizadores";
    $query10="select objetos.* from objetos join obj_tipo on codigo_obj_tipo=obj_tipo.codigo where obj_tipo.codigo=2";
    $query11="select objetos.* from objetos join obj_tipo on codigo_obj_tipo=obj_tipo.codigo where obj_tipo.codigo=1";
    $query12="select objetos.* from objetos join obj_tipo on codigo_obj_tipo=obj_tipo.codigo where obj_tipo.codigo=3";
    $query13="select objetos.* from objetos join obj_tipo on codigo_obj_tipo=obj_tipo.codigo where obj_tipo.codigo=4";
    $query14="select * from magias where tipo='Hechizo'";
    $query15="select * from magias where tipo='Piromancia'";
    $query16="select * from magias where tipo='Milagro'";
    $query17="select * from zona where parte='e'";
    $query18="select * from zona where parte='m'";
    $query19="select * from zona where parte='l'";
    $query20="select * from zona where parte='o'";
    $res20=mysqli_query($conexion, $query20);
    $res19=mysqli_query($conexion, $query19);
    $res18=mysqli_query($conexion, $query18);
    $res17=mysqli_query($conexion, $query17);
    $res16=mysqli_query($conexion, $query16);
    $res15=mysqli_query($conexion, $query15);
    $res14=mysqli_query($conexion, $query14);
    $res13=mysqli_query($conexion, $query13);
    $res12=mysqli_query($conexion, $query12);
    $res11=mysqli_query($conexion, $query11);
    $res10=mysqli_query($conexion, $query10);
    $res9=mysqli_query($conexion, $query9);
    $res8=mysqli_query($conexion, $query8);
    $res7=mysqli_query($conexion, $query7);
    $res6=mysqli_query($conexion, $query6);
    $res5=mysqli_query($conexion, $query5);
    $res=mysqli_query($conexion, $query);
    $res2=mysqli_query($conexion, $query2);
    $res3=mysqli_query($conexion, $query3);
    $res4=mysqli_query($conexion, $query4);
    $nombre_sec=mysqli_fetch_assoc($res);
    $sec=mysqli_fetch_assoc($res2);
    $cat=mysqli_fetch_assoc($res3);
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style10.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="conteiner">
        <header>
            <div id="cosas">
                <div id="cosasdarriba">
                    <a id="logo_head" href="../index.html"><img id="logo" src="../imagenes/Logan Paul1 1 1.png" alt="logo"></a>
                    <a href="../menu_categoria/items.php?tipo=3" class="secciones">
                        <h3 class="seccion">Items</h3>
                    </a>
                    <a href="../menu_categoria/items.php?tipo=2" class="secciones">
                        <h3 class="seccion">Equipables</h3>
                    </a>
                    <a href="../menu_categoria/items.php?tipo=4" class="secciones">
                        <h3 class="seccion">Magias</h3>
                    </a>
                    <a href="../menu_categoria/items.php?tipo=5" class="secciones">
                        <h3 class="seccion">Zonas</h3>
                    </a>
                    <select name="xd" id="cositas">
                        <option value="" disabled selected>Categorias</option>
                        <option>Items</option>
                        <option>Equipables</option>
                        <option>Enemigos</option>
                        <option>Zonas</option>
                    </select>
                    <div class="box">
                        <input type="text" placeholder="Search...">
                        <a href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <div id="big_box">
                <div id="box_1">
                    <div id="info">
                        <h1 class="font_1"><?php echo $nombre_sec["titulo"] ?></h1>
                    </div>
                    <div id="info_2">
                        <h2 class="font_1"><?php echo $nombre_sec["descripcion"] ?></h2>
                    </div>
                    <div id="list_info" >
                        <div id="list_info_text">
                            <div class="info_interior">
                                <h1 class="font_1"><?php echo $sec["nombre"]?></h1>
                            </div>
                            <div class="info_interior2">
                                <h2 class="font_2"><?php echo $sec["descripcion"]?></h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div id="box_2">
                    
                    <?php if($tipo==17){?>
                    <table style="width: 100%;">
                        <tr id="cosinhas">
                                <th class="font_4" >Icono</th>
                                <th class="font_5" style="border-left: 1px solid goldenrod;">Durabilidad</th>
                                <th class="font_6" style="border-left: 1px solid goldenrod;">Peso</th>
                                <th class="font_7" style="border-left: 1px solid goldenrod;">Daño</th>
                                <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                            
                        </tr>
                        <?php while($fila=mysqli_fetch_assoc($res4)){?>
                        <tr class="ponesacosahorrorosaahi">
                            
                            <td class="fotaza">
                                <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                    <img class="foton" src=<?php echo $fila["imagen"]?> >
                                    <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                </a>
                            </td>
                            
                            <td class="parte_tabla1">
                                <h4 class="font_11"><?php echo $fila["durabilidad"]?></h4>
                            </td>
                            <td class="parte_tabla2">
                                <h4 class="font_11"><?php echo $fila["peso"]?></h4>
                            </td>
                            <td class="parte_tabla3">
                                <h4 class="font_11"><?php echo $fila["daño"]?></h4>
                            </td>
                            <td class="parte_tabla4">
                                <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                            </td>
                            <td class="parte_tabla5">
                                <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                            </td>
                            <td class="parte_tabla6">
                                <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                            </td>
                        </tr>
                            <?php }}
                        else if($tipo==18){?>
                        <table style="width: 100%;">
                            <tr id="cosinhas">
                                <th class="font_4" >Icono</th>
                                <th class="font_5" style="border-left: 1px solid goldenrod;">Durabilidad</th>
                                <th class="font_6" style="border-left: 1px solid goldenrod;">Peso</th>
                                <th class="font_7" style="border-left: 1px solid goldenrod;">Resistencia</th>
                                <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                            
                        </tr>
                        <?php while($fila1=mysqli_fetch_assoc($res5)){?>
                        <tr class="ponesacosahorrorosaahi">
                            
                            <td class="fotaza">
                                <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila1["codigo"]?>">
                                    <img class="foton" src=<?php echo $fila1["imagen"]?> >
                                    <h4 class="font_11"><?php echo $fila1["nombre"]?></h4>
                                </a>
                            </td>
                            <td class="parte_tabla1">
                                <h4 class="font_11"><?php echo $fila1["durabilidad"]?></h4>
                            </td>
                            <td class="parte_tabla2">
                                <h4 class="font_11"><?php echo $fila1["peso"]?></h4>
                            </td>
                            <td class="parte_tabla3">
                                <h4 class="font_11"><?php echo $fila1["defensa"]?></h4>
                            </td>
                            <td class="parte_tabla4">
                                <h4 class="font_11"><?php echo $fila1["lore"]?></h4>
                            </td>
                            <td class="parte_tabla5">
                                <h4 class="font_11"><?php echo $fila1["ubicacion"]?></h4>
                            </td>
                            <td class="parte_tabla6">
                                <h4 class="font_11"><?php echo $fila1["tipo"]?></h4>
                            </td>
                        </tr>
                            <?php }}
                        else if($tipo==20){?>
                    <table style="width: 100%;">
                        <tr id="cosinhas">
                                <th class="font_4" >Icono</th>
                                <th class="font_5" style="border-left: 1px solid goldenrod;">Durabilidad</th>
                                <th class="font_6" style="border-left: 1px solid goldenrod;">Peso</th>
                                <th class="font_7" style="border-left: 1px solid goldenrod;">Daño</th>
                                <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                            
                        </tr>
                        <?php while($fila=mysqli_fetch_assoc($res6)){?>
                        <tr class="ponesacosahorrorosaahi">
                            
                            <td class="fotaza">
                                <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                    <img class="foton" src=<?php echo $fila["imagen"]?> >
                                    <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                </a>
                            </td>
                            <td class="parte_tabla1">
                                <h4 class="font_11"><?php echo $fila["durabilidad"]?></h4>
                            </td>
                            <td class="parte_tabla2">
                                <h4 class="font_11"><?php echo $fila["peso"]?></h4>
                            </td>
                            <td class="parte_tabla3">
                                <h4 class="font_11"><?php echo $fila["daño"]?></h4>
                            </td>
                            <td class="parte_tabla4">
                                <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                            </td>
                            <td class="parte_tabla5">
                                <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                            </td>
                            <td class="parte_tabla6">
                                <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                            </td>
                        </tr>
                            <?php }}
                        else if($tipo==19){?>
                    <table style="width: 100%;">
                        <tr id="cosinhas">
                                <th class="font_4" >Icono</th>
                                <th class="font_5" style="border-left: 1px solid goldenrod;">Durabilidad</th>
                                <th class="font_6" style="border-left: 1px solid goldenrod;">Peso</th>
                                <th class="font_7" style="border-left: 1px solid goldenrod;">Resistencia</th>
                                <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                <th class="font_10" style="border-left: 1px solid goldenrod;">Pasiva</th>
                            
                        </tr>
                        <?php while($fila=mysqli_fetch_assoc($res7)){?>
                        <tr class="ponesacosahorrorosaahi">
                            
                            <td class="fotaza">
                                <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                    <img class="foton" src=<?php echo $fila["imagen"]?> >
                                    <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                </a>
                            </td>
                            <td class="parte_tabla1">
                                <h4 class="font_11"><?php echo $fila["durabilidad"]?></h4>
                            </td>
                            <td class="parte_tabla2">
                                <h4 class="font_11"><?php echo $fila["peso"]?></h4>
                            </td>
                            <td class="parte_tabla3">
                                <h4 class="font_11"><?php echo $fila["reduccion_daño"]?></h4>
                            </td>
                            <td class="parte_tabla4">
                                <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                            </td>
                            <td class="parte_tabla5">
                                <h4 class="font_11"><?php echo $fila["ubicación"]?></h4>
                            </td>
                            <td class="parte_tabla6">
                                <h4 class="font_11"><?php echo $fila["pasiva"]?></h4>
                            </td>
                        </tr>
                            <?php }}
                        else if($tipo==21){ 
                            while($fila=mysqli_fetch_assoc($res8)){?>
                            <div class="listaza">
                                <div class="fotazaL">
                                    <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                        <img class="fotonaza" src=<?php echo $fila["imagen"]?> >
                                        <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                    </a>
                                </div>
                                </div>
                            <?php }}
                            else if($tipo==22){?>
                    <table style="width: 100%;">
                        <tr id="cosinhas">
                                <th class="font_4" >Icono</th>
                                <th class="font_5" style="border-left: 1px solid goldenrod;">Durabilidad</th>
                                <th class="font_6" style="border-left: 1px solid goldenrod;">Peso</th>
                                <th class="font_7" style="border-left: 1px solid goldenrod;">Daño</th>
                                <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                            
                        </tr>
                        <?php while($fila=mysqli_fetch_assoc($res9)){?>
                        <tr class="ponesacosahorrorosaahi">
                            
                            <td class="fotaza">
                                <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                    <img class="foton" src=<?php echo $fila["imagen"]?> >
                                    <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                </a>
                            </td>
                            <td class="parte_tabla1">
                                <h4 class="font_11"><?php echo $fila["durabilidad"]?></h4>
                            </td>
                            <td class="parte_tabla2">
                                <h4 class="font_11"><?php echo $fila["peso"]?></h4>
                            </td>
                            <td class="parte_tabla3">
                                <h4 class="font_11"><?php echo $fila["daño"]?></h4>
                            </td>
                            <td class="parte_tabla4">
                                <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                            </td>
                            <td class="parte_tabla5">
                                <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                            </td>
                            <td class="parte_tabla6">
                                <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                            </td>
                        </tr>
                            <?php }}
                            else if($tipo==5){ 
                                while($fila=mysqli_fetch_assoc($res10)){?>
                                <div class="listaza">
                                    <div class="fotazaL">
                                        <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                            <img class="fotonaza" src=<?php echo $fila["imagen"]?> >
                                            <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                        </a>
                                    </div>
                                    </div>
                            <?php }}
                            else if($tipo==6){ 
                                while($fila=mysqli_fetch_assoc($res11)){?>
                                <div class="listaza">
                                    <div class="fotazaL">
                                        <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                            <img class="fotonaza" src=<?php echo $fila["imagen"]?> >
                                            <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                        </a>
                                    </div>
                                </div>
                            <?php }}
                            else if($tipo==7){ 
                                while($fila=mysqli_fetch_assoc($res12)){?>
                                <div class="listaza">
                                    <div class="fotazaL">
                                        <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                            <img class="fotonaza" src=<?php echo $fila["imagen"]?> >
                                            <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                        </a>
                                    </div>
                                </div>
                            <?php }}
                            else if($tipo==8){ 
                                while($fila=mysqli_fetch_assoc($res13)){?>
                                <div class="listaza">
                                    <div class="fotazaL">
                                        <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                            <img class="fotonaza" src=<?php echo $fila["imagen"]?> >
                                            <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                        </a>
                                    </div>
                                </div>
                            <?php }}
                            else if($tipo==9){?>
                                <table style="width: 100%;">
                                    <tr id="cosinhas">
                                            <th class="font_4" >Icono</th>
                                            <th class="font_5" style="border-left: 1px solid goldenrod;">Usos</th>
                                            <th class="font_6" style="border-left: 1px solid goldenrod;">Int req</th>
                                            <th class="font_7" style="border-left: 1px solid goldenrod;">Fai req</th>
                                            <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                            <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                            <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                                        
                                    </tr>
                                    <?php while($fila=mysqli_fetch_assoc($res14)){
                                        $codigo=$fila["codigo"]?>
                                    <tr class="ponesacosahorrorosaahi">
                                        
                                        <td class="fotaza">
                                            <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                <img class="foton" src=<?php echo $fila["imagen"]?> >
                                                <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                            </a>
                                        </td>
                                        <td class="parte_tabla1">
                                            <h4 class="font_11"><?php echo $fila["usos"]?></h4>
                                        </td> 
                                        <td class="parte_tabla2">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=3"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla3">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=4"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla4">
                                            <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                                        </td>
                                        <td class="parte_tabla5">
                                            <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                                        </td>
                                        <td class="parte_tabla6">
                                            <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                                        </td>
                                    </tr>
                                        <?php }}
                            else if($tipo==10){?>
                                <table style="width: 100%;">
                                    <tr id="cosinhas">
                                            <th class="font_4" >Icono</th>
                                            <th class="font_5" style="border-left: 1px solid goldenrod;">Usos</th>
                                            <th class="font_6" style="border-left: 1px solid goldenrod;">Int req</th>
                                            <th class="font_7" style="border-left: 1px solid goldenrod;">Fai req</th>
                                            <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                            <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                            <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                                        
                                    </tr>
                                    <?php while($fila=mysqli_fetch_assoc($res15)){
                                        $codigo=$fila["codigo"]?>
                                    <tr class="ponesacosahorrorosaahi">
                                        
                                        <td class="fotaza">
                                            <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                <img class="foton" src=<?php echo $fila["imagen"]?> >
                                                <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                            </a>
                                        </td>
                                        <td class="parte_tabla1">
                                            <h4 class="font_11"><?php echo $fila["usos"]?></h4>
                                        </td> 
                                        <td class="parte_tabla2">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=3"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla3">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=4"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla4">
                                            <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                                        </td>
                                        <td class="parte_tabla5">
                                            <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                                        </td>
                                        <td class="parte_tabla6">
                                            <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                                        </td>
                                    </tr>
                                        <?php }}
                            else if($tipo==11){?>
                                <table style="width: 100%;">
                                    <tr id="cosinhas">
                                            <th class="font_4" >Icono</th>
                                            <th class="font_5" style="border-left: 1px solid goldenrod;">Usos</th>
                                            <th class="font_6" style="border-left: 1px solid goldenrod;">Int req</th>
                                            <th class="font_7" style="border-left: 1px solid goldenrod;">Fai req</th>
                                            <th class="font_8" style="border-left: 1px solid goldenrod;">Lore</th>
                                            <th class="font_9" style="border-left: 1px solid goldenrod;">Conseguido de:</th>
                                            <th class="font_10" style="border-left: 1px solid goldenrod;">Tipo</th>
                                        
                                    </tr>
                                    <?php while($fila=mysqli_fetch_assoc($res16)){
                                        $codigo=$fila["codigo"]?>
                                    <tr class="ponesacosahorrorosaahi">
                                        
                                        <td class="fotaza">
                                            <a class="fotonacita" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                <img class="foton" src=<?php echo $fila["imagen"]?> >
                                                <h4 class="font_11"><?php echo $fila["nombre"]?></h4>
                                            </a>
                                        </td>
                                        <td class="parte_tabla1">
                                            <h4 class="font_11"><?php echo $fila["usos"]?></h4>
                                        </td> 
                                        <td class="parte_tabla2">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=3"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla3">
                                            <h4 class="font_11"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select req_num from reqmagias where magias_codigo=$codigo and req_codigo=4"))["req_num"]?></h4>
                                        </td>
                                        <td class="parte_tabla4">
                                            <h4 class="font_11"><?php echo $fila["lore"]?></h4>
                                        </td>
                                        <td class="parte_tabla5">
                                            <h4 class="font_11"><?php echo $fila["ubicacion"]?></h4>
                                        </td>
                                        <td class="parte_tabla6">
                                            <h4 class="font_11"><?php echo $fila["tipo"]?></h4>
                                        </td>
                                    </tr>
                                        <?php }}
                                        else if($tipo==13){ 
                                            while($fila=mysqli_fetch_assoc($res17)){?>
                                            <div class="listaza">
                                                <div class="fotazaL">
                                                    <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                        <img class="fotonz" src=<?php echo $fila["imagen"]?> >
                                                        <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }}
                                        else if($tipo==14){ 
                                            while($fila=mysqli_fetch_assoc($res18)){?>
                                            <div class="listaza">
                                                <div class="fotazaL">
                                                    <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                        <img class="fotonz" src=<?php echo $fila["imagen"]?> >
                                                        <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }}
                                        else if($tipo==15){ 
                                            while($fila=mysqli_fetch_assoc($res19)){?>
                                            <div class="listaza">
                                                <div class="fotazaL">
                                                    <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                        <img class="fotonz" src=<?php echo $fila["imagen"]?> >
                                                        <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }}
                                        else if($tipo==16){ 
                                            while($fila=mysqli_fetch_assoc($res20)){?>
                                            <div class="listaza">
                                                <div class="fotazaL">
                                                    <a class="fotonacitaL" href="../Items_pag/armas.php?tipo=<?php echo $tipo?>&tipo2=<?php echo $fila["codigo"]?>">
                                                        <img class="fotonz" src=<?php echo $fila["imagen"]?> >
                                                        <h2 class="font_12"><?php echo $fila["nombre"]?></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }}?>
                    </table>
                </div>
            </div>
        </main>
        <footer>
            <form action="../reportebug.php" method="post" id="reportebug">
            <div id="reporte">
                <h3 style="margin-right: 5px;">Reportar un bug:</h3>
                <textarea style=" line-height:20px;" name="reporte" id="bug" placeholder="Describa detalladamente el bug"></textarea>
                
            </div>
            <button style="border: none; margin-left: 10px; line-height:20px;height:25px;"> Enviar</button>
            </form>
        </footer>
    </div>
    
</body>
</html>