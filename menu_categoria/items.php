<!DOCTYPE html>
<?php
    $server_name="127.0.0.1";
    $password="alumnoipm";
    $user="alumno";
    $database_name="dar_soul";

    $conexion = mysqli_connect($server_name, $user, $password, $database_name);

    $tipo=$_GET["tipo"];
    $query="select nombre, codigo from secciones where categorias_codigo=$tipo";
    $query2="select titulo, descripcion from categorias where codigo=$tipo";
    $query3="select imagen from categorias where codigo=$tipo";
    $res=mysqli_query($conexion, $query);
    $res2=mysqli_query($conexion, $query2);
    $res3=mysqli_query($conexion, $query3);
    $nombre_cat=mysqli_fetch_assoc($res2);
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css" type="text/css">
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
                    <a id="logo_head" href="../index.html"><img id="logo" src="imagenes/Logan Paul1 1 1.png" alt="logo"></a>
                    <a href="items.php?tipo=3" class="secciones">
                        <h3 class="seccion">Items</h3>
                    </a>
                    <a href="items.php?tipo=2" class="secciones">
                        <h3 class="seccion">Equipables</h3>
                    </a>
                    <a href="items.php?tipo=4" class="secciones">
                        <h3 class="seccion">Magias</h3>
                    </a>
                    <a href="items.php?tipo=5" class="secciones">
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
                        <h1 class="font_1"><?php
                            echo $nombre_cat["titulo"];
                        ?>
                        </h1>
                    </div>
                    <div id="info_2">
                        <h2 class="font_1"><?php
                            echo $nombre_cat["descripcion"];
                        ?></h2>
                    </div>
                    <div id="list_info" >
                        <div id="list_info_text">
                            <?php 
                                while($fila=mysqli_fetch_assoc($res)){
                                    if($tipo!=6){
                                    ?>
                                    <div class="info_interior">
                                        <a class="objetos" href="../menu_objetos/base.php?tipo=<?php echo $fila["codigo"] ?>">
                                            <h1 class="font_2"> <?php echo $fila["nombre"];?> </h1>
                                        </a>
                                    </div>
                                    <?php }
                                    else{?>
                                        <iframe id="videoyt"src= <?php echo $fila["nombre"];?> frameborder="0" allowfullscreen></iframe>
                                    <?php }} ?>
                            
                        </div>
                        <div id="list_info_photo">
                            <?php while($fila1=mysqli_fetch_assoc($res3)){
                               ?> <img id="list_info_img" src=<?php echo $fila1["imagen"]; ?> alt="estus"> 
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <form action="../reportebug.php"method="post" id="reportebug">
            <div id="reporte">
                <h3 style="margin-right: 5px; color: white;">Reportar un bug:</h3>
                <textarea name="reporte" id="bug" placeholder="Describa detalladamente el bug"></textarea>
                
            </div>
            <button style="border: none; margin-left: 10px;height:25px;"> Enviar</button>
            </form>
        </footer>
    </div>
</body>
</html>