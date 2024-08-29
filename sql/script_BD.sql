-- Se borra la base de datos si existe
DROP DATABASE IF EXISTS NegociosDB;

-- Crear la base de datos
CREATE DATABASE NegociosDB;

-- Usar la base de datos
USE NegociosDB;


-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    username VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    pais VARCHAR(100),
    fecha_Nacimiento DATE,
    telefono VARCHAR(15),
    sexo ENUM('Masculino', 'Femenino', 'Otro'),
    fecha_Registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foto_perfil VARCHAR(500),
    password VARCHAR(255) NOT NULL
);

-- Crear la tabla de mensajes
CREATE TABLE mensajes (
    id_Mensaje INT AUTO_INCREMENT PRIMARY KEY,
    id_Usuario_envia VARCHAR(50),
    id_Usuario_recibe VARCHAR(50),
    hora_Fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mensaje TEXT,
    leido ENUM('Si', 'No'),
    FOREIGN KEY (id_Usuario_envia) REFERENCES usuarios(username),
     FOREIGN KEY (id_Usuario_recibe) REFERENCES usuarios(username)
);


-- Crear la tabla de negocios
CREATE TABLE negocios (
    id_Negocio INT AUTO_INCREMENT PRIMARY KEY,
    usuario_Dueno VARCHAR(50),
    ruta_Foto VARCHAR(500),
    nombre VARCHAR(100) NOT NULL,
    actividad VARCHAR(255),
    fecha_Fundacion DATE,
    telefono VARCHAR(15),
    direccion VARCHAR(255),
    pagina_Web VARCHAR(255),
    envios ENUM('Si', 'No'),
    facebook VARCHAR(255),
    instagram VARCHAR(255),
    youtube VARCHAR(255),
    google_Maps VARCHAR(255),
    FOREIGN KEY (usuario_Dueno) REFERENCES usuarios(username)
);

-- Crear la tabla de productos
CREATE TABLE productos (
    id_Producto INT AUTO_INCREMENT PRIMARY KEY,
    cod_Negocio INT,
    foto VARCHAR(500),
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2),
    cant_Me_Gusta INT DEFAULT 0,
    FOREIGN KEY (cod_Negocio) REFERENCES negocios(id_Negocio)
);

-- Crear la tabla de me_gusta
CREATE TABLE me_gusta (
    id_Me_Gusta INT AUTO_INCREMENT PRIMARY KEY,
    cod_Usuario VARCHAR(50),
    cod_Producto INT,
    visto INT DEFAULT 0,
    fecha_Hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cod_Usuario) REFERENCES usuarios(username),
    FOREIGN KEY (cod_Producto) REFERENCES productos(id_Producto)
);

-- Crear la tabla de recursos
CREATE TABLE recursos (
    id_Recurso INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(100),
    contenido TEXT,
    fecha_Publicacion DATE,
    tipo_recurso ENUM('Articulo','Video','FAQ','Privacidad','Terminos') NOT NULL
);

CREATE TABLE recuperacion_password (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL,
    fecha_expiracion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

USE NegociosDB;

/* Se insertan 3 usuarios */
INSERT INTO NegociosDB.usuarios (username, nombre, email, pais, fecha_Nacimiento, 
telefono, sexo, fecha_Registro, foto_perfil, password) VALUES 
('admin', 'admin', 'admin@email.com', 'Costa Rica', '2000-01-01', '8888-8888', 
'Masculino', '2024-08-20', NULL, '123456'),
('carlos', 'Carlos Vega', 'carlitos@email.com', 'Costa Rica', '1994-02-15', 
'8765-4321', 'Masculino', '2024-08-20', 'https://www.google.com/url?sa=i&url
=https%3A%2F%2Fes.wikipedia.org%2Fwiki%2FArchivo%3AFoto_Perfil_.jpg&psig=AOv
Vaw1IqIXulq2p98_g7HpcVKZT&ust=1724621471701000&source=images&cd=vfe&opi=8997
8449&ved=0CBQQjRxqFwoTCMCUqOjJjogDFQAAAAAdAAAAABAE','carlos'),
('marta', 'Marta López', 'marta@email.com', 'Costa Rica', '1998-05-01', 
'8877-6655', 'Femenino', '2024-08-20', 'https://www.google.com/url?sa=i
&url=https%3A%2F%2Fwww.dzoom.org.es%2Ffoto-perfil-redes-sociales%2F&psi
g=AOvVaw1IqIXulq2p98_g7HpcVKZT&ust=1724621471701000&source=images&cd=vf
e&opi=89978449&ved=0CBQQjRxqFwoTCMCUqOjJjogDFQAAAAAdAAAAABAJ', 'marta');

/* Se insertan 3 mensajes */
INSERT INTO NegociosDB.mensajes (id_Usuario_envia, id_Usuario_recibe, hora_Fecha, mensaje, leido) VALUES 
('carlos','marta', '2024-08-22 13:15:00', 'Hola, me interesa conocer sobre tu negocio', 'Si'),
('marta','carlos', '2024-08-22 14:33:00', 'Hola Carlos, gracias por contactarnos, Pasteleria 
Dulce Sazon realiza pasteles, repostería y otros productos deliciosos. Te interesa 
algún producto en especial?', 'Si'),
('carlos','marta', '2024-08-22 15:05:00', 'Gracias por la respuesta, me interesa un pastel de 
cumpleaños. Dónde están ubicados?', 'Si'),
('marta','carlos', '2024-08-22 15:20:00', 'Nos ubicamos 75 mestros este de la clinica de 
San Rafael de Heredia', 'No');

/* Se insertan 3 negocios */
INSERT INTO NegociosDB.negocios (usuario_Dueno, ruta_Foto, nombre, actividad, 
fecha_Fundacion, telefono, direccion, pagina_Web, envios, facebook, instagram, 
youtube, google_Maps) VALUES 
('marta', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.lasexta.com%2
Fviajestic%2Fcurioso%2Fconocida-pasteleria-madrid-mas-famosas-mundo_202203086
2272115e2af800001e44306.html&psig=AOvVaw09RczY4Z9spm-IYjVkmHBE&ust=1724621335
523000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCIjJtKTJjogDFQAAAAA
dAAAAABAE', 'Pastelería Dulce Sazón', 'Creación de asteles, repostería 
y otros productos deliciosos', '2024-01-15', '2422-3333', 'Heredia, Barva', 
'www.facebook.com', 'Si', 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 
'www.googlemaps.com'),
('marta', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fweezevent.com%2Fes%2Fbl
og%2Forganizar-fiesta%2F&psig=AOvVaw30uIPFDeJURYpwJd6DnOFS&ust=1724621384342000&sour
ce=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCOjW47nJjogDFQAAAAAdAAAAABAE', 'Marta 
Fiestas', 'Organización y ejecución de fiestas de cumpleaños, 
aniversarios, graduaciones y más', '2024-06-06', '2433-2222', 'San José, Tibás', 
'www.facebook.com', 'Si', 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 
'www.googlemaps.com'),
('carlos', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.elsoldesanluis.com.
mx%2Flocal%2Fcrece-demanda-de-calzado-urbano-en-las-zapaterias-a-raiz-de-la-pandemia-
7439383.html&psig=AOvVaw0vMOmU51UJhtYnD3Aogn9v&ust=1724621430942000&source=images&cd=
vfe&opi=89978449&ved=0CBQQjRxqFwoTCKCGl9DJjogDFQAAAAAdAAAAABAE', 'Tennis de Heredia',
 'Venta de tennis originales al mejor precio 
y calidad', '2024-05-23', '8435-5869', 'Alajuela centro', 'www.facebook.com', 'Si', 
'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'www.googlemaps.com');

/* Se insertan 6 productos */
INSERT INTO NegociosDB.productos (cod_Negocio, foto, nombre, descripcion, precio) VALUES 
('1', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fsacher.com.
mx%2Fblog%2Fpost%2Fpastel%2520de%2520chocolate%2520y%2520naranja&psig=AOvVaw3sIsY_
uwE0wWh0K7z02zla&ust=1724618416248000&source=images&cd=vfe&opi=89978449&ved=0CBQQj
RxqFwoTCOjK4rK-jogDFQAAAAAdAAAAABAI', 'Pastel de Chocolate y Naranja', 'Delicioso 
pastel artesanal, con naranja natural y chocolate', 15000),
('1', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffoodandpleasure.
com%2Fmaria-fortunata-pasteles-cumpleanos%2F&psig=AOvVaw3sIsY_uwE0wWh0K7z
02zla&ust=1724618416248000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRx
qFwoTCOjK4rK-jogDFQAAAAAdAAAAABAQ', 'Pastel de cumpleaños (vainilla)', 'Pastel con 
decoración de cumpleaños, grande', 20000),
('2', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fokdiario.com%2Fhowto%2
Fcomo-decorar-fiesta-cumpleanos-adultos-3132484&psig=AOvVaw0H4YoHKktMkG3TMb_v_q
Y1&ust=1724618673370000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLC
h666_jogDFQAAAAAdAAAAABAE', 'Organización de fiesta de cumpleaños', 'Incluye la 
organización y la planificación, la decoración, la comida y actividades. Para 10 
personas máximo', 100000),
('2', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fahaslides.com%2Fes%2Fbl
og%2Fgraduation-party-ideas%2F&psig=AOvVaw2LNEBu9D3qbLlNAUMfFUht&ust=17246187977
13000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLC6hem_jogDFQAAAAAdAAA
AABAQ', 'Organización de fiesta de Graduación', 'Incluye la organización y la 
planificación, la decoración, la comida y actividades. Para 10 personas máximo', 100000),
('3', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Felcaminantecr.com%2Fti
enda%2Finicio%2F2588-150355-tenis-nike-tanjun.html&psig=AOvVaw16mDrbv59YtfVbb4V
17JnD&ust=1724618873694000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTC
MjliIzAjogDFQAAAAAdAAAAABAQ', 'Tenis Nike Tanjun', 'Variedad de tallas. 100% 
Originales', 50000),
('3', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.unimart.com%2Fpr
oducts%2Fpuma-tenis-deportivos-graviton-wns-negro-gris-rosa-para-mujer&psig=A
OvVaw2V8R6M_xhcdNEBbSHuImgI&ust=1724618955731000&source=images&cd=vfe&opi=899
78449&ved=0CBQQjRxqFwoTCJi_orPAjogDFQAAAAAdAAAAABAE', 'Tenis Puma Graviton 
WNS Negro/Gris/Rosa, para Mujer', 'Variedad de tallas. 100% Originales', 60000);

/* Se insertan 3 me_gusta */
INSERT INTO NegociosDB.me_gusta (cod_Usuario, cod_Producto, fecha_Hora) VALUES 
('carlos', '1', '2024-08-22 15:20:00'),
('carlos', '2', '2024-08-22 15:20:00'),
('marta', '3', '2024-08-22 15:20:00');

/* Se insertanrecursos */
INSERT INTO NegociosDB.recursos (titulo, autor, contenido, fecha_Publicacion, tipo_recurso) VALUES 

/*Ingreso de artículos*/
('Cualidades que necesitas para ser un buen emprendedor', 'Observatorio Laboral', 
'Sin importar cuál sea tu idea de negocio, hay cualidades que son básicas entre las personas que deciden emprender. En el OLA, te recomendamos contar con estas 10 cualidades para que tu negocio sea un éxito:

1. Creatividad e ingenio
El primer paso para emprender es tener una idea, ya que a partir de ésta es donde surgen proyectos nuevos y se puede revolucionar el mercado o sector.

2. Pasión
Bien dicen que cuando amas lo que haces, el éxito llega solo. Y para emprender, se necesita tener motivación. La única manera de enfrentar y lidiar con las dificultades que surjan en el camino, es amando lo que haces.

3. Visión
Visualiza tu negocio y cúmplelo. No basta con tener ideas o sueños, es importante buscar los medios para llevarlos a cabo. Recuerda que, si tú no lo haces, nadie lo hará por ti.

4. Liderazgo
Ya tienes el proyecto, ahora ¡toma las riendas! Debes aprender a detectar las oportunidades y aprovecharlas en el momento justo. Todo líder influye en su equipo para tomar decisiones, pero también los guía.

5. Paciencia
Un buen negocio no nace de la noche a la mañana y, muchas veces, deberás trabajar a prueba y error. Enfrentar las adversidades e intentarlo una y otra vez, será vital para llegar a la cima.

6. Confianza en ti
Nadie confiará en tu negocio si tú no lo haces. Las demás personas deben verte seguro de ti mismo. Si dudas en algún momento, eso se reflejará en el entorno y podría repercutir en tu proyecto.

7. Responsabilidad
Cualquier negocio, por pequeño que sea, debe tomarse con seriedad. Involúcrate en todas las actividades y asume responsabilidades tanto con tu equipo, como con los clientes, socios o proveedores.

8. Receptivo
Todos los días se aprende algo y en tu camino hacia el éxito, debes estar abierto para aprender todo lo que puedas y a recibir críticas constructivas para mejorar.

9. Empatía
Ponerte en el lugar de los otros para entender sus necesidades te ayudará a crear vínculos con las personas. Si eres empático, serás capaz de conectarte con tus clientes.

10. Decisión
Todos los proyectos de emprendimiento, tarde o temprano, llegan a una de las tareas más importantes: tomar decisiones. Si analizas las ventajas y desventajas de una situación, siendo lo más objetivo posible, las decisiones que tomes serán acertadas.

No te preocupes si aún no cuentas con alguna de estas habilidades, puedes irlas desarrollando poco a poco, tú mismo, o con un algún curso o taller.

Y recuerda…

Para emprender, es necesario tomar riesgos. Acércate con los expertos y aprende de ellos. Existen instituciones que brindan financiamiento para impulsar a jóvenes emprendedores.

Ten la mente abierta, hay mucha competencia en el mercado. Así que, mantente actualizado. Nada es lo que parece. Hasta que no lo intentes, no sabrás si algo puede funcionar.

Los mejores emprendedores son aquellos que comienzan con negocios reales y que no desisten jamás en el intento. Si tienes una idea, ¡hazla realidad!', '2024-08-22','articulo'),

('10 Aspectos a tomar en cuenta al iniciar un emprendimiento o negocio', 'Luis Alvarez', 
'Son muchas las recomendaciones que escucharás de amigos o familiares, al momento de contarles que quieres iniciar un emprendimiento o negocio. Es bueno poner en práctica estos consejos, siempre y cuando vengan de una fuente que tenga experiencia en el tema y no sólo te hable desde el amor o cariño; sabemos que todos quieren que tengas éxito, pero no todos saben o conocen cuáles serán esas herramientas que te conducirán hasta él.

Todo emprendimiento lleva consigo sueños, trabajo, constancia y determinación. Lo mismo en el caso de un negocio, cuando tomamos la decisión y finalmente decimos “Si, iniciaré mi negocio”, hay una carga alta de responsabilidades que trae consigo.

Pero, ¿será lo mismo un emprendimiento que un negocio? Generalmente para tener un negocio, todos empezamos creando proyectos que nos apasionan y al darnos cuenta que dan resultados, podemos ejecutarlo formalmente en un plano legal. Por lo que el emprendimiento sería un primer paso y el negocio, ya sería la consolidación del mismo; pero hay ciertas recomendaciones que en ambos casos aplicarían:

Asegúrate de ofrecer algo diferente
No seas uno más del montón, no te conformes con el hecho de saber que como hay un área o producto determinado que genera dinero, tú también trabajaras en eso.

Ejecuta esa locura que tienes en mente, que quizás aún no te atreves a realizar. Claro, determina que tan rentable puede ser, evalúa todos los aspectos, si es posible realiza una pequeña encuesta para conocer la opinión de la gente.

Estudia el Mercado
Si aún no tienes nada en mente, pero necesitas iniciar un negocio; estudia el mercado, reconoce las necesidades del sector donde piensas desarrollar tu proyecto.

Si es un negocio, identifica si hay ausencia de restaurants, de panaderías, de tiendas de ropa, dulcerías o espacios de recreación. Si encuentras que realmente se necesita alguno de los mencionados, ponle tu toque, se recreativo y encargarte de que deseen visitarte.

Si se trata de un emprendimiento, identifica quienes más están pensando igual que tú, qué puedes hacer para diferenciarte y que haría que se inclinen más a ti, a seguir apostando por lo seguro.

Reúne un buen equipo humano
Encargarte de que quienes trabajan a tu lado, sean profesionales o estén capacitados realmente para el cargo que vayan a asumir dentro del proyecto.

Todos los espacios deben ser manejados de la mejor forma. De eso dependerá también tu éxito.

Sé constante
La constancia es un valor que determinará los triunfos y fracasos en nuestra vida; sino estamos seguros de que seremos firmes con nuestras ideas, no podremos ejecutarlas. De nada servirá un extraordinario proyecto hoy, si mañana lo abandonarás, o empezaras a desplazarlo por otra cosa.

Delega funciones
El empresario y filántropo estadounidense, Andrew Carnegie, dijo en un momento: “No serás un gran líder si quieres hacer todo por ti mismo o sólo obtener el crédito de ello”.

Si tu deseo es triunfar, debes delegar responsabilidades a personas que están en la capacidad de asumirla. No es asumir por asumir, si tú no eres contador, busca a uno excelente, si quieres montar una pastelería pero no eres pastelero, por más que quieras hacer todo por ti mismo, debes aceptar que apoyándote en otra personas, conseguirás lo deseado, sino eres el mejor orador, busca a una persona que se encargue de dar a conocer tu producto o servicio.

En el caso de emprendimientos, sucede mucho que al no contar con una capital, se quiere asumir todas las áreas por sí mismo; al inicio eso no está mal, pero podrías buscar asesoramiento con especialistas que manejen la información que tú no.

Reconoce las necesidades de tus clientes
Ignorar las recomendaciones y solicitudes de tus clientes, es un gran error. Al momento que encuentren alguien que les ofrezca lo anhelado, cambiarán.

Se lo suficientemente abierto para detectar que debes hacer cambios, no porque esté mal, sino porque debes mejorar. Todos los días hay cosas diferentes, todos los días pensamos diferente ¿verdad?, pues no podemos pretender que nuestros clientes acepten lo mismo todos los días, puede que al inicio les agrade, pero a la larga, se irán.

Apóyate en los Medios Sociales
Es un error de muchos iniciar un proyecto y no hacer publicidad. “Publicidad es obtener ganancias a corto, mediano y largo plazo”.

Si tienes la capital para arrancar tu negocio, invierte en publicidad, date a conocer, muestra lo que estás haciendo. Los medios sociales tienen amplias herramientas que te permitirán llegar mejor y a más personas.

Facebook, Instagram, Youtube o una página web, pueden ser de ayuda. Identifica el target de tu público y edades, según eso crea una estrategia que pueda ser efectiva a la hora de iniciar por estos medios.

Si desconoces el tema, recaemos en el punto número 6, delega funciones a alguien que si maneje el área.

Define en donde estará el 100% de tu atención
Hay personas que por naturaleza son creativas, a diario se plantean muchísimos proyectos. Pero hay un problema con esto, debemos jerarquizar cuál será al que dediques tu atención, porque si a varios proyectos le dedicas el 25% de ti, no serán exitosos.

Esté al día legalmente
Cumple con los procedimientos tributarios, declara los respectivos impuestos, sé transparente.

Si eres emprendedor, recuerda que debes registrarte en el RUC (Registro único de Contribuyentes), para obtener un número de identificación que te permitirá tramitar tus facturas y así responder ante tus clientes como se debe; de seguro te solicitarán una factura y tú irás un paso adelante prestando un excelente servicio.

Si eres artesano, pintor, carpintero o quieres independizarte en tu profesión, tienes la obligación de registrarte para cumplir ante las leyes y lo estipulado por el SRI (Servicio de Rentas Internas).

Capacítese, haga Networking
Uno de los peores errores en la vida es creer que lo sabemos todo. Siempre hay cosas nuevas por aprender y más cuando queremos seguir creciendo no sólo personal sino profesionalmente.

Acuda a cursos, talleres, conferencias, estudie lo relacionado a su proyecto; crear una red de contactos profesionales de personas que estén en la misma área o interesado en lo que haces. Nunca está demás escuchar a los especialistas y aplicar algunas técnicas en nuestro negocio o emprendimiento; el limitarse será letal; irá quedando en el pasado.

Si hay una recomendación que es genérica, es que debe capacitarse. Sólo así usted adquirirá ideas para innovar, reconocerá que debe delegar, le afirmarán que la constancia es base del éxito, que al estar legal no corre ningún riesgo y que al dedicarse 100% a su proyecto, sabrá identificar qué cosas están bien y que debe mejorar.', '2024-08-22','articulo'),

/*Ingreso de videos*/
('Emprendimiento y Emprendedor. Conceptualización Teórica','Universitat Politècnica de València UPV','https://www.youtube.com/embed/t2eMk9wzDLI?si=fOKcpwtMPrNJk-6Y','2017-10-23','video'),
('5 Pasos para Pasar de Idea de Negocio a Empresa Exitosa','Emprende Aprendiendo','https://www.youtube.com/embed/E6PhOEOFl6g?si=aAkqmZjCyoM5MiTX','2020-01-10','video'),

/*Ingreso de FAQs*/
('¿Cómo puedo registrarme en la Red Social de Emprendedores?', NULL ,'Para registrarte, ve a la página principal y haz clic en el botón "Registrarse". Completa el formulario con tu nombre, dirección de correo electrónico y contraseña. Luego, confirma tu registro a través del enlace que recibirás en tu correo electrónico.','2024-08-20','FAQ'),
('¿Cómo puedo recuperar mi contraseña si la olvidé?',NULL,'Si olvidaste tu contraseña, haz clic en el enlace "¿Olvidaste tu contraseña?" en la página de inicio de sesión. Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.','2024-08-20','FAQ'),
('¿Cómo puedo actualizar la información de mi perfil?',NULL,'Para actualizar tu perfil, inicia sesión y dirígete a la página de "Mi Perfil". Allí puedes cambiar tu foto de perfil, nombre, y otros detalles. No olvides guardar los cambios al final.','2024-08-20','FAQ'),
('¿Puedo eliminar mi cuenta?',NULL,'Sí, puedes eliminar tu cuenta en cualquier momento. Ve a "Contactar a Soporte" y solicita la eliminación de tu cuenta. Ten en cuenta que esta acción es irreversible y todos tus datos serán eliminados permanentemente.','2024-08-20','FAQ'),
('¿Cómo puedo enviar mensajes a otros emprendedores?',NULL,'Puedes enviar mensajes privados a otros usuarios haciendo clic en su perfil y seleccionando la opción "Enviar mensaje". También puedes acceder a tu bandeja de entrada desde el icono de mensajes en la barra de navegación.','2024-08-20','FAQ'),
('¿Cómo puedo reportar un contenido inapropiado o un usuario?',NULL,'Si encuentras contenido inapropiado o deseas reportar a un usuario, Ve a "Contactar a Soporte" y solicita la revisión del contenido. Nuestro equipo de soporte revisará el reporte y tomará las medidas necesarias.','2024-08-20','FAQ'),
('¿Cómo puedo encontrar artículos y recursos útiles para mi negocio?',NULL,'Visita la sección "Recursos y Herramientas" en el menú de navegación. Aquí encontrarás artículos, videos, y otros recursos útiles para emprendedores. ','2024-08-20','FAQ'),

/*Ingreso de Términos y condiciones*/
('1. Uso del Sitio Web',NULL,'El contenido de las páginas de este sitio web es para tu información general y uso exclusivo. Está sujeto a cambios sin previo aviso.','2024-08-20','Terminos'),
('2. Licencia de Uso',NULL,'Se te concede una licencia limitada para acceder y hacer uso personal de este sitio y no para descargarlo (excepto el almacenamiento en caché) o modificarlo, o cualquier porción del mismo, excepto con el consentimiento expreso por escrito de nosotros.','2024-08-20','Terminos'),
('3. Privacidad',NULL,'Tu uso de este sitio web está sujeto a nuestra política de privacidad, que también rige el sitio y nos informa sobre nuestras prácticas de recopilación de datos. Al usar nuestro sitio, también aceptas la forma en que procesamos tus datos personales, conforme a nuestra política de privacidad.','2024-08-20','Terminos'),
('4. Prohibiciones',NULL,'No debes usar este sitio web de ninguna manera que cause, o pueda causar, daño al sitio web o deterioro de la disponibilidad o accesibilidad del sitio web; o de cualquier manera que sea ilegal, fraudulenta o perjudicial, o en conexión con cualquier propósito o actividad ilegal, fraudulenta o perjudicial.','2024-08-20','Terminos'),
('5. Cambios en los Términos',NULL,'Nos reservamos el derecho de realizar cambios en nuestro sitio, políticas y estos términos y condiciones en cualquier momento. Tu uso continuo del sitio web después de cualquier cambio constituirá tu aceptación de dichos cambios.','2024-08-20','Terminos'),
('6. Ley Aplicable',NULL,'Estos términos y condiciones se rigen y se interpretan de acuerdo con las leyes de Costa Rica, y cualquier disputa relacionada con estos términos y condiciones estará sujeta a la jurisdicción exclusiva de los tribunales de Costa Rica.','2024-08-20','Terminos'),

/*Ingreso de Privacidad*/
('Política de Privacidad',NULL,'<h2>1. Información que Recopilamos</h2>
        <p>Podemos recopilar la siguiente información:</p>
        <ul>
            <li>Nombre y apellido</li>
            <li>Información de contacto, incluyendo dirección de correo electrónico</li>
            <li>Información demográfica, como código postal, preferencias e intereses</li>
            <li>Otra información relevante para encuestas y/o ofertas de clientes</li>
        </ul>

        <h2>2. Uso de la Información</h2>
        <p>Utilizamos esta información para entender tus necesidades y ofrecerte un mejor servicio, y en particular por las siguientes razones:</p>
        <ul>
            <li>Mantenimiento de registros internos.</li>
            <li>Mejorar nuestros productos y servicios.</li>
            <li>Enviar correos electrónicos promocionales sobre nuevos productos, ofertas especiales u otra información que pensamos que puede ser de tu interés.</li>
            <li>Personalizar el sitio web según tus intereses.</li>
        </ul>

        <h2>3. Seguridad</h2>
        <p>Estamos comprometidos a garantizar que tu información esté segura. Para prevenir el acceso no autorizado o divulgación, hemos implementado procedimientos físicos, electrónicos y administrativos para salvaguardar y asegurar la información que recopilamos en línea.</p>

        <h2>4. Cómo Usamos las Cookies</h2>
        <p>Una cookie es un pequeño archivo que pide permiso para ser colocado en el disco duro de tu computadora. Una vez que aceptas, el archivo se agrega y la cookie ayuda a analizar el tráfico web o te permite saber cuándo visitas un sitio en particular.</p>

        <h2>5. Enlaces a Otros Sitios Web</h2>
        <p>Nuestro sitio web puede contener enlaces a otros sitios de interés. Sin embargo, una vez que hayas usado estos enlaces para salir de nuestro sitio, debes tener en cuenta que no tenemos control sobre ese otro sitio web. Por lo tanto, no podemos ser responsables de la protección y privacidad de cualquier información que proporciones mientras visitas dichos sitios y dichos sitios no se rigen por esta política de privacidad.</p>

        <h2>6. Control de tu Información Personal</h2>
        <p>Puedes optar por restringir la recopilación o el uso de tu información personal de las siguientes maneras:</p>
        <ul>
            <li>Siempre que se te pida que rellenes un formulario en el sitio web, busca la casilla en la que puedes hacer clic para indicar que no deseas que la información sea utilizada por nadie con fines de marketing directo.</li>
            <li>Si has aceptado previamente que usemos tu información personal con fines de marketing directo, puedes cambiar de opinión en cualquier momento escribiéndonos o enviándonos un correo electrónico a [dirección de correo electrónico de soporte].</li>
        </ul>

        <p>No venderemos, distribuiremos ni cederemos tu información personal a terceros a menos que tengamos tu permiso o estemos obligados por ley a hacerlo.</p>','2024-08-20','Privacidad');
