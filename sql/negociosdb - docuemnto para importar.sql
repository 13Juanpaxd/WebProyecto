-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 02:56 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negociosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id_Mensaje` int NOT NULL,
  `id_Usuario` varchar(50) DEFAULT NULL,
  `hora_Fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mensaje` text,
  `leido` enum('Si','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id_Mensaje`, `id_Usuario`, `hora_Fecha`, `mensaje`, `leido`) VALUES
(1, 'carlos', '2024-08-22 19:15:00', 'Hola, me interesa conocer sobre tu negocio', 'Si'),
(2, 'marta', '2024-08-22 20:33:00', 'Hola Carlos, gracias por contactarnos, Pasteleria \r\nDulce Sazon realiza pasteles, repostería y otros productos deliciosos. Te interesa \r\nalgún producto en especial?', 'Si'),
(3, 'carlos', '2024-08-22 21:05:00', 'Gracias por la respuesta, me interesa un pastel de \r\ncumpleaños. Dónde están ubicados?', 'Si'),
(4, 'marta', '2024-08-22 21:20:00', 'Nos ubicamos 75 mestros este de la clinica de \r\nSan Rafael de Heredia', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `me_gusta`
--

CREATE TABLE `me_gusta` (
  `id_Me_Gusta` int NOT NULL,
  `cod_Usuario` varchar(50) DEFAULT NULL,
  `cod_Producto` int DEFAULT NULL,
  `fecha_Hora` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `me_gusta`
--

INSERT INTO `me_gusta` (`id_Me_Gusta`, `cod_Usuario`, `cod_Producto`, `fecha_Hora`) VALUES
(1, 'carlos', 1, '2024-08-22 21:20:00'),
(2, 'carlos', 2, '2024-08-22 21:20:00'),
(3, 'marta', 3, '2024-08-22 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `negocios`
--

CREATE TABLE `negocios` (
  `id_Negocio` int NOT NULL,
  `usuario_Dueno` varchar(50) DEFAULT NULL,
  `ruta_Foto` varchar(500) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `actividad` varchar(255) DEFAULT NULL,
  `fecha_Fundacion` date DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `pagina_Web` varchar(255) DEFAULT NULL,
  `envios` enum('Si','No') DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `google_Maps` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `negocios`
--

INSERT INTO `negocios` (`id_Negocio`, `usuario_Dueno`, `ruta_Foto`, `nombre`, `actividad`, `fecha_Fundacion`, `telefono`, `direccion`, `pagina_Web`, `envios`, `facebook`, `instagram`, `youtube`, `google_Maps`) VALUES
(1, 'marta', 'uploads/pasteleria.jpg', 'Pastelería Dulce Sazón', 'Creación de asteles, repostería y otros productos deliciosos', '2024-01-15', '2422-3333', 'Heredia, Barva', 'http://www.facebook.com', 'Si', 'http://www.facebook.com', 'http://www.instagram.com', 'http://www.youtube.com', 'http://www.googlemaps.com'),
(2, 'marta', 'uploads/organizar-fiesta.jpg', 'Marta Fiestas', 'Organización y ejecución de fiestas de cumpleaños, aniversarios, graduaciones y más', '2024-06-06', '2433-2222', 'San José, Tibás', 'http://www.facebook.com', 'Si', 'http://www.facebook.com', 'http://www.instagram.com', 'http://www.youtube.com', 'http://www.googlemaps.com'),
(3, 'carlos', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.elsoldesanluis.com.\r\nmx%2Flocal%2Fcrece-demanda-de-calzado-urbano-en-las-zapaterias-a-raiz-de-la-pandemia-\r\n7439383.html&psig=AOvVaw0vMOmU51UJhtYnD3Aogn9v&ust=1724621430942000&source=images&cd=\r\nvfe&opi=89978449&ved=0CBQQjRxqFwoTCKCGl9DJjogDFQAAAAAdAAAAABAE', 'Tennis de Heredia', 'Venta de tennis originales al mejor precio \r\ny calidad', '2024-05-23', '8435-5869', 'Alajuela centro', 'www.facebook.com', 'Si', 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'www.googlemaps.com'),
(5, 'marta', 'uploads/compus-tiw.png', 'Negocio de Prueba', 'Negocio de Prueba', '2024-08-25', '8888-8888', 'City Mall Alajuela', 'http://www.prueba.com', 'Si', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_Producto` int NOT NULL,
  `cod_Negocio` int DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) DEFAULT NULL,
  `cant_Me_Gusta` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_Producto`, `cod_Negocio`, `foto`, `nombre`, `descripcion`, `precio`, `cant_Me_Gusta`) VALUES
(1, 1, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fsacher.com.\r\nmx%2Fblog%2Fpost%2Fpastel%2520de%2520chocolate%2520y%2520naranja&psig=AOvVaw3sIsY_\r\nuwE0wWh0K7z02zla&ust=1724618416248000&source=images&cd=vfe&opi=89978449&ved=0CBQQj\r\nRxqFwoTCOjK4rK-jogDFQAAAAAdAAAAABAI', 'Pastel de Chocolate y Naranja', 'Delicioso \r\npastel artesanal, con naranja natural y chocolate', 15000.00, 0),
(2, 1, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffoodandpleasure.\r\ncom%2Fmaria-fortunata-pasteles-cumpleanos%2F&psig=AOvVaw3sIsY_uwE0wWh0K7z\r\n02zla&ust=1724618416248000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRx\r\nqFwoTCOjK4rK-jogDFQAAAAAdAAAAABAQ', 'Pastel de cumpleaños (vainilla)', 'Pastel con \r\ndecoración de cumpleaños, grande', 20000.00, 0),
(3, 2, 'uploads/fiesta-de-cumpleanos-655x368.jpg', 'Organización de fiestas de cumpleaños', 'Incluye la organización y la planificación, la decoración, la comida y actividades. Para 10 personas como máximo', 50000.00, 0),
(4, 2, 'uploads/FIESTAGRADUPORTADILLA.jpg', 'Organización de fiestas de Graduación', 'Incluye la organización y la planificación, la decoración, la comida y actividades. Para 10 personas máximo.', 100000.00, 0),
(5, 3, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Felcaminantecr.com%2Fti\r\nenda%2Finicio%2F2588-150355-tenis-nike-tanjun.html&psig=AOvVaw16mDrbv59YtfVbb4V\r\n17JnD&ust=1724618873694000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTC\r\nMjliIzAjogDFQAAAAAdAAAAABAQ', 'Tenis Nike Tanjun', 'Variedad de tallas. 100% \r\nOriginales', 50000.00, 0),
(6, 3, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.unimart.com%2Fpr\r\noducts%2Fpuma-tenis-deportivos-graviton-wns-negro-gris-rosa-para-mujer&psig=A\r\nOvVaw2V8R6M_xhcdNEBbSHuImgI&ust=1724618955731000&source=images&cd=vfe&opi=899\r\n78449&ved=0CBQQjRxqFwoTCJi_orPAjogDFQAAAAAdAAAAABAE', 'Tenis Puma Graviton \r\nWNS Negro/Gris/Rosa, para Mujer', 'Variedad de tallas. 100% Originales', 60000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recuperacion_password`
--

CREATE TABLE `recuperacion_password` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `fecha_expiracion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

CREATE TABLE `recursos` (
  `id_Recurso` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `contenido` text,
  `fecha_Publicacion` date DEFAULT NULL,
  `tipo_recurso` enum('Articulo','Video','FAQ','Privacidad','Terminos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`id_Recurso`, `titulo`, `autor`, `contenido`, `fecha_Publicacion`, `tipo_recurso`) VALUES
(1, 'Cualidades que necesitas para ser un buen emprendedor', 'Observatorio Laboral', 'Sin importar cuál sea tu idea de negocio, hay cualidades que son básicas entre las personas que deciden emprender. En el OLA, te recomendamos contar con estas 10 cualidades para que tu negocio sea un éxito:\r\n\r\n1. Creatividad e ingenio\r\nEl primer paso para emprender es tener una idea, ya que a partir de ésta es donde surgen proyectos nuevos y se puede revolucionar el mercado o sector.\r\n\r\n2. Pasión\r\nBien dicen que cuando amas lo que haces, el éxito llega solo. Y para emprender, se necesita tener motivación. La única manera de enfrentar y lidiar con las dificultades que surjan en el camino, es amando lo que haces.\r\n\r\n3. Visión\r\nVisualiza tu negocio y cúmplelo. No basta con tener ideas o sueños, es importante buscar los medios para llevarlos a cabo. Recuerda que, si tú no lo haces, nadie lo hará por ti.\r\n\r\n4. Liderazgo\r\nYa tienes el proyecto, ahora ¡toma las riendas! Debes aprender a detectar las oportunidades y aprovecharlas en el momento justo. Todo líder influye en su equipo para tomar decisiones, pero también los guía.\r\n\r\n5. Paciencia\r\nUn buen negocio no nace de la noche a la mañana y, muchas veces, deberás trabajar a prueba y error. Enfrentar las adversidades e intentarlo una y otra vez, será vital para llegar a la cima.\r\n\r\n6. Confianza en ti\r\nNadie confiará en tu negocio si tú no lo haces. Las demás personas deben verte seguro de ti mismo. Si dudas en algún momento, eso se reflejará en el entorno y podría repercutir en tu proyecto.\r\n\r\n7. Responsabilidad\r\nCualquier negocio, por pequeño que sea, debe tomarse con seriedad. Involúcrate en todas las actividades y asume responsabilidades tanto con tu equipo, como con los clientes, socios o proveedores.\r\n\r\n8. Receptivo\r\nTodos los días se aprende algo y en tu camino hacia el éxito, debes estar abierto para aprender todo lo que puedas y a recibir críticas constructivas para mejorar.\r\n\r\n9. Empatía\r\nPonerte en el lugar de los otros para entender sus necesidades te ayudará a crear vínculos con las personas. Si eres empático, serás capaz de conectarte con tus clientes.\r\n\r\n10. Decisión\r\nTodos los proyectos de emprendimiento, tarde o temprano, llegan a una de las tareas más importantes: tomar decisiones. Si analizas las ventajas y desventajas de una situación, siendo lo más objetivo posible, las decisiones que tomes serán acertadas.\r\n\r\nNo te preocupes si aún no cuentas con alguna de estas habilidades, puedes irlas desarrollando poco a poco, tú mismo, o con un algún curso o taller.\r\n\r\nY recuerda…\r\n\r\nPara emprender, es necesario tomar riesgos. Acércate con los expertos y aprende de ellos. Existen instituciones que brindan financiamiento para impulsar a jóvenes emprendedores.\r\n\r\nTen la mente abierta, hay mucha competencia en el mercado. Así que, mantente actualizado. Nada es lo que parece. Hasta que no lo intentes, no sabrás si algo puede funcionar.\r\n\r\nLos mejores emprendedores son aquellos que comienzan con negocios reales y que no desisten jamás en el intento. Si tienes una idea, ¡hazla realidad!', '2024-08-22', 'Articulo'),
(2, '10 Aspectos a tomar en cuenta al iniciar un emprendimiento o negocio', 'Luis Alvarez', 'Son muchas las recomendaciones que escucharás de amigos o familiares, al momento de contarles que quieres iniciar un emprendimiento o negocio. Es bueno poner en práctica estos consejos, siempre y cuando vengan de una fuente que tenga experiencia en el tema y no sólo te hable desde el amor o cariño; sabemos que todos quieren que tengas éxito, pero no todos saben o conocen cuáles serán esas herramientas que te conducirán hasta él.\r\n\r\nTodo emprendimiento lleva consigo sueños, trabajo, constancia y determinación. Lo mismo en el caso de un negocio, cuando tomamos la decisión y finalmente decimos “Si, iniciaré mi negocio”, hay una carga alta de responsabilidades que trae consigo.\r\n\r\nPero, ¿será lo mismo un emprendimiento que un negocio? Generalmente para tener un negocio, todos empezamos creando proyectos que nos apasionan y al darnos cuenta que dan resultados, podemos ejecutarlo formalmente en un plano legal. Por lo que el emprendimiento sería un primer paso y el negocio, ya sería la consolidación del mismo; pero hay ciertas recomendaciones que en ambos casos aplicarían:\r\n\r\nAsegúrate de ofrecer algo diferente\r\nNo seas uno más del montón, no te conformes con el hecho de saber que como hay un área o producto determinado que genera dinero, tú también trabajaras en eso.\r\n\r\nEjecuta esa locura que tienes en mente, que quizás aún no te atreves a realizar. Claro, determina que tan rentable puede ser, evalúa todos los aspectos, si es posible realiza una pequeña encuesta para conocer la opinión de la gente.\r\n\r\nEstudia el Mercado\r\nSi aún no tienes nada en mente, pero necesitas iniciar un negocio; estudia el mercado, reconoce las necesidades del sector donde piensas desarrollar tu proyecto.\r\n\r\nSi es un negocio, identifica si hay ausencia de restaurants, de panaderías, de tiendas de ropa, dulcerías o espacios de recreación. Si encuentras que realmente se necesita alguno de los mencionados, ponle tu toque, se recreativo y encargarte de que deseen visitarte.\r\n\r\nSi se trata de un emprendimiento, identifica quienes más están pensando igual que tú, qué puedes hacer para diferenciarte y que haría que se inclinen más a ti, a seguir apostando por lo seguro.\r\n\r\nReúne un buen equipo humano\r\nEncargarte de que quienes trabajan a tu lado, sean profesionales o estén capacitados realmente para el cargo que vayan a asumir dentro del proyecto.\r\n\r\nTodos los espacios deben ser manejados de la mejor forma. De eso dependerá también tu éxito.\r\n\r\nSé constante\r\nLa constancia es un valor que determinará los triunfos y fracasos en nuestra vida; sino estamos seguros de que seremos firmes con nuestras ideas, no podremos ejecutarlas. De nada servirá un extraordinario proyecto hoy, si mañana lo abandonarás, o empezaras a desplazarlo por otra cosa.\r\n\r\nDelega funciones\r\nEl empresario y filántropo estadounidense, Andrew Carnegie, dijo en un momento: “No serás un gran líder si quieres hacer todo por ti mismo o sólo obtener el crédito de ello”.\r\n\r\nSi tu deseo es triunfar, debes delegar responsabilidades a personas que están en la capacidad de asumirla. No es asumir por asumir, si tú no eres contador, busca a uno excelente, si quieres montar una pastelería pero no eres pastelero, por más que quieras hacer todo por ti mismo, debes aceptar que apoyándote en otra personas, conseguirás lo deseado, sino eres el mejor orador, busca a una persona que se encargue de dar a conocer tu producto o servicio.\r\n\r\nEn el caso de emprendimientos, sucede mucho que al no contar con una capital, se quiere asumir todas las áreas por sí mismo; al inicio eso no está mal, pero podrías buscar asesoramiento con especialistas que manejen la información que tú no.\r\n\r\nReconoce las necesidades de tus clientes\r\nIgnorar las recomendaciones y solicitudes de tus clientes, es un gran error. Al momento que encuentren alguien que les ofrezca lo anhelado, cambiarán.\r\n\r\nSe lo suficientemente abierto para detectar que debes hacer cambios, no porque esté mal, sino porque debes mejorar. Todos los días hay cosas diferentes, todos los días pensamos diferente ¿verdad?, pues no podemos pretender que nuestros clientes acepten lo mismo todos los días, puede que al inicio les agrade, pero a la larga, se irán.\r\n\r\nApóyate en los Medios Sociales\r\nEs un error de muchos iniciar un proyecto y no hacer publicidad. “Publicidad es obtener ganancias a corto, mediano y largo plazo”.\r\n\r\nSi tienes la capital para arrancar tu negocio, invierte en publicidad, date a conocer, muestra lo que estás haciendo. Los medios sociales tienen amplias herramientas que te permitirán llegar mejor y a más personas.\r\n\r\nFacebook, Instagram, Youtube o una página web, pueden ser de ayuda. Identifica el target de tu público y edades, según eso crea una estrategia que pueda ser efectiva a la hora de iniciar por estos medios.\r\n\r\nSi desconoces el tema, recaemos en el punto número 6, delega funciones a alguien que si maneje el área.\r\n\r\nDefine en donde estará el 100% de tu atención\r\nHay personas que por naturaleza son creativas, a diario se plantean muchísimos proyectos. Pero hay un problema con esto, debemos jerarquizar cuál será al que dediques tu atención, porque si a varios proyectos le dedicas el 25% de ti, no serán exitosos.\r\n\r\nEsté al día legalmente\r\nCumple con los procedimientos tributarios, declara los respectivos impuestos, sé transparente.\r\n\r\nSi eres emprendedor, recuerda que debes registrarte en el RUC (Registro único de Contribuyentes), para obtener un número de identificación que te permitirá tramitar tus facturas y así responder ante tus clientes como se debe; de seguro te solicitarán una factura y tú irás un paso adelante prestando un excelente servicio.\r\n\r\nSi eres artesano, pintor, carpintero o quieres independizarte en tu profesión, tienes la obligación de registrarte para cumplir ante las leyes y lo estipulado por el SRI (Servicio de Rentas Internas).\r\n\r\nCapacítese, haga Networking\r\nUno de los peores errores en la vida es creer que lo sabemos todo. Siempre hay cosas nuevas por aprender y más cuando queremos seguir creciendo no sólo personal sino profesionalmente.\r\n\r\nAcuda a cursos, talleres, conferencias, estudie lo relacionado a su proyecto; crear una red de contactos profesionales de personas que estén en la misma área o interesado en lo que haces. Nunca está demás escuchar a los especialistas y aplicar algunas técnicas en nuestro negocio o emprendimiento; el limitarse será letal; irá quedando en el pasado.\r\n\r\nSi hay una recomendación que es genérica, es que debe capacitarse. Sólo así usted adquirirá ideas para innovar, reconocerá que debe delegar, le afirmarán que la constancia es base del éxito, que al estar legal no corre ningún riesgo y que al dedicarse 100% a su proyecto, sabrá identificar qué cosas están bien y que debe mejorar.', '2024-08-22', 'Articulo'),
(3, 'Emprendimiento y Emprendedor. Conceptualización Teórica', 'Universitat Politècnica de València UPV', 'https://www.youtube.com/embed/t2eMk9wzDLI?si=fOKcpwtMPrNJk-6Y', '2017-10-23', 'Video'),
(4, '5 Pasos para Pasar de Idea de Negocio a Empresa Exitosa', 'Emprende Aprendiendo', 'https://www.youtube.com/embed/E6PhOEOFl6g?si=aAkqmZjCyoM5MiTX', '2020-01-10', 'Video'),
(5, '¿Cómo puedo registrarme en la Red Social de Emprendedores?', NULL, 'Para registrarte, ve a la página principal y haz clic en el botón \"Registrarse\". Completa el formulario con tu nombre, dirección de correo electrónico y contraseña. Luego, confirma tu registro a través del enlace que recibirás en tu correo electrónico.', '2024-08-20', 'FAQ'),
(6, '¿Cómo puedo recuperar mi contraseña si la olvidé?', NULL, 'Si olvidaste tu contraseña, haz clic en el enlace \"¿Olvidaste tu contraseña?\" en la página de inicio de sesión. Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.', '2024-08-20', 'FAQ'),
(7, '¿Cómo puedo actualizar la información de mi perfil?', NULL, 'Para actualizar tu perfil, inicia sesión y dirígete a la página de \"Mi Perfil\". Allí puedes cambiar tu foto de perfil, nombre, y otros detalles. No olvides guardar los cambios al final.', '2024-08-20', 'FAQ'),
(8, '¿Puedo eliminar mi cuenta?', NULL, 'Sí, puedes eliminar tu cuenta en cualquier momento. Ve a \"Contactar a Soporte\" y solicita la eliminación de tu cuenta. Ten en cuenta que esta acción es irreversible y todos tus datos serán eliminados permanentemente.', '2024-08-20', 'FAQ'),
(9, '¿Cómo puedo enviar mensajes a otros emprendedores?', NULL, 'Puedes enviar mensajes privados a otros usuarios haciendo clic en su perfil y seleccionando la opción \"Enviar mensaje\". También puedes acceder a tu bandeja de entrada desde el icono de mensajes en la barra de navegación.', '2024-08-20', 'FAQ'),
(10, '¿Cómo puedo reportar un contenido inapropiado o un usuario?', NULL, 'Si encuentras contenido inapropiado o deseas reportar a un usuario, Ve a \"Contactar a Soporte\" y solicita la revisión del contenido. Nuestro equipo de soporte revisará el reporte y tomará las medidas necesarias.', '2024-08-20', 'FAQ'),
(11, '¿Cómo puedo encontrar artículos y recursos útiles para mi negocio?', NULL, 'Visita la sección \"Recursos y Herramientas\" en el menú de navegación. Aquí encontrarás artículos, videos, y otros recursos útiles para emprendedores. ', '2024-08-20', 'FAQ'),
(12, '1. Uso del Sitio Web', NULL, 'El contenido de las páginas de este sitio web es para tu información general y uso exclusivo. Está sujeto a cambios sin previo aviso.', '2024-08-20', 'Terminos'),
(13, '2. Licencia de Uso', NULL, 'Se te concede una licencia limitada para acceder y hacer uso personal de este sitio y no para descargarlo (excepto el almacenamiento en caché) o modificarlo, o cualquier porción del mismo, excepto con el consentimiento expreso por escrito de nosotros.', '2024-08-20', 'Terminos'),
(14, '3. Privacidad', NULL, 'Tu uso de este sitio web está sujeto a nuestra política de privacidad, que también rige el sitio y nos informa sobre nuestras prácticas de recopilación de datos. Al usar nuestro sitio, también aceptas la forma en que procesamos tus datos personales, conforme a nuestra política de privacidad.', '2024-08-20', 'Terminos'),
(15, '4. Prohibiciones', NULL, 'No debes usar este sitio web de ninguna manera que cause, o pueda causar, daño al sitio web o deterioro de la disponibilidad o accesibilidad del sitio web; o de cualquier manera que sea ilegal, fraudulenta o perjudicial, o en conexión con cualquier propósito o actividad ilegal, fraudulenta o perjudicial.', '2024-08-20', 'Terminos'),
(16, '5. Cambios en los Términos', NULL, 'Nos reservamos el derecho de realizar cambios en nuestro sitio, políticas y estos términos y condiciones en cualquier momento. Tu uso continuo del sitio web después de cualquier cambio constituirá tu aceptación de dichos cambios.', '2024-08-20', 'Terminos'),
(17, '6. Ley Aplicable', '', 'Estos términos y condiciones se rigen y se interpretan de acuerdo con las leyes de Costa Rica, y cualquier disputa relacionada con estos términos y condiciones estará sujeta a la jurisdicción exclusiva de los tribunales de Costa Rica.', '2024-08-20', 'Terminos'),
(18, 'Política de Privacidad', NULL, '<h2>1. Información que Recopilamos</h2>\n        <p>Podemos recopilar la siguiente información:</p>\n        <ul>\n            <li>Nombre y apellido</li>\n            <li>Información de contacto, incluyendo dirección de correo electrónico</li>\n            <li>Información demográfica, como código postal, preferencias e intereses</li>\n            <li>Otra información relevante para encuestas y/o ofertas de clientes</li>\n        </ul>\n\n        <h2>2. Uso de la Información</h2>\n        <p>Utilizamos esta información para entender tus necesidades y ofrecerte un mejor servicio, y en particular por las siguientes razones:</p>\n        <ul>\n            <li>Mantenimiento de registros internos.</li>\n            <li>Mejorar nuestros productos y servicios.</li>\n            <li>Enviar correos electrónicos promocionales sobre nuevos productos, ofertas especiales u otra información que pensamos que puede ser de tu interés.</li>\n            <li>Personalizar el sitio web según tus intereses.</li>\n        </ul>\n\n        <h2>3. Seguridad</h2>\n        <p>Estamos comprometidos a garantizar que tu información esté segura. Para prevenir el acceso no autorizado o divulgación, hemos implementado procedimientos físicos, electrónicos y administrativos para salvaguardar y asegurar la información que recopilamos en línea.</p>\n\n        <h2>4. Cómo Usamos las Cookies</h2>\n        <p>Una cookie es un pequeño archivo que pide permiso para ser colocado en el disco duro de tu computadora. Una vez que aceptas, el archivo se agrega y la cookie ayuda a analizar el tráfico web o te permite saber cuándo visitas un sitio en particular.</p>\n\n        <h2>5. Enlaces a Otros Sitios Web</h2>\n        <p>Nuestro sitio web puede contener enlaces a otros sitios de interés. Sin embargo, una vez que hayas usado estos enlaces para salir de nuestro sitio, debes tener en cuenta que no tenemos control sobre ese otro sitio web. Por lo tanto, no podemos ser responsables de la protección y privacidad de cualquier información que proporciones mientras visitas dichos sitios y dichos sitios no se rigen por esta política de privacidad.</p>\n\n        <h2>6. Control de tu Información Personal</h2>\n        <p>Puedes optar por restringir la recopilación o el uso de tu información personal de las siguientes maneras:</p>\n        <ul>\n            <li>Siempre que se te pida que rellenes un formulario en el sitio web, busca la casilla en la que puedes hacer clic para indicar que no deseas que la información sea utilizada por nadie con fines de marketing directo.</li>\n            <li>Si has aceptado previamente que usemos tu información personal con fines de marketing directo, puedes cambiar de opinión en cualquier momento escribiéndonos o enviándonos un correo electrónico a [dirección de correo electrónico de soporte].</li>\n        </ul>\n\n        <p>No venderemos, distribuiremos ni cederemos tu información personal a terceros a menos que tengamos tu permiso o estemos obligados por ley a hacerlo.</p>', '2024-08-20', 'Privacidad');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `fecha_Nacimiento` date DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `fecha_Registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_perfil` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `nombre`, `email`, `pais`, `fecha_Nacimiento`, `telefono`, `sexo`, `fecha_Registro`, `foto_perfil`, `password`) VALUES
('admin', 'admin', 'admin@email.com', 'Costa Rica', '2024-01-01', NULL, NULL, '2024-08-25 03:34:24', NULL, '$2y$10$o1igAeEvwzVOE3yt58Xaw.vWmm6qOLqD1Qdoe/u3iaktBgeR3ZnKm'),
('carlos', 'Carlos Vega', 'carlitos@email.com', 'Costa Rica', '1994-02-15', '8765-4321', 'Masculino', '2024-08-20 06:00:00', 'https://www.google.com/url?sa=i&url\n=https%3A%2F%2Fes.wikipedia.org%2Fwiki%2FArchivo%3AFoto_Perfil_.jpg&psig=AOv\nVaw1IqIXulq2p98_g7HpcVKZT&ust=1724621471701000&source=images&cd=vfe&opi=8997\n8449&ved=0CBQQjRxqFwoTCMCUqOjJjogDFQAAAAAdAAAAABAE', 'carlos'),
('cliente', 'Cliente', 'cliente@c.com', 'Honduras', '2000-01-01', NULL, NULL, '2024-08-25 02:57:29', NULL, '$2y$10$ZBRl.6nvXvJglFX0/S2lc.CgYH3H8TK1PJ8PlVxdO4Jtzh73SHJWa'),
('cliente2', 'Cliente2', 'cliente2@c.com', 'Nicaragua', '2020-01-01', NULL, NULL, '2024-08-25 03:19:04', NULL, '$2y$10$39QcgVeOHM8N3splrVSPU.2VofP3fZNuphzgZiRbhy66IlSlrkZ5u'),
('diego', 'Diego', 'diego@email.com', 'Costa Rica', '1994-07-02', '5555-5555', 'Masculino', '2024-08-25 02:41:58', 'uploads/pexels-photo-846741.jpeg', '$2y$10$EHZ8X6ZZhhSu.orFKdlZHeD67RPLXz.JyX9wkJDuG5tvGd8uponeW'),
('marta', 'Marta López', 'marta@email.com', 'Costa Rica', '1998-05-01', '8877-6655', 'Femenino', '2024-08-20 06:00:00', 'uploads/marta.jpg', '$2y$10$BtmhXEFNn.DYKjSx7fHxbuuOXCVOVGmeeS7NKB1VNOtROueZPI/PS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_Mensaje`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indexes for table `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD PRIMARY KEY (`id_Me_Gusta`),
  ADD KEY `cod_Usuario` (`cod_Usuario`),
  ADD KEY `cod_Producto` (`cod_Producto`);

--
-- Indexes for table `negocios`
--
ALTER TABLE `negocios`
  ADD PRIMARY KEY (`id_Negocio`),
  ADD KEY `usuario_Dueno` (`usuario_Dueno`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_Producto`),
  ADD KEY `cod_Negocio` (`cod_Negocio`);

--
-- Indexes for table `recuperacion_password`
--
ALTER TABLE `recuperacion_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_Recurso`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_Mensaje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `me_gusta`
--
ALTER TABLE `me_gusta`
  MODIFY `id_Me_Gusta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `negocios`
--
ALTER TABLE `negocios`
  MODIFY `id_Negocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_Producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recuperacion_password`
--
ALTER TABLE `recuperacion_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_Recurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD CONSTRAINT `me_gusta_ibfk_1` FOREIGN KEY (`cod_Usuario`) REFERENCES `usuarios` (`username`),
  ADD CONSTRAINT `me_gusta_ibfk_2` FOREIGN KEY (`cod_Producto`) REFERENCES `productos` (`id_Producto`);

--
-- Constraints for table `negocios`
--
ALTER TABLE `negocios`
  ADD CONSTRAINT `negocios_ibfk_1` FOREIGN KEY (`usuario_Dueno`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_Negocio`) REFERENCES `negocios` (`id_Negocio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
