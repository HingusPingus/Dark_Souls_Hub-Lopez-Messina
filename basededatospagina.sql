create database dar_soul;
use dar_soul;
/*tables*/	

create table bugs(
	codigo int primary key,
    reporte varchar(9999)
);
create table juego(
	codigo int primary key,
    fecha_de_salida date
);
create table zona(
	codigo int primary key,
    nombre varchar(100),
    imagen varchar(1000),
    parte char,
    lore varchar(2000),
    codigo_juego int,
    foreign key(codigo_juego) references juego(codigo)
);
create table obj_tipo(
	codigo int primary key,
    nombre varchar(100),
    descripcion varchar(2000)
);
create table sett(
	codigo int primary key,
    nombre varchar(100),
    codigo_juego int,
    foreign key(codigo_juego) references juego(codigo)
);
create table objetos(
	codigo int primary key,
    nombre varchar(100),
    imagen varchar(500),
    efecto varchar(100),
    ubicacion varchar(1000),
    precio int,
    lore varchar(1000),
    codigo_juego int,
    codigo_obj_tipo int,
    foreign key(codigo_obj_tipo) references obj_tipo(codigo),
    foreign key(codigo_juego) references juego(codigo)
);
create table anillos(
	codigo int primary key,
    imagen varchar(500),
    nombre varchar(100),
    efecto varchar(500),
    ubicacion varchar(1000),
    precio int,
    lore varchar(2000),
    codigo_juego int,
    foreign key(codigo_juego) references juego(codigo)
);
create table armas(
	codigo int primary key,
    nombre varchar(100),
    imagen varchar(500),
    daño int,
    peso float,
    durabilidad int,
    sett_codigo int,
    ubicacion varchar(1000),
    material_codigo int,
    efecto varchar(100),
    precio int,
    encantable varchar(2),
    especial varchar(2),
    tipo varchar(100),
    tipo_daño varchar(100),
    reduccion_daño int,
    pasiva varchar(100),
    lore varchar(2000),
    juego_codigo int,
    foreign key (juego_codigo) references juego(codigo),
    foreign key (material_codigo) references objetos(codigo)
);
create table req(
	codigo int primary key,
    nombre varchar(100)
);
create table reqarmas(
	req_codigo int,
    armas_codigo int,
    req_num int,
    escalados char,
    primary key (req_codigo, armas_codigo),
    foreign key (req_codigo) references req(codigo),
    foreign key (armas_codigo) references armas(codigo)
);
create table armadura(
	codigo int primary key,
    peso float,
    pasiva varchar(1000),
    imagen varchar(500),
    defensa int,
    sett_codigo int,
    nombre varchar(100),
    durabilidad int,
    ubicacion varchar(1000),
    precio int,
    tipo varchar(100),   
    lore varchar(2000),
    material_codigo int,
    juego_codigo int,
    foreign key (material_codigo) references objetos(codigo),
    foreign key (juego_codigo) references juego(codigo),
    foreign key (sett_codigo) references sett(codigo)
);
create table escudos(
	codigo int primary key,
    nombre varchar (100),
    daño int,
    peso float,
    imagen varchar(500),
    ubicacion varchar(100),
    sett_codigo int,
    precio int,
    durabilidad int,
    reduccion_daño int,
    encantable varchar(2),
    especial varchar(2),
    pasiva varchar (100),
    lore varchar(2000),
    material_codigo int,
    juego_codigo int,
    foreign key (material_codigo) references objetos(codigo),
    foreign key (juego_codigo) references juego(codigo),
    foreign key (sett_codigo) references sett(codigo)
);
create table reqescudos(
	req_codigo int,
    escudos_codigo int,
    req_num int,
    escalados char,
    primary key (req_codigo, escudos_codigo),
    foreign key (req_codigo) references req(codigo),
    foreign key (escudos_codigo) references escudos(codigo)
);
create table arcos(
	codigo int primary key,
    nombre varchar(100),
    peso float,
    tipo varchar(100),
    sett_codigo int,
    imagen varchar(500),
    daño int,
    municion varchar(100),
    durabilidad int,
    tipo_daño varchar(100),
    rango int,
    ubicacion varchar(1000),
    precio int,
    encantable varchar(2),
    especial varchar(2),
    lore varchar(2000),
    material_codigo int,
    juego_codigo int,
    foreign key (material_codigo) references objetos(codigo),
    foreign key (juego_codigo) references juego(codigo),
    foreign key (sett_codigo) references sett(codigo)
);
create table magias(
	codigo int primary key,
    nombre varchar(100),
    imagen varchar(500),
    slots int,
    daño int,
    usos int,
    tipo varchar(100),
    ubicacion varchar(1000),
    precio int,
    rango int,
    lore varchar(10000),
    codigo_juego int,
    foreign key(codigo_juego) references juego(codigo)
);
create table reqmagias(
	req_codigo int,
    magias_codigo int,
    req_num int,
    escalados char,
    primary key (req_codigo, magias_codigo),
    foreign key (req_codigo) references req(codigo),
    foreign key (magias_codigo) references magias(codigo)
);
create table catalizadores(
	codigo int primary key,
    nombre varchar(100),
    imagen varchar(500),
    durabilidad int,
    daño int,
    peso float,
    tipo varchar(100),
    tipo_daño varchar(100),
    ubicacion varchar(500),
    reduccion_daño int,
    lore varchar(2000),
    sett_codigo int,
    codigo_juego int,
    foreign key(sett_codigo) references sett(codigo),
    foreign key(codigo_juego) references juego(codigo)
    );
create table reqcatalizadores(
	req_codigo int,
    catalizadores_codigo int,
    req_num int,
    escalados char,
    primary key (req_codigo, catalizadores_codigo),
    foreign key (req_codigo) references req(codigo),
    foreign key (catalizadores_codigo) references catalizadores(codigo)
);
create table enemigos(
	codigo int primary key,
    nombre varchar(100),
    tipo varchar(45),
    vida int,
    drops varchar(1000),
    almas int,
    resistencias varchar(100),
    debilidades varchar(100),
    lore varchar(2000),
    codigo_juego int,
    foreign key(codigo_juego) references juego(codigo)
);
create table bosses(
	codigo int primary key,
    nombre varchar(100),
    vida int,
    drops varchar(100),
    almas int,
    resistencias varchar(100),
    debilidades varchar(100),
    lore varchar(2000),
    codigo_zona int,
    codigo_juego int,
    foreign key(codigo_zona) references zona(codigo),
    foreign key(codigo_juego) references juego(codigo)
);
create table enemigo_zona(
	ubicacion varchar(1000),
    codigo_enemigos int,
    codigo_zona int,
    codigo_juego int,
    foreign key(codigo_enemigos) references enemigos(codigo),
    foreign key(codigo_zona) references zona(codigo),
    foreign key(codigo_juego) references juego(codigo),
    primary key(codigo_zona, codigo_enemigos)
);
create table categorias(
    codigo int primary key,
    titulo varchar(45),
    imagen varchar(500),
    descripcion varchar(500)
);
create table secciones(
    codigo int primary key,
    nombre varchar(100),
    descripcion varchar(2000),
    categorias_codigo int,
    foreign key(categorias_codigo) references categorias(codigo)
);

INSERT INTO juego (codigo, fecha_de_salida) VALUES 
(1, '2018-05-25');

INSERT INTO zona VALUES 
(1, "Anor Londo", "imagenes/zona1.jpg","m", "Anor Londo es una zona en Dark Souls y Dark Souls Remastered. Con su sol perpetuamente poniente y su hermosa arquitectura, la ciudad de Anor Londo te dejará sin aliento en tu primer vistazo, pero no te dejes engañar por su aparente tranquilidad. Se puede acceder a ella a través de un pequeño anillo naranja que aparece después de derrotar al Gólem de Hierro en la cima de la Fortaleza de Sen. Es el hogar de las deidades restantes de Lordran y del Lordvessel, un artefacto esencial para completar la misión principal.", 1),
(2, "Santuario de enlace de fuego", "imagenes/zona2.jpg","e", "El Santuario del enlace de fuego es el primer destino del jugador en Dark Souls y Dark Souls Remastered. Este antiguo y deteriorado santuario se utiliza como un punto de encuentro y refugio seguro para muchos entrenadores, comerciantes y otros personajes relacionados con la historia. Este fuego central será visitado con frecuencia, ya que también es un cruce para muchas regiones y atajos.", 1),
(3, "Burgo de los no muertos", "imagenes/zona3.jpg","e", "Es una ciudad fortificada rodeada de grandes muros y torres de vigilancia, habitada por varios no muertos hostiles. Se compone tanto de una sección superior e inferior. A la parte inferior se puede acceder con la Llave sótano a través de la puerta en lo alto del puente, frente al Dragón Hueco.", 1),
(4, "Jardin tenebroso", "imagenes/zona4.jpg","o", "Se accede a esta área usualmente al inicio del juego, al bajar por las escaleras cerca de donde se encuentra el herrero Andre en la Parroquia de los no muertos. También es posible entrar desde la Cuenca Tenebrosa, pero esto requiere ir a través de terrenos muy peligrosos para personajes de bajo nivel.", 1);
insert into zona value(5, "Las catacumbas", "imagenes/zona5.jpg","l", "Las catacumbas es una zona subterránea poblada por esqueletos y nigromantes. Los nigromantes (un enemigo que no reaparece al ser eliminado) se esconden en las sombras de muchas áreas y continuarán resucitando a los esqueletos cercanos hasta que el jugador les dé muerte. Lar armas divinas impiden que los esqueletos vuelvan a reanimarse.", 1);
insert into zona value(6, "Ruinas de nuevo londo", "imagenes/zona6.jpg","l", "Nuevo Londo fue una próspera ciudad dirigida por cuatro reyes, que sin embargo, cayó en desgracia cuando el Abismo arrastró a los cuatro gobernantes hacia la oscuridad. Surgieron los Espectros Oscuros, quienes comenzaron a atacar a los ciudadanos para arrebatarles su Humanidad. Ante esta grave situación, tres magos de Nuevo Londo, entre ellos Ingward, se vieron forzados a inundar la ciudad entera con tal de sellar a los Espectros y evitar que causaran más daño. Lograron su objetivo, pero a cambio sacrificaron a la totalidad de los habitantes de Nuevo Londo, que quedaron sepultados bajo el agua. Estas ruinas estan situadas debajo del santuario de enlace de fuego y no hay hogueras en ellas.", 1);
insert into zona value(7, "Fortaleza de sen", "imagenes/zona7.jpg","m","La Fortaleza de Sen es un área en Dark Souls y Dark Souls Remastered. Este oscuro castillo está custodiado por monstruosos guardias reptilianos, gigantes que lanzan rocas y numerosas trampas, como enormes hachas oscilantes, rocas y trampas. Sirve como puerta de entrada a Anor Londo.",1),
(8,"Las Profundidades","imagenes/zona8.jpg","o","Las Profundidades es un área en Dark Souls y Dark Souls Remastered, a la que se accede desde el Burgo de los no muertos bajo. La puerta que conduce a él se abre con la Llave de las Profundidades, que se obtiene al vencer al Demonio de Aries. Sirve como puerta de entrada a Ciudad infestada una vez que derrotas al jefe del área.",1);

INSERT INTO obj_tipo VALUES
(1, "Titanita", "La titanita es el principal material de mejora en Dark Souls. Viene en cantidades desde un fragmento a una losa y permite mejorar las armas hasta cierto nivel."),
(2, "Consumibles", "Los consumibles son objetos de uso unico cuyos efectos pueden variar entre distintas utilidades como imbuir el arma en elementos distintos o incluso curarte de un estado como el envenenamiento."),
(3, "Objetos clave", "Los objetos clave son objetos cuyo uso son cruciales para el progreso del juego y no pueden ser utilizados en cualquier momento."),
(4, "Almas", "Las almas son objetos que al usarlos te conceden cierta cantidad de almas dependiendo del objeto, entre estos items tambien se encuentran las almas de los jefes previamente derrotados, las cuales podes consumir para crear un arma unica o consumir para conseguir mas almas.");

insert into req values
(1,"Fuerza"),
(2,"Destreza"),
(3,"Inteligencia"),
(4,"Fe");

INSERT INTO sett VALUES
(1, "Caballero oscuro",1),
(2, "Set de Havel", 1),
(3, "Set de cazador.", 1);

INSERT INTO objetos VALUES
(1, "Fragmento de titanita","imagenes/objeto1.png", "Permite mejorar un arma o armadura normal a +5", "Puede ser comprado o dropeado por enemigos", 800,"Los fragmentos de titanita son trozos de las losas legendarias.",1,1),
(2, "Alma de no muerto perdido","imagenes/objeto2.png", "Suelta 200 almas al consumo", "Suele ser encontrada por zonas con muchos huecos",null,"Alma de un no muerto que se volvió hueco hace ya mucho.",1,4),
(3, "Titanita centelleante","imagenes/objeto3.png", "Mejora armas o armaduras especiales a +5", "Dropeado por lagartos de cristal", null, "Una forma de titanita con poder especial.",1,1),
(4, "Llave sotano", "imagenes/objeto4.png","Abre el sótano de la torre en el Burgo de los no muertos","En un cadaver en el Jardín Tenebroso",null,"Llave del sótano de la torre de vigilancia del Burgo de los no muertos.El sótano de esta torre es una celda de piedra. Dicen que un héroe convertido en Hueco fue encerrado aquí por su amigo.Por su bien, claro está.",1,3),
(5, "Hueso regreso", "imagenes/objeto5.png","El jugador regresa a la última hoguera en la que descansó","Puede ser encontrado por todo lordran",500,"Fragmento de hueso reducido a ceniza blanca. Te lleva a la última hoguera en la que descansaste. Los huesos de los no muertos mantienen encendidas las hogueras. A veces, el ansia de un no muerto por volver a una hoguera impregna a sus huesos de un instinto para regresar a ella.",1,2),
(6, "Escama de dragón","imagenes/objeto6.png", "Mejora armas relacionadas con los dragones", "Drops raros y cofres", null, "Los apostoles, quienes defendian a los dragones, llegaron muy lejos buscando este tesoro",1,1);
insert into objetos values
(7,"Musgo morado", "imagenes/objeto7.png","Musgo medicinal morado. Reduce y cura el veneno.", "Drops y vendido por la mercader no muerta",500,"El veneno aumenta en el cuerpo. Si se activa, provoca daños graduales durante un tiempo. Puede ser exasperante, así que lleva siempre un poco de este musgo si vas a un área peligrosa.",1,2),
(8,"Vasija del señor","imagenes/objeto8.png","Garantiza el viaje entre ciertas hogueras y el acceso al Horno de la Llama original","Regalo de la princesa Gwynevere",null,"Vasija del Señor otorgada al elegido de entre los no muertos para suceder al Señor Gwyn. El elegido no muerto posee el arte de teletransportarse entre hogueras. Para abrir la última puerta, coloca esta vasija en el Altar del Fuego y llénala con almas poderosas.",1,3),
(9,"Alma de gran heroe","imagenes/objeto9.png","Otorga 20,000 almas","Se puede encontrar en Los Archivos Del Duque y en Izalith Perdida", null,"Gran alma de un héroe legendario que se volvió Hueco hace ya mucho. Se usa para conseguir muchísimas almas. Las almas son la fuente de toda vida. Siempre las necesitarás, seas no muerto o Hueco.",1,4);

INSERT INTO armas VALUES
(1, "Espadón de caballero negro","imagenes/arma1.png", 330 , 16.0, 115, 1, "Drop de un caballero negro en el Burgo de los no muertos o en el Horno de la primera llama.", 3,  null, null, "No", "Si", "Ultra espadón", "Físico", 70, null, "Espadón de los caballeros negros que vagan por Lordran. Usada para enfrentar a los demonios del caos.",1),
(2, "Diente de dragón","imagenes/arma2.png",435 , 18.0, 999, 2, "Detras de un muro invisible en Anor Londo.", 6,  null, null, "Si", "Si", "Gran martillo", "Físico", 50, "Aumenta 20 de resistencia a la magia y al fuego", "Creado a partir de un diente de un dragón eterno. Legendario gran martillo de Havel la Roca.",1);

insert into reqarmas values
(1,1,32,"B"),
(2,1,18,"E"),
(3, 1, 0, "-"),
(4, 1, 0, "-"),
(1,2,40,"D"),
(2, 2, 0, "-"),
(3, 2, 0, "-"),
(4, 2, 0, "-");
insert into escudos values
(1, "Escudo de emblema de hierba", 124, 3.0,"imagenes/escudo1.png", "Cuenca tenebrosa, en el punto mas bajo del jardin tenebroso. Esta protegido por un Caballero Negro.", null, null, 200, 100, "Si", "Si", "Regeneracion de estamina mas rapida, un 22,5%.", "Escudo metálico mediano y antiguo, de origen desconocido. El emblema de hierba posee un poco de magia, por lo que acelera ligeramente la recuperación de energía.", 1, 1),
(2, "Escudo de emblema de dragon", 77, 3.0,"imagenes/escudo2.png", "Se encuentra en un cadaver en el valle de los dragones, donde esta el dragon no muerto.", null, null, 300, 100, "Si", "No", "Reduce el daño de fuego un 85%", "Escudo de un caballero anónimo, posiblemente alguien con un alto rango en Astora. Uno de los escudos encantados azules. Reduce considerablemente el daño de fuego.", 1, 1);

insert into reqescudos values
(1, 1, 10, "D"),
(1, 2, 10, "D");

insert into anillos values
(1,"imagenes/anillo1.png","Anillo de favor y protección","+20% HP, +20% Stamina, +20% Peso maximo, se rompe al desequiparlo","Soltado por Lautrec al morir", null,'Un anillo que simboliza el favor y la protección de la diosa Fina, conocida en la leyenda por poseer "belleza fatídica".', 1),
(2,"imagenes/anillo2.png","Anillo de calamidad","El jugador recibe el doble del daño que recibiría normalmente","Soltado por El Dragon Negro Kalameet al morir (DLC)",null, "Un anillo encantado por el ojo naranja de Kalameet, el portador de la calamidad. Duplica el daño recibido por su portador. Un anillo inútil que no corresponde a ningún dedo. Es mejor dejarlo desconocido, o al menos bien escondido.",1); 

insert into arcos values
(1,"Arco largo",1.0, "Arco largo", 3,"imagenes/arco1.png", 36, "Cualquier tipo de flecha.", 100, "Penetrante", 50, "Esta en un borde de el jardin tenebroso, en el camino yendo a cuenca tenebrosa. El cuerpo en el que se encuentra tambien tiene el set del cazador.",null, "No", "No", "Arco grande para cazadores experimentados. Úsalo con flechas. Mantén el arco y pulsa LB para apuntar. Apunta a las cabezas de los humanoides. Pulsa LT/RT para cambiar el tipo de flecha.", 1, 1),
(2,"Arco compuesto",1.0, "Arco corto", null,"imagenes/arco2.png", 55, "Cualquier tipo de flecha.", 100, "Penetrante", 38, "Esta en las ruinas de nuevo londo, en un borde arriba de las puertas viendo hacia el valle de los drakes.",null, "No", "No", "Arco compuesto que aumenta el poder. Requiere más fuerza que un arco normal. Sin embargo, su alcance es más corto, así que no sirve para atacar a distancia.", 1, 1);

insert into magias values
(1,"Lanza de alma","imagenes/magia1.png", 1, null, 4, "Hechizo", "Se compra de sombrero grande logan.", 40000, null, "Magia desarrollada por Sombrero Grande Logan. Dispara una Lanza de Alma perforada. Símbolo de la fuerza de Logan, la Lanza de Alma aparece con frecuencia en las leyendas y se dice que es equiparable al relámpago del Señor Gwyn.", 1),
(2,"Poder interior","imagenes/magia2.png", 1, null, 1, "Piromancia", "Ciudad infestada, debajo del abrazador de pared.", null, null, "Piromancia de Carmina, que aprovechó el poder de la llama para hacer realidad el interior. Bajo aumento fuerza/resistencia; reduce PS. El poder excesivo devora la fuerza vital del hechicero. Esta piromancia ha permanecido en secreto durante eones, como todos los hechizos peligrosos.", 1);
insert into magias value(3, "Lanza relampago", "imagenes/magia3.png", 1, 458, 10, "Milagro", "Recompenza por entrar al pacto del guerrero de la luz solar.", null, null, "Milagro transmitido a los vinculados con el pacto del Guerrero de la Luz Solar. Lanzamiento de lanza relámpago. Las lanzas de relámpago infligen daño de relámpago poco común y son muy efectivas contra la magia, el fuego y, sobre todo, los dragones.", 1);

insert into reqmagias values
(3, 1, 36, null),
(4,1,0,null),
(3,2,0,null),
(4,2,0,null),
(3,3,0,null),
(4,3,20,null);

insert into armadura values
(1,19.5, "Reduce recuperacion de estamina por 2 puntos.","imagenes/armadura1.png",92,2,"Armadura de Havel",900,"Ubicada en un subsuelo detras de un muro ilusorio cerca de la hoguera de Gwynevere",null,"Pechera","Ropa usada por los guerreros de Havel la roca. Tallado en roca sólida, su tremendo peso sólo es comparable a la defensa que proporciona. Los guerreros de Havel nunca retrocedieron ni se retiraron de la batalla. Aquellos que tuvieron la mala suerte de enfrentarlos fueron inevitablemente hechos papilla.",null,1),
(2,7.0, "Reduce regeneracion de estamina por 1 punto","imagenes/armadura2.png",550,1,"Botas de caballero negro",550,"Encontrado en un cuerpo cerca del tercer caballero negro en el horno de la primera llama",null,"Botas","Botas de los Caballeros Negros que acechan por Lordran. Los caballeros siguieron a Lord Gwyn cuando partió para enlazar la llama, pero fueron reducidos a cenizas en un fuego recién encendido, vagando por el mundo como espíritus incorpóreos para siempre.",3,1);

insert into catalizadores values
(1, "Catalizador laton de luna oscura","imagenes/catalizador2.png",60, 230, 1.0, "Baston", "Magic adjustment", "Se crea al ascender cualquier catalizador con el alma de Gwyndolin en el herrero gigante.", 20, "Catalizador nacido del alma del Sol Oscuro Gwyndolin, deidad de la Luna Oscura que vigila Anor Londo, la ciudad desierta de los Dioses. Último hijo de Gwyn y un Dios legítimo, también un hechicero de la Luna, por lo que su varita la mueve la fe, no la inteligencia.", null, 1),
(2, "Talisman de marfil","imagenes/catalizador1.png",50, 234, 0.3, "Talisman", "Magic adjustment", "Se puede obtener al matar a Reah de Thorolund cuando se vuelve hueca en los archivos del duque, cuando esta en la iglesia del burgo de los no-muertos antes de que la maten o lo puede droppear Petrus luego de que la haya matado.", 20, "Medio para lanzar milagros de los Dioses. Estos talismanes solo se entregan a mujeres clérigos, y su valor varía considerablemente en función de la fe de su portadora",null, 1);

insert into reqcatalizadores values
(1, 2, 4, null),
(4, 2, 18, "A"),
(1, 1, 4, "E"),
(4, 1, 16, "A");

insert into enemigos values
(1, "Caballero negro", "Especial", 887, "Trozo de titanita blanca, trozo de titanita, trozo de titanita roja, trozo de titanita azul, alabarda del caballero negro, gran hacha del caballero negro, espadon del caballero negro, espada del caballero negro, escudo del caballero negro.", 1800, "281-298", "parry", "Los Caballeros Negros fueron alguna vez los leales Caballeros Plateados de Gwyn, Señor de la Luz Solar. Hace mucho, estos caballeros se enfrentaron a los demonios del caos y terminaron carbonizados, obteniendo una enorme resistencia al fuego, ademas de tener que cambiar sus armas de Caballero Plateado por unas que serían mucho más útiles contra los demonios que se les cruzaban.[1] Muchos de ellos viajaron junto a Gwyn hacia el Horno de la Llama original, y fueron reducidos a cenizas cuando el Gran Señor enlazó la Primera Llama. Desde entonces, rondan por el mundo como espíritus sin cuerpo.",1 ),
(2, "Fantasma", "Otros", 231, "Maldicion pasajera, Espada recortada de fantasma.", 200, "Inmortal a menos que se use una maldicion pasajera.", "Maldicion pasajera.", "Los fantasmas eran anteriormente los habitantes de Nuevo Londo, pero fueron sacrificados cuando la ciudad fue inundada para contener a los Espectros Oscuros. Sus restos físicos se pueden encontrar en la entrada de la gran puerta que conduce al Valle de dragones.", 1);

insert into bosses values
(1, "Sif, el Gran lobo gris", 3432, "Alma de sif, pacto de artorias, humanidad, hueso de regreso.", 40000, null, "Fuego, Sangrado", "Sif era el compañero lobo de Sir Artorias, el Caminante del Abismo. El lobo acompañó a Artorias en su misión para salvar al reino de Oolacile de las fuerzas del Abismo. Sin embargo, Artorias y Sif fueron rebasados por las fuerzas de la oscuridad, y el caballero usó su escudo para erigir una barrera sobre Sif y protegerlo de la corrupción del Abismo. Tras la muerte de Artorias, Sif se convirtió en el guardián de la tumba del caballero en el Jardín Tenebroso, para evitar que otros tengan el mismo destino que su antiguo amo.",4, 1),
(2, "Molinete", 1326, "Rito del avivado, Mascara del niño, Mascara de la madre, Mascara del padre.", 15000, null, "Todo", "No se sabe mucho sobre Molinete, pero hay algunas pistas sobre su naturaleza y objetivos. Este ser está aparentemente compuesto por tres individuos diferentes; tras notar la presencia del No muerto elegido, las tres máscaras se miran entre sí y se contraen ligeramente como si discutieran qué hacer con el intruso. A juzgar por la cantidad de tomos y esqueletos (todos encadenados al techo y uno en su mesa de operaciones) dentro de su guarida, uno puede deducir que no es Hueco y que está haciendo algún tipo de investigación nigromántica. Se dice que robó el poder del Rey del Cementerio y que reina en las catacumbas.", 5, 1);

insert into enemigo_zona values
("En una escalera luego de la hoguera del Burgo de los no muertos.", 1, 3, 1),
("En todo nuevo londo.", 2, 6, 1);

insert into categorias values
(1, "Info general", "imagenes/darksign.png", "La información general de Dark Souls y Dark Souls Remaster cubre aspectos del juego como mecánicas que giran en torno a controles, hogueras, y otras cosas:"),
(2, "Equipables", "imagenes/brokensword.png", "Todos los objetos que tu personaje puede equiparse:"),
(3, "Items", "imagenes/estus.png", "Los items que se encuentran en Dark souls desde Estus hasta llaves:"),
(4, "Magias", "../imagenes/crystalsoulspear.png", "Todos los items de magia disponibles en Lordran:"),
(5, "Zonas", "../imagenes/bonfire.png", "Las zonas que se encuentran dentro del juego:"),
(6, "Walkthrough", "imagenes/sun.png", "Video del juego:");

insert into secciones values
(1,"Controles", "Aca vas a encontrar la funcion de cada boton en Dark Souls",1),
(2,"Combate", "El combate es el enfoque de Dark Souls, tiene una gran variedad de mecanicas que enamora a los jugadores. Esta pagina explica lo basico del combate dentro de Dark Souls.",1),
(3,"Secretos", "Esta pagina contiene las ubicaciones de los secretos mas importantes dentro de dark souls.", 1),
(4,"Hogueras", "Aca encontrarás la ubicación de todos los puntos de control dentro de Dark Souls",1),
(5,"Consumibles", "Objetos de un solo uso que otorgan un efecto temporal", 3),
(6,"Titanita", "Materiales de mejora para ciertos equipables",3),
(7,"Objetos clave", "Objetos cruciales para seguir la historia o ciertas misiones de NPCs, como llaves o artefactos",3),
(8,"Almas","Objetos que al consumirlos te dan cierta cantidad de almas, las almas de los jefes también se pueden transmutar en equipables", 3),
(9, "Hechizos", "Los hechizos de Dark Souls son un tipo de magia que se puede usar mediante un catalizador, como el resto. Este es un tipo de magia que utiliza inteligencia para tirar un hechizo, con el requerimiento mas alto siendo 50 de esta estadistica y el mas bajo 10. Esto hace que los jugadores, si quieren usar hechizos de alto nivel, tengan que priorizar esta estadistica antes que fuerza, destreza, etc. dandoles menor rendimiento en peleas cuerpo a cuerpo.", 4),
(10, "Piromancias", "La Piromancia es una forma mucho mas simple de hacer magia en Dark Souls, ya que este tipo de magia no requiere de ninguna estadistica para ser usada. Lo unico que requiere es un unico catalizador, la Llama de Piromancia, que no tiene ningun requerimiento. Este tipo de magia es muy popular en los estilos de juego de las personas por todo lo anterior dicho.", 4),
(11, "Milagros", "Los milagros son un tipo de magia que escala con la estadistica Fe, haciendo principalmente daño electrico o de fuerza y dando buffos o curando. Para lanzar un milagro se debe usar un talisman, y el daño del milagro depende de cuan mejorado este, del milagro y de la estadistica de fe.", 4),
(12, "https://www.youtube.com/embed/NLJpBJOHrVw?si=NhnGdblmc1pJC8o9?autoplay=1&mute=1", "Video del juego:", 6),
(13, "Early game", "Zonas del primer tercio del juego.", 5),
(14, "Mid game", "Zonas del segundo tercio del juego.", 5),
(15, "Late game", "Zonas del ultimo tercio del juego.", 5),
(16, "Opcionales", "Zonas no necesarias para terminar el juego.", 5),
(17, "Armas", "Las armas cuerpo a cuerpo son la manera principal de hacer daño en Dark Souls, debido a su nulo costo y el hecho de que no requiere recursos finitos", 2 ),
(18, "Armaduras", "Las armaduras te defienden y reducen el daño que recibís de todas las fuentes.", 2),
(19, "Escudos", "Los escudos sirven para reducir una cierta cantidad de daño dependiendo el escudo y para desviar los ataques enemigos.", 2),
(20, "Arcos", "Los arcos son armas a largo alcance que te permiten matar a ciertos enemigos desde lejos evitando ponerte en peligro", 2),
(21, "Anillos", "Los anillos son cruciales para el juego Dark Souls, debido a los efectos que otorgan que pueden ser desde darte mas vida hasta recibir el doble de daño", 2),
(22, "Catalizadores", "Los catalizadores son la única manera de hacer magia de cualquier tipo. Dependiendo el tipo de magia requerís cierto tipo de catalizador", 2);
