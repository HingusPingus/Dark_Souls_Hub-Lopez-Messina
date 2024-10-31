<!DOCTYPE html>
<?php
    $server_name="127.0.0.1";
    $password="alumnoipm";
    $user="alumno";
    $database_name="dar_soul";

    $conexion = mysqli_connect($server_name, $user, $password, $database_name);

    $tipo=$_GET["tipo"];
    $tipo2=$_GET["tipo2"];
    switch ($tipo){
        case 5:$query="select * from objetos where codigo=$tipo2"; break;
        case 6:$query="select * from objetos where codigo=$tipo2"; break;
        case 7:$query="select * from objetos where codigo=$tipo2"; break;
        case 8:$query="select * from objetos where codigo=$tipo2"; break;
        case 9:$query="select * from magias where codigo=$tipo2"; break;
        case 10:$query="select * from magias where codigo=$tipo2"; break;
        case 11:$query="select * from magias where codigo=$tipo2"; break;
        case 13:$query="select * from zona where codigo=$tipo2"; break;
        case 14:$query="select * from zona where codigo=$tipo2"; break;
        case 15:$query="select * from zona where codigo=$tipo2"; break;
        case 16:$query="select * from zona where codigo=$tipo2"; break;
        case 17:$query="select * from armas where codigo=$tipo2"; break;
        case 18:$query="select * from armadura where codigo=$tipo2"; break;
        case 19:$query="select * from escudos where codigo=$tipo2"; break;
        case 20:$query="select * from arcos where codigo=$tipo2"; break;
        case 21:$query="select * from anillos where codigo =$tipo2"; break;
        case 22:$query="select * from catalizadores where codigo =$tipo2"; break;
    }
    $res=mysqli_query($conexion, $query);
    $arma=mysqli_fetch_assoc($res);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style9.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Document</title>
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
        <div id="info">
            <h1 class="font_1"> <?php echo $arma["nombre"] ?> </h1>
        </div>
        <div id="sub_big_box">
            <div id="box_1">
                <div id="desc">
                    <div style="border-top: none;" class="desc_title_box">
                            <h1 class="font_1">Descripcion:</h1>
                    </div>
                    <div class="desc_text">
                        <h2 style="line-height: 30px;" class="font_3"> "<?php echo $arma["lore"] ?>" </h2>
                    </div>
                    <?php if($tipo!=13 and $tipo!=14 and $tipo!=15 and $tipo!=16){ ?>
                    <div class="desc_title_box">
                        <h1 class="font_1">Como conseguir:</h1>
                    </div>
                    <div class="desc_text">
                        <h2 class="font_2">
                            <?php echo $arma["ubicacion"] ?> 
                        </h2>
                    </div>
                    <?php } ?>
                    <?php if($tipo!=21 and $tipo!=22 and $tipo!=5 and $tipo!=6 and $tipo!=7 and $tipo!=8 and $tipo!=9 and $tipo!=10 and $tipo!=11 and $tipo!=13 and $tipo!=14 and $tipo!=15 and $tipo!=16){ ?>
                    <div class="desc_title_box">
                        <h1 class="font_1">Material de mejora:</h1>
                    </div>
                    <div class="desc_text">
                        <h2 class="font_2">
                        <?php
                            switch($tipo){ 
                            case 17: 
                                if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from armas join objetos on material_codigo=objetos.codigo where armas.codigo=$tipo2"))["nombre"])){
                                    echo "Este item no se puede mejorar.";
                                }
                                else{
                                    echo mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from armas join objetos on material_codigo=objetos.codigo where armas.codigo=$tipo2"))["nombre"];
                                }
                                break;
                            case 18: 
                                if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from armadura join objetos on material_codigo=objetos.codigo where armadura.codigo=$tipo2"))["nombre"])){
                                    echo "Este item no se puede mejorar.";
                                }
                                else{
                                    echo mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from armadura join objetos on material_codigo=objetos.codigo where armadura.codigo=$tipo2"))["nombre"];
                                }
                                break;
                            case 19:
                                if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from escudos join objetos on material_codigo=objetos.codigo where escudos.codigo=$tipo2"))["nombre"])){
                                    echo "Este item no se puede mejorar.";
                                }
                                else{
                                    echo mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from escudos join objetos on material_codigo=objetos.codigo where escudos.codigo=$tipo2"))["nombre"];
                                }
                                break;
                            case 20:
                                if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from arcos join objetos on material_codigo=objetos.codigo where arcos.codigo=$tipo2"))["nombre"])){
                                    echo "Este item no se puede mejorar.";
                                }
                                else{
                                    echo mysqli_fetch_assoc(mysqli_query($conexion ,"select objetos.nombre from arcos join objetos on material_codigo=objetos.codigo where arcos.codigo=$tipo2"))["nombre"];
                                }
                                break;
                            }
                            ?>
                            </h2>
                         </div> <?php
                        }
                        ?>
                        
                    <?php if($tipo!=21 and $tipo!=22 and $tipo!=5 and $tipo!=6 and $tipo!=7 and $tipo!=8 and $tipo!=9 and $tipo!=10 and $tipo!=11 and $tipo!=13 and $tipo!=14 and $tipo!=15 and $tipo!=16){ ?>
                    <div class="desc_title_box">
                        <h1 class="font_1">Pasiva:</h1>
                    </div>
                    <div class="desc_text">
                        <h2 class="font_2">
                            <?php 
                                if (empty($arma["pasiva"])){
                                    echo "Este item no tiene pasiva.";
                                }
                                else{
                                    echo $arma["pasiva"];
                                }
                                
                            ?>
                        </h2>
                    </div>
                    <?php }
                    else if($tipo==21 or $tipo==5 or $tipo==6 or $tipo==7 or $tipo==8){ ?>
                        <div class="desc_title_box">
                            <h1 class="font_1">Efecto:</h1>
                        </div>
                        <div class="desc_text">
                            <h2 class="font_2">
                                <?php
                                    if (empty($arma["efecto"])){
                                        echo "Este objeto no tiene efecto.";
                                    }
                                    else{
                                        echo $arma["efecto"];
                                    }?>
                                    </h2>
                                    </div>
                                    <?php
                                } 
                                ?>
                            
                </div>
            </div>
            <div id="box_2">
                <div id="item_box">
                   <?php switch($tipo){
                        case 17:?>
                    
                    <table id="table" cellspacing=0>
                        <tr class="table_row">
                            <th>
                                <h2 class="font_1">
                                    <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                    <br>
                                    <?php echo $arma["nombre"] ?>
                                </h2>
                            </th>
                        </tr>
                        <tr class="table_row">
                            <td class="img_esc"><img style="width: 22px; height: 22px;" src="imagenes/durability.png" alt="dura"></td>
                            <td class="img_esc"> <?php echo $arma["durabilidad"] ?> </td>
                            <td class="img_esc"><img src="imagenes/weight.jpg" alt="def"></td>
                            <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["peso"] ?> </td>
                        </tr>
                        <tr class="table_row">
                            <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                            <td class="img_esc"> <?php echo $arma["daño"] ?> </td>
                            <td class="img_esc"><img src="imagenes/stability.jpg" alt="def"></td>
                            <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["reduccion_daño"] ?> </td>
                        </tr>
                        <tr class="table_row">
                            <th style="border-top:1px solid goldenrod;">
                                <h3 class="font_1">Requerimientos y escalados</h3>
                            </th>
                        </tr>
                        
                        <tr class="table_row1">
                            <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                            <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                            <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                            <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                        </tr>
                        <tr class="table_row1">
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=1"))["req_num"]?></td>
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=2"))["req_num"]?></td>
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=3"))["req_num"]?></td>
                            <td class="esc" style="border-right: 0px;"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=4"))["req_num"]?></td>
                        </tr>
                        <tr class="table_row1">
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=1"))["escalados"]?></td>
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=2"))["escalados"]?></td>
                            <td class="esc"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=3"))["escalados"]?></td>
                            <td class="esc" style="border-right: 0px;"><?php echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqarmas where armas_codigo=$tipo2 and req_codigo=4"))["escalados"]?></td>
                        </tr>
                        <tr class="table_row2">
                            <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de arma</td>
                            <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                        </tr>
                        <tr class="table_row2">
                            <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Encantable</td>
                            <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["encantable"] ?> </td>
                        </tr>
                        <tr class="table_row2">
                            <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Especial</td>
                            <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["especial"] ?> </td>
                        </tr>
                        <tr class="table_row2">
                            <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de daño</td>
                            <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo_daño"] ?> </td>
                        </tr>
                        <tr class="table_row2">
                            <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                            <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                echo "-";
                            }
                                else{
                                    echo $arma["precio"];
                                } 
                                ?> </td>
                        </tr>
                    </table> 
                    <?php ; break;
                    case 18:?>
                        <table id="table" cellspacing=0>
                            <tr class="table_row">
                                <th>
                                    <h2 class="font_1">
                                    <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                    <br>
                                    <?php echo $arma["nombre"] ?>
                                    </h2>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="img_esc"><img src="imagenes/stability.jpg" alt="def"></td>
                                <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["defensa"] ?> </td>
                            </tr>
                            <tr class="table_row">
                                <td class="img_esc"><img style="width: 22px; height: 22px;" src="imagenes/durability.png" alt="dura"></td>
                                <td class="img_esc"> <?php echo $arma["durabilidad"] ?> </td>
                                <td class="img_esc"><img src="imagenes/weight.jpg" alt="def"></td>
                                <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["peso"] ?> </td>
                            </tr>
                            <tr class="table_row2">
                                <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="6">Tipo de armadura</td>
                                <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="6"> <?php echo $arma["tipo"] ?> </td>
                            <tr class="table_row2">
                                <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> 
                                <?php 
                                    if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                    else{
                                        echo $arma["precio"];
                                    } 
                                    ?> </td>
                            </tr>
                            </tr>
                        </table>
                        <?php ; break;
                            case 19:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                                    <td class="img_esc"> <?php echo $arma["daño"] ?> </td>
                                    <td class="img_esc"><img src="imagenes/stability.jpg" alt="def"></td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["reduccion_daño"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img style="width: 22px; height: 22px;" src="imagenes/durability.png" alt="dura"></td>
                                    <td class="img_esc"> <?php echo $arma["durabilidad"] ?> </td>
                                    <td class="img_esc"><img src="imagenes/weight.jpg" alt="def"></td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["peso"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <th style="border-top:1px solid goldenrod;">
                                        <h3 class="font_1">Requerimientos y escalados</h3>
                                    </th>
                                </tr>
                                
                                <tr class="table_row1">
                                    <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                                    <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                                    <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                                    <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=1"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=1"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=2"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=2"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=3"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=3"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=4"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=4"))["req_num"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=1"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=1"))["escalados"];
                                            }
                                        ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=2"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=2"))["escalados"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=3"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=3"))["escalados"]; 
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=4"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqescudos where escudos_codigo=$tipo2 and req_codigo=4"))["escalados"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Encantable</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["encantable"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Especial</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["especial"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                    </table> 
                    <?php ; break; 
                        case 20:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                                    <td style="border-right: 0px;" class="img_esc"> <?php echo $arma["daño"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img style="width: 22px; height: 22px;" src="imagenes/durability.png" alt="dura"></td>
                                    <td class="img_esc"> <?php echo $arma["durabilidad"] ?> </td>
                                    <td class="img_esc"><img src="imagenes/weight.jpg" alt="def"></td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["peso"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Encantable</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["encantable"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Especial</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["especial"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de arco</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Municion</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["municion"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Rango</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> 
                                        <?php 
                                            if(empty($arma["rango"])){
                                                echo "-";
                                            } 
                                            else{
                                                echo $arma["rango"];
                                            }
                                            ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                    </table> 
                    <?php ; break; 
                        case 21:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                    </table>
                    <?php ; break;?>
                    <?php
                        case 22:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row">
                                        <td class="img_esc"><img src="imagenes/magic_adj.jpg" alt="madj"></td>
                                        <td class="img_esc"> <?php echo $arma["daño"] ?> </td>
                                        <td class="img_esc"><img src="imagenes/stability.jpg" alt="def"></td>
                                        <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["reduccion_daño"] ?> </td>
                                    </tr>
                                    <tr class="table_row">
                                        <td class="img_esc"><img style="width: 22px; height: 22px;" src="imagenes/durability.png" alt="dura"></td>
                                        <td class="img_esc"> <?php echo $arma["durabilidad"] ?> </td>
                                        <td class="img_esc"><img src="imagenes/weight.jpg" alt="def"></td>
                                        <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["peso"] ?> </td>
                                    </tr>
                                    <tr class="table_row1">
                                        <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                                        <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                                        <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                                        <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                                    </tr>
                                    <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=1"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=1"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=2"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=2"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=3"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=3"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=4"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=4"))["req_num"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=1"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=1"))["escalados"];
                                            }
                                        ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=2"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=2"))["escalados"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=3"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=3"))["escalados"]; 
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=4"))["escalados"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqcatalizadores where catalizadores_codigo=$tipo2 and req_codigo=4"))["escalados"];
                                            }
                                            ?></td>
                                </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de catalizador</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                            echo "-";
                                        }
                                            else{
                                                echo $arma["precio"];
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 5:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                            echo "-";
                                        }
                                            else{
                                                echo $arma["precio"];
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 6:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                            echo "-";
                                        }
                                            else{
                                                echo $arma["precio"];
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 7:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                            echo "-";
                                        }
                                            else{
                                                echo $arma["precio"];
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 8:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                            echo "-";
                                        }
                                            else{
                                                echo $arma["precio"];
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php ; break;
                            case 9:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                                    <td class="img_esc" style="border-right: 0;"> <?php
                                     if(empty($arma["daño"])){
                                        echo "-";
                                     } 
                                     else{
                                        echo $arma["daño"];
                                     }
                                     ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc">Espacios usados</td>
                                    <td class="img_esc"> <?php echo $arma["slots"] ?> </td>
                                    <td class="img_esc">Usos</td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["usos"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <th style="border-top:1px solid goldenrod;">
                                        <h3 class="font_1">Requerimientos y escalados</h3>
                                    </th>
                                </tr>
                                <tr class="table_row1">
                                    <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                                    <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                                    <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                                    <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Rango</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["rango"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de magia</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                    </table> 
                    <?php ; break;
                            case 10:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                                    <td class="img_esc" style="border-right: 0;"> <?php
                                     if(empty($arma["daño"])){
                                        echo "-";
                                     } 
                                     else{
                                        echo $arma["daño"];
                                     }
                                     ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc">Espacios usados</td>
                                    <td class="img_esc"> <?php echo $arma["slots"] ?> </td>
                                    <td class="img_esc">Usos</td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["usos"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <th style="border-top:1px solid goldenrod;">
                                        <h3 class="font_1">Requerimientos y escalados</h3>
                                    </th>
                                </tr>
                                <tr class="table_row1">
                                    <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                                    <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                                    <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                                    <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Rango</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php
                                    if(empty($arma["rango"])) 
                                        echo "-";
                                    else
                                        echo $arma["rango"];
                                    ?> </td>                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de magia</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                    </table> 
                    <?php ; break;
                            case 11:?>
                            <table id="table" cellspacing=0>
                                <tr class="table_row">
                                    <th>
                                        <h2 class="font_1">
                                            <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                            <br>
                                            <?php echo $arma["nombre"] ?>
                                        </h2>
                                    </th>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc"><img src="imagenes/phisical_damage.webp" alt="str"></td>
                                    <td class="img_esc" style="border-right: 0;"> <?php
                                     if(empty($arma["daño"])){
                                        echo "-";
                                     } 
                                     else{
                                        echo $arma["daño"];
                                     }
                                     ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <td class="img_esc">Espacios usados</td>
                                    <td class="img_esc"> <?php echo $arma["slots"] ?> </td>
                                    <td class="img_esc">Usos</td>
                                    <td class="img_esc" style="border-right: 0px;"> <?php echo $arma["usos"] ?> </td>
                                </tr>
                                <tr class="table_row">
                                    <th style="border-top:1px solid goldenrod;">
                                        <h3 class="font_1">Requerimientos y escalados</h3>
                                    </th>
                                </tr>
                                <tr class="table_row1">
                                    <td class="img_esc"><img src="imagenes/strength.webp" alt="str"></td>
                                    <td class="img_esc"><img src="imagenes/dexterity.jpg" alt="dex"></td>
                                    <td class="img_esc"><img src="imagenes/intelligence.webp" alt=""></td>
                                    <td class="img_esc" style="border-right: 0px;"><img src="imagenes/faith.webp" alt="fth"></td>
                                </tr>
                                <tr class="table_row1">
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=1"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"])){
                                                echo "-";
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=2"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc">
                                        <?php 
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=3"))["req_num"];
                                            }
                                            ?></td>
                                    <td class="esc" style="border-right: 0px;">
                                        <?php
                                            if(empty(mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"])){
                                                echo "-";    
                                            }
                                            else{
                                                echo mysqli_fetch_assoc(mysqli_query($conexion ,"select * from reqmagias where magias_codigo=$tipo2 and req_codigo=4"))["req_num"];
                                            }
                                            ?></td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Rango</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php
                                    if(empty($arma["rango"])) 
                                        echo "-";
                                    else
                                        echo $arma["rango"];
                                    ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Tipo de magia</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php echo $arma["tipo"] ?> </td>
                                </tr>
                                <tr class="table_row2">
                                    <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Precio</td>
                                    <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["precio"])){ 
                                        echo "-";
                                    }
                                        else{
                                            echo $arma["precio"];
                                        } 
                                        ?> </td>
                                </tr>
                            </table> 
                    <?php ; break;
                        case 13:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Parte del juego</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["parte"])){ 
                                            echo "-";
                                        }
                                            else if($arma["parte"]=='e'){
                                                echo "Principio";
                                            } 
                                            else if($arma["parte"]=='m'){
                                                echo "Mitad";
                                            } 
                                            else if($arma["parte"]=='l'){
                                                echo "Final";
                                            } 
                                            else if($arma["parte"]=='o'){
                                                echo "Opcional";
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 14:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Parte del juego</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["parte"])){ 
                                            echo "-";
                                        }
                                            else if($arma["parte"]=='e'){
                                                echo "Principio";
                                            } 
                                            else if($arma["parte"]=='m'){
                                                echo "Mitad";
                                            } 
                                            else if($arma["parte"]=='l'){
                                                echo "Final";
                                            } 
                                            else if($arma["parte"]=='o'){
                                                echo "Opcional";
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 15:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Parte del juego</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["parte"])){ 
                                            echo "-";
                                        }
                                            else if($arma["parte"]=='e'){
                                                echo "Principio";
                                            } 
                                            else if($arma["parte"]=='m'){
                                                echo "Mitad";
                                            } 
                                            else if($arma["parte"]=='l'){
                                                echo "Final";
                                            } 
                                            else if($arma["parte"]=='o'){
                                                echo "Opcional";
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                        <?php
                        case 16:?>
                                <table id="table" cellspacing=0>
                                    <tr class="table_row">
                                        <th>
                                            <h2 class="font_1">
                                                <img class="imagen" src=<?php echo $arma["imagen"];?>>
                                                <br>
                                                <?php echo $arma["nombre"] ?>
                                            </h2>
                                        </th>
                                    </tr>
                                    <tr class="table_row2">
                                        <td style="display: flex; align-items: center; width: 50%; height: 30px;" colspan="10">Parte del juego</td>
                                        <td style="display: flex; align-items: center; width: 50%; border-right: 0px; height: 30px;" colspan="10"> <?php if(empty($arma["parte"])){ 
                                            echo "-";
                                        }
                                            else if($arma["parte"]=='e'){
                                                echo "Principio";
                                            } 
                                            else if($arma["parte"]=='m'){
                                                echo "Mitad";
                                            } 
                                            else if($arma["parte"]=='l'){
                                                echo "Final";
                                            } 
                                            else if($arma["parte"]=='o'){
                                                echo "Opcional";
                                            } 
                                            ?> </td>
                                    </tr>
                        </table> 
                        <?php ; break; ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        
    </div>
</main>
        <footer>
            <form action="../reportebug.php" method="post" id="reportebug">
            <div id="reporte">
                <h3 style="margin-right: 5px;">Reportar un bug:</h3>
                <textarea name="reporte" id="bug" placeholder="Describa detalladamente el bug"></textarea>
                
            </div>
            <button style="border: none; margin-left: 10px; height:25px;"> Enviar</button>
            </form>
        </footer>
</div>
</body>
</html>