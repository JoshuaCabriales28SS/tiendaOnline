use db_tiendaonline_crud;

DELETE FROM productos where id >0;
ALTER TABLE productos AUTO_INCREMENT = 1;

DELETE FROM categorias where id>0;
ALTER TABLE categorias AUTO_INCREMENT = 1;

INSERT INTO categorias (id, nombre) VALUES (1, 'Electronica');
INSERT INTO categorias (id, nombre) VALUES (2, 'Ropa');
INSERT INTO categorias (id, nombre) VALUES (3, 'Hogar');
INSERT INTO categorias (id, nombre) VALUES (4, 'Deportes');
INSERT INTO categorias (id, nombre) VALUES (5, 'Juguetes');
INSERT INTO categorias (id, nombre) VALUES (6, 'Libros');
INSERT INTO categorias (id, nombre) VALUES (7, 'Belleza');
INSERT INTO categorias (id, nombre) VALUES (8, 'Automotriz');
INSERT INTO categorias (id, nombre) VALUES (9, 'Tecnología');
INSERT INTO categorias (id, nombre) VALUES (10, 'Accesorios');
INSERT INTO categorias (id, nombre) VALUES (11, 'Salud');
INSERT INTO categorias (id, nombre) VALUES (12, 'Alimentos');

INSERT INTO productos VALUES 
(1,'Laptop HP',14500.00,'laptop.jpg','Laptop portátil ideal para trabajo y estudio, cuenta con 8GB de RAM, almacenamiento rápido y diseño ligero que permite transportarla fácilmente a cualquier lugar sin complicaciones','1234567890',1,10),

(2,'Mouse Logitech',350.00,'mouse.jpg','Mouse inalámbrico ergonómico con conexión USB, alta precisión para tareas de oficina o gaming casual, batería de larga duración y diseño cómodo para uso prolongado','1234567891',9,25),

(3,'Teclado Mecánico',1200.00,'teclado.jpg','Teclado mecánico con iluminación RGB personalizable, ideal para gamers y programadores, ofrece respuesta rápida, durabilidad y una experiencia de escritura cómoda y eficiente','1234567892',9,15),

(4,'Monitor 24"',3200.00,'monitor.jpg','Monitor de 24 pulgadas con resolución Full HD, colores nítidos y buen ángulo de visión, perfecto para trabajar, estudiar o disfrutar contenido multimedia con excelente calidad visual','1234567893',1,8),

(5,'Playera Nike',500.00,'playera.jpg','Playera de algodón suave y transpirable, ideal para uso diario o actividades deportivas, diseño moderno que combina comodidad, resistencia y estilo para cualquier ocasión casual','1234567894',2,50),

(6,'Pantalón Jeans',800.00,'jeans.jpg','Pantalón de mezclilla resistente con corte moderno, cómodo para uso diario, combina fácilmente con diferentes estilos y ofrece durabilidad para actividades cotidianas y salidas informales','1234567895',2,40),

(7,'Sofá 3 plazas',8500.00,'sofa.jpg','Sofá amplio y cómodo para sala, con espacio para tres personas, tapizado resistente y diseño elegante que se adapta a diferentes estilos de decoración en el hogar','1234567896',3,5),

(8,'Lámpara LED',450.00,'lampara.jpg','Lámpara LED de bajo consumo energético, ideal para iluminar habitaciones o espacios de trabajo, proporciona luz uniforme y agradable, además de tener una larga vida útil','1234567897',3,20),

(9,'Balón fútbol',300.00,'balon.jpg','Balón de fútbol resistente para uso en canchas exteriores e interiores, diseño profesional que ofrece buen control, durabilidad y excelente rendimiento durante partidos o entrenamientos','1234567898',4,30),

(10,'Raqueta tenis',1200.00,'raqueta.jpg','Raqueta de tenis ligera y resistente, ideal para jugadores principiantes o intermedios, proporciona buen control y potencia en cada golpe, mejorando el rendimiento en la cancha','1234567899',4,12),

(11,'Muñeca Barbie',600.00,'barbie.jpg','Muñeca clásica con accesorios incluidos, ideal para niñas, fomenta la creatividad y el juego imaginativo, fabricada con materiales seguros y duraderos para un uso prolongado','1234567800',5,18),

(12,'LEGO Set',1500.00,'lego.jpg','Set de construcción con múltiples piezas, permite crear diferentes estructuras, fomenta la creatividad y habilidades motoras en niños y adultos, ideal para entretenimiento educativo','1234567801',5,10),

(13,'Libro Java',400.00,'libro.jpg','Libro completo para aprender programación en Java desde nivel básico hasta avanzado, incluye ejemplos prácticos, ejercicios y conceptos clave para desarrollar aplicaciones modernas','1234567802',6,22),

(14,'Libro SQL',350.00,'sql.jpg','Guía práctica para aprender bases de datos con SQL, incluye consultas, ejemplos reales y ejercicios que ayudan a comprender cómo manejar información en sistemas modernos','1234567803',6,18),

(15,'Perfume Dior',2500.00,'perfume.jpg','Perfume de alta calidad con fragancia elegante y duradera, ideal para ocasiones especiales, su aroma combina notas frescas y sofisticadas que destacan la personalidad','1234567804',7,7),

(16,'Crema Facial',300.00,'crema.jpg','Crema hidratante para el cuidado de la piel, ayuda a mantener el rostro suave, nutrido y protegido contra factores externos como el clima o la contaminación','1234567805',7,25),

(17,'Aceite Motor',900.00,'aceite.jpg','Aceite sintético de alto rendimiento para motores, ayuda a reducir el desgaste, mejorar el funcionamiento del vehículo y prolongar la vida útil del motor','1234567806',8,14),

(18,'Batería Auto',2200.00,'bateria.jpg','Batería para automóvil de 12V con excelente rendimiento, arranque confiable y larga duración, diseñada para soportar condiciones exigentes y ofrecer seguridad al conducir','1234567807',8,6),

(19,'Tablet Samsung',6500.00,'tablet.jpg','Tablet con sistema Android, pantalla de alta resolución y buen rendimiento, ideal para entretenimiento, estudio o trabajo ligero, fácil de transportar y usar en cualquier lugar','1234567808',9,9),

(20,'Smartwatch',1800.00,'watch.jpg','Reloj inteligente con conexión Bluetooth, monitoreo de actividad física y notificaciones, ideal para personas activas que buscan controlar su salud y mantenerse conectadas','1234567809',9,13),

(21,'Gorra Adidas',350.00,'gorra.jpg','Gorra deportiva con diseño moderno, fabricada con materiales ligeros y resistentes, ideal para protegerse del sol durante actividades al aire libre o uso casual','1234567810',10,30),

(22,'Lentes Sol',600.00,'lentes.jpg','Lentes de sol con protección UV, diseño elegante y cómodo, ideales para cuidar la vista mientras se mantiene un estilo moderno en cualquier ocasión','1234567811',10,20),

(23,'Termómetro',200.00,'termometro.jpg','Termómetro digital preciso y fácil de usar, permite medir la temperatura corporal rápidamente, ideal para uso en el hogar o cuidado de la salud diaria','1234567812',11,40),

(24,'Vitaminas C',150.00,'vitaminas.jpg','Suplemento de vitamina C que ayuda a fortalecer el sistema inmunológico, ideal para mantener la salud y prevenir enfermedades, fácil de consumir diariamente','1234567813',11,50),

(25,'Cereal',120.00,'cereal.jpg','Cereal nutritivo ideal para el desayuno, aporta energía y vitaminas, perfecto para comenzar el día de forma saludable con un sabor delicioso y agradable','1234567814',12,60),

(26,'Chocolate',80.00,'chocolate.jpg','Chocolate dulce de excelente sabor, ideal como snack o postre, elaborado con ingredientes de calidad que brindan una experiencia deliciosa en cada bocado','1234567815',12,70),

(27,'Audífonos Sony',900.00,'audifonos.jpg','Audífonos inalámbricos con excelente calidad de sonido, cómodos para uso prolongado, ideales para escuchar música, trabajar o estudiar sin interrupciones','1234567816',1,16),

(28,'Cargador USB',200.00,'cargador.jpg','Cargador USB de carga rápida compatible con múltiples dispositivos, compacto y fácil de transportar, ideal para uso diario en casa, oficina o viajes','1234567817',9,35),

(29,'Zapatos Running',1200.00,'zapatos.jpg','Zapatos deportivos diseñados para correr, ofrecen comodidad, amortiguación y soporte adecuado para mejorar el rendimiento y reducir el impacto al correr','1234567818',4,22),

(30,'Bicicleta',5500.00,'bici.jpg','Bicicleta de montaña resistente, ideal para recorridos urbanos o terrenos irregulares, cuenta con estructura sólida y componentes duraderos para una mejor experiencia','1234567819',4,5),

(31,'Silla Oficina',1800.00,'silla.jpg','Silla ergonómica para oficina, diseñada para brindar comodidad durante largas jornadas, con ajuste de altura y soporte lumbar para cuidar la postura','1234567820',3,12),

(32,'Mesa Madera',2500.00,'mesa.jpg','Mesa de madera resistente y elegante, ideal para comedor o sala, combina diseño moderno con funcionalidad y durabilidad para el hogar','1234567821',3,8),

(33,'Cámara Canon',8500.00,'camara.jpg','Cámara digital con alta calidad de imagen, ideal para fotografía profesional o amateur, permite capturar momentos con gran detalle y precisión','1234567822',1,6),

(34,'Tripié',600.00,'tripie.jpg','Tripié ajustable y ligero, ideal para cámaras o celulares, proporciona estabilidad en fotografías y videos, fácil de transportar y utilizar','1234567823',1,15),

(35,'Sudadera Puma',900.00,'sudadera.jpg','Sudadera cómoda y cálida, ideal para climas fríos, con diseño moderno que combina estilo y funcionalidad para uso diario o deportivo','1234567824',2,20),

(36,'Calcetines',150.00,'calcetines.jpg','Pack de calcetines suaves y resistentes, ideales para uso diario, brindan comodidad, transpirabilidad y ajuste adecuado durante todo el día','1234567825',2,50),

(37,'Rompecabezas',300.00,'rompecabezas.jpg','Rompecabezas de 1000 piezas ideal para entretenimiento familiar, ayuda a desarrollar habilidades cognitivas, concentración y paciencia en niños y adultos','1234567826',5,25),

(38,'Libro Python',500.00,'python.jpg','Libro avanzado de programación en Python, incluye proyectos prácticos, ejemplos y ejercicios que ayudan a mejorar habilidades de desarrollo de software','1234567827',6,10),

(39,'Shampoo',120.00,'shampoo.jpg','Shampoo para cuidado del cabello, limpia profundamente mientras mantiene la hidratación, ideal para uso diario y todo tipo de cabello','1234567828',7,40),

(40,'Filtro Aire',400.00,'filtro.jpg','Filtro de aire para automóvil, mejora el rendimiento del motor y la calidad del aire, fácil de instalar y con alta durabilidad','1234567829',8,18),

(41,'Laptop Dell',16000.00,'dell.jpg','Laptop potente con 16GB de RAM, ideal para tareas exigentes como programación, diseño o multitarea, ofrece gran rendimiento y velocidad','1234567830',1,7),

(42,'Tablet Lenovo',5000.00,'lenovo.jpg','Tablet ligera con pantalla amplia, ideal para entretenimiento, lectura o trabajo básico, fácil de transportar y usar en cualquier momento','1234567831',9,11),

(43,'Pulsera',200.00,'pulsera.jpg','Pulsera elegante y moderna, ideal como accesorio de moda, combina con diferentes estilos y ocasiones, fabricada con materiales de calidad','1234567832',10,45),

(44,'Gel antibacterial',90.00,'gel.jpg','Gel antibacterial que ayuda a eliminar bacterias y mantener las manos limpias, ideal para uso diario en cualquier lugar y momento','1234567833',11,80),

(45,'Galletas',60.00,'galletas.jpg','Galletas dulces y crujientes, ideales como snack o acompañamiento, elaboradas con ingredientes de calidad que ofrecen un sabor delicioso','1234567834',12,90),

(46,'Café',150.00,'cafe.jpg','Café molido de excelente aroma y sabor, ideal para comenzar el día con energía, preparado con granos seleccionados de alta calidad','1234567835',12,55),

(47,'Bocina Bluetooth',700.00,'bocina.jpg','Bocina portátil con conexión Bluetooth, sonido claro y potente, ideal para reuniones, viajes o uso diario con gran facilidad de conexión','1234567836',1,14),

(48,'Router WiFi',1200.00,'router.jpg','Router de alta velocidad que proporciona conexión estable a internet, ideal para hogares u oficinas con múltiples dispositivos conectados','1234567837',9,9),

(49,'Guantes Gym',250.00,'guantes.jpg','Guantes deportivos para gimnasio, ofrecen mejor agarre y protección durante el entrenamiento, ideales para levantamiento de pesas y ejercicios intensos','1234567838',4,30),

(50,'Cinta Métrica',100.00,'cinta.jpg','Cinta métrica resistente y precisa, ideal para mediciones en hogar o trabajo, fácil de usar y transportar en cualquier momento','1234567839',3,40);
