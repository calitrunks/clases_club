/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : clases_club

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2018-03-26 10:05:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aventurero`
-- ----------------------------
DROP TABLE IF EXISTS `aventurero`;
CREATE TABLE `aventurero` (
  `id_aventurero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id_aventurero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of aventurero
-- ----------------------------
INSERT INTO `aventurero` VALUES ('1', 'Martin Astudillo', '4');
INSERT INTO `aventurero` VALUES ('2', 'Lucas Parada', '2');
INSERT INTO `aventurero` VALUES ('3', 'Trinidad Braun', '3');
INSERT INTO `aventurero` VALUES ('4', 'Amanda Brante', '1');
INSERT INTO `aventurero` VALUES ('5', 'Pablo', '1');
INSERT INTO `aventurero` VALUES ('6', 'Daniel', '1');
INSERT INTO `aventurero` VALUES ('7', 'Fernanda', '1');
INSERT INTO `aventurero` VALUES ('8', 'Pilar', '1');
INSERT INTO `aventurero` VALUES ('9', 'felipe', '1');
INSERT INTO `aventurero` VALUES ('10', 'juanito', '1');
INSERT INTO `aventurero` VALUES ('11', 'cony carmona', '1');

-- ----------------------------
-- Table structure for `detalle_registro`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_registro`;
CREATE TABLE `detalle_registro` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_aventurero` int(11) NOT NULL,
  `cumplido` int(1) NOT NULL,
  `id_encabezado` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of detalle_registro
-- ----------------------------
INSERT INTO `detalle_registro` VALUES ('2', '11', '1', '1');
INSERT INTO `detalle_registro` VALUES ('3', '4', '1', '2');

-- ----------------------------
-- Table structure for `detalle_registro_especialidad`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_registro_especialidad`;
CREATE TABLE `detalle_registro_especialidad` (
  `id_detalle_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_cumplido` date NOT NULL,
  `cumplido` int(1) DEFAULT NULL,
  `id_aventurero` int(11) NOT NULL,
  `id_requisito_especialidad` int(11) NOT NULL,
  `id_encabezado` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of detalle_registro_especialidad
-- ----------------------------
INSERT INTO `detalle_registro_especialidad` VALUES ('14', '2018-03-25', '1', '4', '1', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('15', '2018-03-25', '1', '4', '2', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('16', '2018-03-25', '1', '6', '1', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('17', '2018-03-25', '1', '5', '1', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('18', '2018-03-25', '1', '5', '2', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('19', '2018-03-25', '1', '6', '2', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('20', '2018-03-25', '1', '4', '3', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('21', '2018-03-25', '1', '5', '3', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('22', '2018-03-25', '1', '6', '3', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('23', '2018-03-25', '1', '4', '4', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('24', '2018-03-25', '1', '5', '4', '2');
INSERT INTO `detalle_registro_especialidad` VALUES ('25', '2018-03-25', '1', '6', '4', '2');

-- ----------------------------
-- Table structure for `encabezado_registro`
-- ----------------------------
DROP TABLE IF EXISTS `encabezado_registro`;
CREATE TABLE `encabezado_registro` (
  `id_encabezado` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_requisito` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id_encabezado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of encabezado_registro
-- ----------------------------
INSERT INTO `encabezado_registro` VALUES ('1', '2018-03-20', '1', '1');
INSERT INTO `encabezado_registro` VALUES ('2', '2018-03-25', '5', '1');

-- ----------------------------
-- Table structure for `requisito`
-- ----------------------------
DROP TABLE IF EXISTS `requisito`;
CREATE TABLE `requisito` (
  `id_requisito` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `es_especialidad` int(1) NOT NULL,
  PRIMARY KEY (`id_requisito`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of requisito
-- ----------------------------
INSERT INTO `requisito` VALUES ('1', 'Memorizar y aceptar el Voto de los Aventureros.', '1', '1', '0');
INSERT INTO `requisito` VALUES ('2', 'Refuerzo: Leer el libro del Curso de Lectura de los Aventureros.', '1', '1', '0');
INSERT INTO `requisito` VALUES ('3', 'Crear un cuadro mural con las siguientes historias, mostrando el orden en que sucedieron o sucederán: -La creación – Inicio del pecado y la tristeza - Jesús me cuida hoy -Jesús vendrá nuevamente - El cielo O las historias de la Biblia que están estudiando en la clase o Escuela Sabática.', '2', '1', '0');
INSERT INTO `requisito` VALUES ('4', 'Hacer un dibujo o hablar sobre una de las historias del requisito anterior, para explicar a alguien cómo nos cuida Jesús.', '2', '1', '0');
INSERT INTO `requisito` VALUES ('5', 'Completar la especialidad de Biblia I.', '2', '1', '1');
INSERT INTO `requisito` VALUES ('6', 'Pasar un tiempo regular en contacto con Jesús, conversando con él y aprendiendo sobre él.', '2', '1', '0');
INSERT INTO `requisito` VALUES ('7', 'Preguntar a tres personas por qué oran.', '2', '1', '0');
INSERT INTO `requisito` VALUES ('8', 'Preparar un cuaderno mostrando diferentes personas que te cuidan y se interesan por ti, de la manera en que Jesús lo hace.', '3', '1', '0');
INSERT INTO `requisito` VALUES ('9', 'Practicar el juego de los sentimientos y mencionar por lo menos cuatro sentimientos diferentes.', '3', '1', '0');
INSERT INTO `requisito` VALUES ('10', 'Completar la especialidad de Cuidado de la Salud.', '3', '1', '1');
INSERT INTO `requisito` VALUES ('11', 'Hacer una pintura o dibujo de algo que te gusta en cada miembro de tu familia.', '4', '1', '0');
INSERT INTO `requisito` VALUES ('12', 'Descubrir qué dice el Quinto mandamiento (Éxodo 20:12) sobre las familias.', '4', '1', '0');
INSERT INTO `requisito` VALUES ('13', 'Demostrar tres maneras en las que puedes honrar a tu familia.', '4', '1', '0');
INSERT INTO `requisito` VALUES ('14', 'Complete la especialidad de seguridad', '4', '1', '1');
INSERT INTO `requisito` VALUES ('15', 'Explicar cómo puedes ser un buen amigo. Para eso usar títeres, dramas, piezas u otros recursos.', '5', '1', '0');
INSERT INTO `requisito` VALUES ('16', 'Hablar sobre el trabajo que realizan las personas en tu iglesia y descubrir una manera de ayudarlas.', '5', '1', '0');
INSERT INTO `requisito` VALUES ('17', 'Completar la especialidad de Amigo de los Animales.', '5', '1', '1');
INSERT INTO `requisito` VALUES ('18', 'Memorizar y recitar la ley de los Aventureros.', '1', '2', '0');
INSERT INTO `requisito` VALUES ('19', 'Refuerzo: Leer el libro del Curso de Lectura de los Aventureros.', '1', '2', '0');
INSERT INTO `requisito` VALUES ('20', 'Crear una historia resaltando: -El nacimiento de Jesús - Su vida – Su muerte - Su resurrección O las historias de la Biblia que están estudiando en la clase o Escuela Sabática.', '2', '2', '0');
INSERT INTO `requisito` VALUES ('21', 'Hacer un afiche o contar una de las historias del requisito anterior, demostrando la alegría de ser salvo por Jesús.', '2', '2', '0');
INSERT INTO `requisito` VALUES ('22', 'Memorizar y explicar 2 versículos de la Biblia que hablen sobre la salvación ofrecida por Jesús. - Mateo 22: 37-39 - 1 Juan 1:9 - Isaías 1:18 - Romanos 6:23', '2', '2', '0');
INSERT INTO `requisito` VALUES ('23', 'Decir el nombre de las dos partes principales de la Biblia y de los cuatro evangelios', '2', '2', '0');
INSERT INTO `requisito` VALUES ('24', 'Completar la especialidad de Amigo de Jesús.', '2', '2', '1');
INSERT INTO `requisito` VALUES ('25', 'Pasar un tiempo regular en contacto con Jesús, conversando con él y aprendiendo sobre él.', '2', '2', '0');
INSERT INTO `requisito` VALUES ('26', 'Preguntar a tres personas por qué estudian la Biblia.', '2', '2', '0');
INSERT INTO `requisito` VALUES ('27', 'Describir quién eres, ilustrando con dibujos que digan cosas buenas con respecto a ti.', '3', '2', '0');
INSERT INTO `requisito` VALUES ('28', 'Participar del juego “Cómo sería si…”', '3', '2', '0');
INSERT INTO `requisito` VALUES ('29', 'Completar la especialidad de Estado Físico.', '3', '2', '1');
INSERT INTO `requisito` VALUES ('30', 'Pedir que cada miembro de la familia cuente algunas historias preferidas de su propia vida.', '4', '2', '0');
INSERT INTO `requisito` VALUES ('31', 'Mostrar cómo Jesús puede ayudarte a ti y a tu familia a solucionar malentendidos, usando títeres, piezas con personajes u otras opciones.', '4', '2', '0');
INSERT INTO `requisito` VALUES ('32', 'Completar la especialidad de Seguridad en las Carreteras.', '4', '2', '1');
INSERT INTO `requisito` VALUES ('33', 'Complete la especialidad Cortesía.', '5', '2', '1');
INSERT INTO `requisito` VALUES ('34', 'Analizar la región en la que vives, relacionando las cosas que son buenas y las que podrían mejorar con tu ayuda.', '5', '2', '0');
INSERT INTO `requisito` VALUES ('35', 'Escoger algunos ítems de esta lista para colocarlos en práctica, haciendo más agradable la vida de tus vecinos.', '5', '2', '0');
INSERT INTO `requisito` VALUES ('36', 'Completar la especialidad Amigo de la Naturaleza.', '5', '2', '1');
INSERT INTO `requisito` VALUES ('37', 'Memorizar el voto y la ley de los Aventureros.', '1', '3', '0');
INSERT INTO `requisito` VALUES ('38', 'Explicar el significado del voto del Aventurero.', '1', '3', '0');
INSERT INTO `requisito` VALUES ('39', 'Leer el libro del curso de lectura de los Aventureros.', '1', '3', '0');
INSERT INTO `requisito` VALUES ('40', 'Crear un cuadro mural con las siguientes historias, mostrando el orden en que sucedieron: -Pablo -Martin Lutero -Elena de White –Tú O las historias de la Biblia que están estudiando en la clase o Escuela Sabática.', '2', '3', '0');
INSERT INTO `requisito` VALUES ('41', 'Realizar una pieza o escribir para un periódico sobre una de las historias del requisito anterior, contando cómo podemos entregar la vida a Jesús.', '2', '3', '0');
INSERT INTO `requisito` VALUES ('42', 'Completar la especialidad Biblia II', '2', '3', '1');
INSERT INTO `requisito` VALUES ('43', 'Pasar un tiempo regular en contacto con Jesús, conversando con él y aprendiendo sobre él.', '2', '3', '0');
INSERT INTO `requisito` VALUES ('44', 'Preguntar a tres personas por qué son felices de pertenecer a Jesús.', '2', '3', '0');
INSERT INTO `requisito` VALUES ('45', 'Preparar un cuaderno con recortes, mostrando lo que puedes hacer para servir a Dios y a los demás.', '3', '3', '0');
INSERT INTO `requisito` VALUES ('46', 'Completar la especialidad de Critico de los Medios de Comunicación.', '3', '3', '1');
INSERT INTO `requisito` VALUES ('47', 'Completar la especialidad de Temperancia.', '3', '3', '1');
INSERT INTO `requisito` VALUES ('48', 'Describir algún tipo de cambio que sucedió en tu familia y cuenta cómo te sentiste y lo que hiciste.', '4', '3', '0');
INSERT INTO `requisito` VALUES ('49', 'Participar del Juego del Amor.', '4', '3', '0');
INSERT INTO `requisito` VALUES ('50', 'Completar la especialidad de Mayordomía.', '4', '3', '1');
INSERT INTO `requisito` VALUES ('51', 'Hacer amistad con alguna persona con necesidades especiales o alguien de otra cultura o generación.', '5', '3', '0');
INSERT INTO `requisito` VALUES ('52', 'Invitar a una persona para un culto familiar o un programa de la Iglesia.', '5', '3', '0');
INSERT INTO `requisito` VALUES ('53', 'Conocer y explicar el himno nacional y la bandera de tu país.', '5', '3', '0');
INSERT INTO `requisito` VALUES ('54', 'Saber el nombre de la capital de tu país y del presidente.', '5', '3', '0');
INSERT INTO `requisito` VALUES ('55', 'Completar una especialidad del área de la naturaleza que aún no haya sido hecha.', '5', '3', '1');
INSERT INTO `requisito` VALUES ('56', 'Memorizar el voto y la ley de los Aventureros.', '1', '4', '0');
INSERT INTO `requisito` VALUES ('57', 'Explicar la ley del Aventurero.', '1', '4', '0');
INSERT INTO `requisito` VALUES ('58', 'Leer el libro del curso de lectura de los Aventureros.', '1', '4', '0');
INSERT INTO `requisito` VALUES ('59', 'Crear un cuadro mural mostrando el orden en que sucedieron estas historias: -Noe -Abraham -Moisés -David -Daniel O las historias de la Biblia que están estudiando en la clase o Escuela Sabática.', '2', '4', '0');
INSERT INTO `requisito` VALUES ('60', 'Preparar una canción, o una poesía, o una maqueta, con masa de modelar, sobre una de las historias del requisito anterior, demostrando a alguien cómo vivir por Jesús.', '2', '4', '0');
INSERT INTO `requisito` VALUES ('61', 'Encontrar, memorizar y explicar 3 versículos de la Biblia que hablen sobre vivir por Jesús. - Exo. 20:12-17 – Filip.2:13 – Filip. 4:13 – 1 Juan 2:1,2 – Judas 24', '2', '4', '0');
INSERT INTO `requisito` VALUES ('62', 'Recitar en orden los libros del Antiguo Testamento.', '2', '4', '0');
INSERT INTO `requisito` VALUES ('63', 'Pasar un tiempo regular en contacto con Jesús, conversando con él y aprendiendo sobre él.', '2', '4', '0');
INSERT INTO `requisito` VALUES ('64', 'Juntamente con un adulto, escoger alguna cosa que te gustaría mejorar en tu vida. En seguida orar, planificar y trabajar por eso, buscando la ayuda de Jesús.', '2', '4', '0');
INSERT INTO `requisito` VALUES ('65', 'Hacer una relación de algunos intereses y habilidades especiales que Dios te dio.', '3', '4', '0');
INSERT INTO `requisito` VALUES ('66', 'Demostrar y compartir tus talentos, haciendo una especialidad que permita expresar tu talendo personal.', '3', '4', '1');
INSERT INTO `requisito` VALUES ('67', 'Aprender los pasos que deben ser dados para hacer una buena elección.', '3', '4', '0');
INSERT INTO `requisito` VALUES ('68', 'Usar esos pasos para resolver dos problemas en la vida real.', '3', '4', '0');
INSERT INTO `requisito` VALUES ('69', 'Completar la especialidad de Higiene', '4', '4', '1');
INSERT INTO `requisito` VALUES ('70', 'Escoger una de las siguientes opciones: - Hacer una bandera o emblema de tu familia\r\n- Reunir hechos o fotos sobre la historia de tu familia.', '4', '4', '0');
INSERT INTO `requisito` VALUES ('71', 'Ayudar a planificar una de las siguientes actividades en familia: Culto familiar especial, Noche en familia o Paseo', '4', '4', '0');
INSERT INTO `requisito` VALUES ('72', 'Completar una especialidad que aún no haya sido realizada, en una de las siguientes áreas: Artes, Actividades domésticas, Habilidades', '4', '4', '1');
INSERT INTO `requisito` VALUES ('73', 'Completar la especialidad de Amigo Gentil.', '5', '4', '1');
INSERT INTO `requisito` VALUES ('74', 'Escoger una nacionalidad o cultura para estudiar. Encontrar una manera de compartir el amor de Jesús con alguna persona de la cultura o nacionalidad escogida.', '5', '4', '0');
INSERT INTO `requisito` VALUES ('75', 'Completar la especialidad de Ecología.', '5', '4', '1');
INSERT INTO `requisito` VALUES ('78', 'Memorice el voto y la ley.', '1', '5', '0');
INSERT INTO `requisito` VALUES ('82', 'Memorice el voto y la ley.', '1', '6', '0');
INSERT INTO `requisito` VALUES ('83', 'Memorice el voto y la ley.', '1', '7', '0');
INSERT INTO `requisito` VALUES ('84', 'Aprenda la Canción del club de castorcitos. Estampar deditos.', '1', '7', '0');
INSERT INTO `requisito` VALUES ('85', 'Aprenda la Canción del club de castorcitos. Estampar a dedos las notas musicales', '1', '6', '0');
INSERT INTO `requisito` VALUES ('86', 'Aprenda la Canción del club de castorcitos.', '1', '5', '0');
INSERT INTO `requisito` VALUES ('87', 'Especialidad de Stickers', '1', '7', '1');
INSERT INTO `requisito` VALUES ('88', 'Especialidad de Formas y tamaños', '1', '6', '1');
INSERT INTO `requisito` VALUES ('89', 'Especialidad de Diversión alfabética', '1', '5', '1');
INSERT INTO `requisito` VALUES ('90', 'Memorice  versículos de la Biblia 1 Juan 4: 8 y Éxodo 20: 8.', '1', '7', '0');
INSERT INTO `requisito` VALUES ('91', 'Memorice  versículos de la Biblia Juan 14:15 y Éxodo 20:8', '1', '6', '0');
INSERT INTO `requisito` VALUES ('92', 'Memorice  versículos de la Biblia Proverbios 3: 1,2 y Éxodo 20:8, 9', '1', '5', '0');
INSERT INTO `requisito` VALUES ('93', 'Aprende a orar a Jesús.', '2', '7', '0');
INSERT INTO `requisito` VALUES ('94', 'Aprende a orar a Jesús.', '2', '6', '0');
INSERT INTO `requisito` VALUES ('95', 'Aprende a orar a Jesús.', '2', '5', '0');
INSERT INTO `requisito` VALUES ('96', 'Memorice La última parte del “padrenuestro”', '2', '7', '0');
INSERT INTO `requisito` VALUES ('97', 'Memorice  La primera y la última parte del “padrenuestro”', '2', '6', '0');
INSERT INTO `requisito` VALUES ('98', 'Memorizar El “padrenuestro”', '2', '5', '0');
INSERT INTO `requisito` VALUES ('99', 'Memorizar Salmos 23:1 y Proverbios 3:5', '2', '7', '0');
INSERT INTO `requisito` VALUES ('100', 'Memorizar Filipenses 4:4; Proverbios 3:5', '2', '6', '0');
INSERT INTO `requisito` VALUES ('101', 'Memorizar Salmos 91:11  y Proverbios 3: 5-6', '2', '5', '0');
INSERT INTO `requisito` VALUES ('102', 'Especialidad Amigos de la Biblia', '2', '7', '1');
INSERT INTO `requisito` VALUES ('103', 'Especialidad Mi Dios', '2', '6', '1');
INSERT INTO `requisito` VALUES ('104', 'Especialidad Estrellas de Jesús', '2', '5', '1');
INSERT INTO `requisito` VALUES ('105', 'Especialidad Oraciones', '2', '7', '1');
INSERT INTO `requisito` VALUES ('106', 'Especialidad Nacimiento de Jesús', '2', '6', '1');
INSERT INTO `requisito` VALUES ('107', 'Especialidad Regalos de Dios', '2', '5', '1');
INSERT INTO `requisito` VALUES ('108', 'Ayude en casa (Haga 3 actividades para ayudar con la familia.)', '3', '7', '0');
INSERT INTO `requisito` VALUES ('109', 'Ayude en casa (Haga 5 actividades para ayudar con la familia.)', '3', '6', '0');
INSERT INTO `requisito` VALUES ('110', 'Ayude en casa (Haga 7 actividades para ayudar con la familia.)', '3', '5', '0');
INSERT INTO `requisito` VALUES ('111', 'Memorice Éxodo 20:12; Efesios 6: 1.', '3', '7', '0');
INSERT INTO `requisito` VALUES ('112', 'Memorice Efesios 6: 2; Efesios 6: 1', '3', '6', '0');
INSERT INTO `requisito` VALUES ('113', 'Memorice Éxodo 20:12;Efesios 6:1', '3', '5', '0');
INSERT INTO `requisito` VALUES ('114', 'Especialidad Ayudando a mamá, Quehaceres o Cocina entretenida', '3', '7', '1');
INSERT INTO `requisito` VALUES ('115', 'Especialidad Diversión con modales, Pequeños ayudadores o Pequeño chef', '3', '6', '1');
INSERT INTO `requisito` VALUES ('116', 'Especialidad Seguridad ante incendios,Regla de oro o comida saludable', '3', '5', '1');
INSERT INTO `requisito` VALUES ('117', 'La Creación de Dios (Aprender a reconocer los días de la creación.)', '4', '7', '0');
INSERT INTO `requisito` VALUES ('118', 'La Creacion de Dios (Aprender a reconocer los días de la creación.)', '4', '6', '0');
INSERT INTO `requisito` VALUES ('119', 'La Creacion Aprender el himno nacional de su país y Revise los días de la creación y haga un libro de recuerdos de creación.', '4', '5', '0');
INSERT INTO `requisito` VALUES ('120', 'Los animales (Identificar y aprender al menos 10 animales diferentes.)', '4', '7', '0');
INSERT INTO `requisito` VALUES ('121', 'Los animales (Aprenda las cinco categorías de animales y aprenda 1 de cada una.)', '4', '6', '0');
INSERT INTO `requisito` VALUES ('122', 'Los animales (Aprenda las cinco categorías de animales y aprenda 3 de cada una.)', '4', '5', '0');
INSERT INTO `requisito` VALUES ('123', 'Memorizar Génesis 1: 1 y Salmos 24: 1.', '4', '7', '0');
INSERT INTO `requisito` VALUES ('124', 'Memorizar Génesis 1: 1 y Salmos 24: 1', '4', '6', '0');
INSERT INTO `requisito` VALUES ('125', 'Memorizar Salmo 90: 2 y Salmos 24: 1.', '4', '5', '0');
INSERT INTO `requisito` VALUES ('126', 'Especialidades: El mundo de Dios, Vecino amigo o Vecino amigo', '4', '7', '1');
INSERT INTO `requisito` VALUES ('127', 'Especialidades:  ABC o Viajes', '4', '6', '1');
INSERT INTO `requisito` VALUES ('128', 'Especialidades: Aves, Colorea tu mundo o cosas que crecen', '4', '5', '1');
INSERT INTO `requisito` VALUES ('129', 'Haz 3 actividades para demostrar que eres independiente', '5', '7', '0');
INSERT INTO `requisito` VALUES ('130', 'Haga 5 actividades para demostrar que es independiente.', '5', '6', '0');
INSERT INTO `requisito` VALUES ('131', 'Haga 7 actividades para demostrar que es independiente y recuerde aprender acerca de Jesús todos los días, sin ser recordado.', '5', '5', '0');
INSERT INTO `requisito` VALUES ('132', 'Aprenda su nombre y el nombre de tus padres.', '5', '7', '0');
INSERT INTO `requisito` VALUES ('133', 'Aprende la fecha de tu cumpleaños y el nombre de tus padres', '5', '6', '0');
INSERT INTO `requisito` VALUES ('134', 'Aprende tu número de teléfono, cumpleaños y nombres de tus padres', '5', '5', '0');
INSERT INTO `requisito` VALUES ('135', 'Memorizar Juan 3:16; Proverbios 20:11', '5', '7', '0');
INSERT INTO `requisito` VALUES ('136', 'Memorizar Proverbios 22: 6;Proverbios 20:11', '5', '6', '0');
INSERT INTO `requisito` VALUES ('137', 'Memorizar Proverbios 22: 6;Proverbios 20:11', '5', '5', '0');
INSERT INTO `requisito` VALUES ('138', 'Especialidades Tesoro escondido, Cuidándome o Saltar', '5', '7', '0');
INSERT INTO `requisito` VALUES ('139', 'Especialdiades Medidas y arena, Niños grandes o Pequeño atleta', '5', '6', '0');
INSERT INTO `requisito` VALUES ('140', 'Especialdiades Conocer mi cuerpo, Emergencia y Físico', '5', '5', '0');
INSERT INTO `requisito` VALUES ('141', 'Otras especialidades Pueblos originarios (Chile), Stickers, ABC y Hojas', '5', '7', '0');
INSERT INTO `requisito` VALUES ('142', 'Otras especialidades Izquierda y derecha, Animales, Arte esponja, Formas y tamaños, Lápices y crayones, Dios me hizo, Arcilla y masa y Corte y tijeras', '5', '6', '0');
INSERT INTO `requisito` VALUES ('143', 'Otras especialidades Historias de la Biblia, Pescadores de hombres, Amigos emplumados, rastreadores espeluznantes, rocas y gemas, Árboles y Cajas de cartón de leche', '5', '5', '0');

-- ----------------------------
-- Table structure for `requisito_especialidad`
-- ----------------------------
DROP TABLE IF EXISTS `requisito_especialidad`;
CREATE TABLE `requisito_especialidad` (
  `id_requisito_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `fecha_hecho` date NOT NULL,
  `hecho` int(1) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  PRIMARY KEY (`id_requisito_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of requisito_especialidad
-- ----------------------------
INSERT INTO `requisito_especialidad` VALUES ('1', 'Poseer una Biblia identificada con tu nombre', '2018-03-25', '1', '5');
INSERT INTO `requisito_especialidad` VALUES ('2', 'Hablar sobre el respeto que se debe tener por la Biblia y cómo manejarla adecuadamente. \r\nadecuadamente. ', '2018-03-25', '1', '5');
INSERT INTO `requisito_especialidad` VALUES ('3', 'Decir los nombres del primero y del último libro de la Biblia y quiénes los escribieron. ', '2018-03-25', '1', '5');
INSERT INTO `requisito_especialidad` VALUES ('4', 'Contar o representar las siguientes historias o doctrinas bíblicas: La creación, El origen del pecado y de la tristeza ,Jesús me ama hoy o Jesús viene otra vez .   ', '2018-03-25', '1', '5');
INSERT INTO `requisito_especialidad` VALUES ('5', 'Encontrar, leer y explicar tres de los siguientes versículos, que tratan del amor de Jesús: Juan 3:16, Salmos 91 :11, Juan 14:3,Salmos 23:1 u Otro, de tu elección   ', '0000-00-00', '0', '5');
INSERT INTO `requisito_especialidad` VALUES ('6', 'Hacer objetos y ropas típicas para representar una historia o parábola de la Biblia.', '0000-00-00', '0', '5');
INSERT INTO `requisito_especialidad` VALUES ('7', 'Usar una caja de arena con figuras o un . \r\nfranelógrafo para contar una historia bíblica de tu elección.', '0000-00-00', '0', '5');

-- ----------------------------
-- Table structure for `seccion`
-- ----------------------------
DROP TABLE IF EXISTS `seccion`;
CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of seccion
-- ----------------------------
INSERT INTO `seccion` VALUES ('1', 'Requisitos Basicos');
INSERT INTO `seccion` VALUES ('2', 'Mi Dios');
INSERT INTO `seccion` VALUES ('3', 'Yo Mismo');
INSERT INTO `seccion` VALUES ('4', 'Mi Familia');
INSERT INTO `seccion` VALUES ('5', 'Mi Mundo');

-- ----------------------------
-- Table structure for `unidad`
-- ----------------------------
DROP TABLE IF EXISTS `unidad`;
CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `nombre_largo` varchar(50) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

-- ----------------------------
-- Records of unidad
-- ----------------------------
INSERT INTO `unidad` VALUES ('1', 'abejas', 'Abejitas Laboriosas', '1234cl', 'public/img/avatar-1.jpg');
INSERT INTO `unidad` VALUES ('2', 'rayos', 'Rayitos de Sol', '1234cl', 'public/img/avatar-2.jpg');
INSERT INTO `unidad` VALUES ('3', 'constructores', 'Constructores', '1234cl', 'public/img/avatar-3.jpg');
INSERT INTO `unidad` VALUES ('4', 'manos', 'Manos Ayudadoras', '1234cl', 'public/img/avatar-4.jpg');
INSERT INTO `unidad` VALUES ('5', 'castores', 'Castores', '1234cl', 'public/img/avatar-5.jpg');
INSERT INTO `unidad` VALUES ('6', 'conejos', 'Conejos', '1234cl', 'public/img/avatar-6.jpg');
INSERT INTO `unidad` VALUES ('7', 'ardillas', 'Ardillas', '1234cl', 'public/img/avatar-7.jpg');
