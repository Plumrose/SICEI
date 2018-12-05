DROP TABLE m_almacenes;

CREATE TABLE `m_almacenes` (
  `COD_ALM` varchar(3) NOT NULL,
  `DESC_ALM` varchar(20) NOT NULL,
  `UBI_ALM` varchar(20) NOT NULL,
  `ESTATUS` varchar(2) NOT NULL,
  UNIQUE KEY `codigo_almacen` (`COD_ALM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_almacenes VALUES("002","Almacén Caracas","Caracas","1");
INSERT INTO m_almacenes VALUES("001","Almacén Planta Cagua","Cagua ","1");



DROP TABLE m_analistas_cts;

CREATE TABLE `m_analistas_cts` (
  `COD_CTS` varchar(10) NOT NULL,
  `NOM_CTS` varchar(35) NOT NULL,
  `STATUS_CTS` varchar(2) NOT NULL,
  UNIQUE KEY `codigo_cts` (`COD_CTS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_analistas_cts VALUES("2","Pedro Jimenes","1");
INSERT INTO m_analistas_cts VALUES("1","Jose Manual Martines","1");
INSERT INTO m_analistas_cts VALUES("3","José Marquez","1");
INSERT INTO m_analistas_cts VALUES("4","Alvaro Ascanio","1");



DROP TABLE m_asigna_roles;

CREATE TABLE `m_asigna_roles` (
  `COD_OPCION` varchar(13) NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `FEC_VALIDO` date NOT NULL,
  PRIMARY KEY (`COD_OPCION`,`COD_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_asigna_roles VALUES("SICEI_PAG_003","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_026","MFREY","2013-09-12");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_008","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_009","MFREY","2013-09-19");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_010","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_011","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_012","MFREY","2013-09-22");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_013","MFREY","2013-09-22");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_014","MFREY","2013-09-22");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_015","MFREY","2013-09-22");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_007","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_006","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_016","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_005","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_004","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_018","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_001","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_029","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_002","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_017","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_003","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_004","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_005","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_006","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_007","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_008","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_009","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_010","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_011","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_012","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_013","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_014","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_015","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_016","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_018","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_017","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_019","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_020","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_021","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_022","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_001","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_002","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_026","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_029","YABREU","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_022","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_030","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_023","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_024","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_024","yabreu","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_031","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_019","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_020","MFREY","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_021","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_033","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_034","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_036","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_037","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_038","mfrey","0000-00-00");
INSERT INTO m_asigna_roles VALUES("SICEI_PAG_039","mfrey","0000-00-00");



DROP TABLE m_ayuda_sicei;

CREATE TABLE `m_ayuda_sicei` (
  `COD_OPCION` varchar(13) NOT NULL,
  `DETALLE` longtext NOT NULL,
  UNIQUE KEY `cod_opcion` (`COD_OPCION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_ayuda_sicei VALUES("SICEI_PAG_001","Gestión de Solicitudes\nEn este módulo es donde el Analista CTS se encarga de manejar todas las solicitudes de los equipos de computación. \n\nEn primer lugar en este módulo encontramos la Apertura de Solicitud el cual está diseñado para que se registre la solicitud de los equipos informáticos.\n\n\n\n\nGestión de Solicitudes\nEn este módulo es donde el Analista CTS se encarga de manejar todas las solicitudes de los equipos de computación. \n\nEn primer lugar en este módulo encontramos la Apertura de Solicitud el cual está diseñado para que se registre la solicitud de los equipos informáticos.\n\n\n\n\nAl momento de recibir la solicitud el analista CTS registra la nueva solicitud presionando en primer lugar el botón Nuevo y procede a llenar todos los campos, es importante señalar que los campos como Tipo de Solicitud, Solicitante y Analista CTS cuenta con una ayuda de búsqueda en donde le permite seleccionar de manera dinámica la información contenida para esos campos.\n\n\nUna vez llenado todos los campos solicitados se procede a guardar los datos en la base de datos, si se desea consultar la información se debe posicionar el cursor en el campo Número de Solicitud y colocar el número y darle al botón Buscar y aparecerá toda la información referente a la solicitud.\n\nAl realizar el proceso de registro se cuenta con un botón de componentes que permite seleccionar los componentes de los equipos a registrar para la solicitud.\n\n\nSi se quiere filtrar la información por Número de Solicitud, Fecha, Código Analista CTS, Código Solicitante, Descripción se coloca la información precisa en la línea en blanco y se le da al botón Buscar y muestra la información puntual que el analista solicitó.\n\n\nEn este formulario existe un botón llamado Refrescar su función es para actualizar la pantalla y permite así ejecutar otra función bien sea agregar o consultar un registro. \n\n\nCabe destacar que todos los campos se encuentran validados y cuenta con una ayuda al usuario en cada campo para que pueda conocer que debe llenar.\n\nEn segundo lugar en este módulo encontramos Confirmar Solicitud el cual está diseñado para que se confirmar la solicitud de los equipos informáticos.\n\n\n\n\n\nEste formulario se procede a buscar el número de Solicitud se coloca el Número de la solicitud y se presiona enter o se le da al botón buscar y nos mostrará la información de las solicitudes registradas con sus respectivas descripciones, seriales y cantidades. Esta pantalla cuenta con 2 botones que interactúan con el cuadro de los componentes que permite Añadir o eliminar componentes de forma dinámica. Cabe destacar que para este formulario cada vez que se le da añadir significa que se está confirmando la solicitud con esos componentes de acuerdo a la necesidad de cada usuario.\n\n\nPor otra parte, en este formulario en la parte superior existe 3 botones Buscar, Limpiar e imprimir de los cuales el buscar ya se explicó anteriormente como funciona, luego vemos que si queremos iniciar una nueva búsqueda se presiona el botón limpiar y colocará en blanco todos los campos permitiendo así realizar la nueva búsqueda y el botón imprimir genera el formato de salida del Almacén.\n\n\nEn tercer lugar en este módulo encontramos Cancelar Solicitud el cual está diseñado para que se cancelar la solicitud de los equipos informáticos.\n\nEn este formulario se procede a buscar la solicitud para cancelarla, se coloca el Número de solicitud y se le da enter o se presiona el botón buscar y aparecerá la información almacenada en el formulario.\n\n\nEs necesario acotar que cuando se presiona el botón buscar permite realizar la búsqueda filtrada por Número de Solicitud, Fecha, Código Analista CTS, Código Solicitante, Descripción se coloca la información precisa en la línea en blanco y se le da al botón Buscar y muestra la información puntual que el analista solicitó.\n\n\nSe utiliza el botón guardar para cambiar el estatus de la solicitud si el analista decide Cancelar la solicitud debe seleccionar Anular y para que este proceso se lleve a cabo debe presionar el botón guardar.\n\n\nTenemos el botón limpiar que es el que coloca en blanco todos los campos permitiendo así realizar la nueva búsqueda y el botón refrescar que permite actualizar los campos en la base de datos.\n\nEn cuarto lugar en este módulo encontramos Cerrar Instalación el cual está diseñado para que se cancelar la solicitud de los equipos informáticos.\n\n\n\n\n\n\n\n\nEn este formulario se procede a buscar la solicitud para realizar el cierre de instalación, se coloca el Número de solicitud y se le da enter o se presiona el botón buscar y aparecerá la información almacenada en el formulario.\nEs necesario acotar que cuando se presiona el botón buscar permite realizar la búsqueda filtrada por Número de Solicitud, Fecha, Código Analista CTS, Código Solicitante, Descripción se coloca la información precisa en la línea en blanco y se le da al botón Buscar y muestra la información puntual que el analista .\n\n\nEste formulario se procede a buscar el número de Solicitud se coloca el Número de la solicitud y se presiona enter o se le da al botón buscar y nos mostrará la información del nombre de instalación, número de Configuración, usuario, componente y el número de serial. Esta pantalla cuenta con 2 botones que interactúan con el cuadro de los componentes que permite Añadir o eliminar componentes de forma dinámica. \n\n\nPor otro lado, el botón limpiar es el que coloca en blanco todos los campos permitiendo así realizar la nueva búsqueda, tenemos también el botón Cerrar que una vez verificado la asignación para realizar la instalación se procede a presionar el botón cerrar y queda cerrada la instalación.\n\n\nEn quinto lugar en este módulo encontramos Desincorporación y/o Devolución el cual está diseñado para desincorporar o devolver los equipos informáticos al almacén.\n\n\n\n\n\nEn este formulario se procede a buscar la solicitud para realizar las entradas por Desincorporación y/o Devolución, se coloca el Número de solicitud y se le da enter o se presiona el botón buscar y aparecerá la información almacenada en el formulario.\n\n\nEs necesario acotar que cuando se presiona el botón buscar permite realizar la búsqueda filtrada por Número de Solicitud, Fecha, Código Analista CTS, Código Solicitante, Descripción se coloca la información precisa en la línea en blanco y se le da al botón Buscar y muestra la información puntual que el analista solicitó.\n\n\nEste formulario se procede a buscar el número de Solicitud se coloca el Número de la solicitud y se presiona enter o se le da al botón buscar y nos mostrará la información del componente, descripción, nro. Serial y cantidad. Esta pantalla cuenta con 2 botones que interactúan con el cuadro de los componentes que permite Añadir o eliminar componentes de forma dinámica. \n\n\nPor otro lado, el botón limpiar es el que coloca en blanco todos los campos permitiendo así realizar la nueva búsqueda, tenemos también el botón guardar que nos permite a través del estatus desincorporar o devolver los equipos almacén o desincorporarlos del inventario.\n\n\nEn este formulario se cuenta con botones de ayuda para el buscar de forma rápida el almacén y buscar los componentes informáticos.\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");



DROP TABLE m_componentes;

CREATE TABLE `m_componentes` (
  `COD_COMP` int(10) NOT NULL,
  `COD_GRUPO_ART` varchar(3) NOT NULL,
  `COD_MARCA` varchar(3) NOT NULL,
  `COD_MODELO` varchar(3) NOT NULL,
  `DESC_COMP` varchar(45) NOT NULL,
  `FEC_CREACION` date NOT NULL,
  `USUARIO_CREACION` varchar(10) NOT NULL,
  `STATUS_COMP` varchar(2) NOT NULL,
  `COD_TIPO` varchar(3) NOT NULL,
  `COD_PROCESA` varchar(3) NOT NULL,
  `UM` varchar(3) NOT NULL,
  `VELOCIDAD` varchar(10) NOT NULL,
  `MEMORIA` varchar(6) NOT NULL,
  `DISCO` varchar(6) NOT NULL,
  `FEC_MODIF` date NOT NULL,
  `USUARIO_MODIF` varchar(10) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `GRUPO_COMP` varchar(2) NOT NULL,
  UNIQUE KEY `COD_COMP` (`COD_COMP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_componentes VALUES("3","005","001","014","Portatil IBM T43 - L3-8WLR3","2013-11-14","MFREY","01","002","004",""," "," "," ","2013-11-25","MFREY","1","02");
INSERT INTO m_componentes VALUES("2","002","006","009","CPU lenovo 4518-E4S - MJMYHZG ","2013-11-14","MFREY","01","001","001",""," 2.9Ghz","2GB "," 250GB","2013-11-21","MFREY","1","01");
INSERT INTO m_componentes VALUES("1","002","006","010","CPU Lenovo 3269-A8S -  MJEV961","2013-11-14","MFREY","01","001","003","","2.6Ghz","4GB "," 500GB","2013-11-25","MFREY","1","01");
INSERT INTO m_componentes VALUES("4","001","006","004","Impresora Epson DFX-8500","2013-11-14","MFREY","01","004","003",""," "," "," ","2013-11-25","MFREY","1","08");
INSERT INTO m_componentes VALUES("5","002","006","003","CPU Lenovo 3269-A8S -  MJHJHI","2014-01-09","MFREY","01","003","004","","10","7","24 gb","0000-00-00","","1","01");



DROP TABLE m_grupo_articulos;

CREATE TABLE `m_grupo_articulos` (
  `COD_GRUPO_ART` varchar(3) NOT NULL,
  `DESC_GRUPO_ART` varchar(25) NOT NULL,
  UNIQUE KEY `codigo_articulo` (`COD_GRUPO_ART`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_grupo_articulos VALUES("005","Portatil");
INSERT INTO m_grupo_articulos VALUES("004","Pantallas");
INSERT INTO m_grupo_articulos VALUES("003","FAX");
INSERT INTO m_grupo_articulos VALUES("002","CPU");
INSERT INTO m_grupo_articulos VALUES("001","Impresoras");
INSERT INTO m_grupo_articulos VALUES("006","Access Point");
INSERT INTO m_grupo_articulos VALUES("007","Adapatadores");
INSERT INTO m_grupo_articulos VALUES("008","Bateria");
INSERT INTO m_grupo_articulos VALUES("009","Cables HDM1 50 pies");
INSERT INTO m_grupo_articulos VALUES("010","Camaras");
INSERT INTO m_grupo_articulos VALUES("011","Cargadores");
INSERT INTO m_grupo_articulos VALUES("012","Cintas backup");
INSERT INTO m_grupo_articulos VALUES("013","Disco Duro");
INSERT INTO m_grupo_articulos VALUES("014","Hub USB 7 puertos");
INSERT INTO m_grupo_articulos VALUES("015","Mouse");
INSERT INTO m_grupo_articulos VALUES("016","Regulador de Voltaje");
INSERT INTO m_grupo_articulos VALUES("017","Teclado");
INSERT INTO m_grupo_articulos VALUES("018","Video beam");
INSERT INTO m_grupo_articulos VALUES("019","Monitor");
INSERT INTO m_grupo_articulos VALUES("999","asasas");
INSERT INTO m_grupo_articulos VALUES("991","hjhkjhk");
INSERT INTO m_grupo_articulos VALUES("995","iuiuiou");
INSERT INTO m_grupo_articulos VALUES("997","hkjhkjhkj");



DROP TABLE m_grupo_componentes;

CREATE TABLE `m_grupo_componentes` (
  `GRUPO_COMP` varchar(2) NOT NULL,
  `descripcion` varchar(35) NOT NULL,
  UNIQUE KEY `codigo` (`GRUPO_COMP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_grupo_componentes VALUES("01","PC");
INSERT INTO m_grupo_componentes VALUES("02","Portatiles");
INSERT INTO m_grupo_componentes VALUES("03","FDV");
INSERT INTO m_grupo_componentes VALUES("04","Tablec");
INSERT INTO m_grupo_componentes VALUES("05","Teléfonos");
INSERT INTO m_grupo_componentes VALUES("06","CDB");
INSERT INTO m_grupo_componentes VALUES("07","Otros");
INSERT INTO m_grupo_componentes VALUES("08","Impresoras");



DROP TABLE m_jerarquia_org;

CREATE TABLE `m_jerarquia_org` (
  `COD_UNIDAD` varchar(3) NOT NULL,
  `DESC_UNIDAD` varchar(40) NOT NULL,
  `COD_GERENCIA` varchar(4) NOT NULL,
  `DESC_GERENCIA` varchar(40) NOT NULL,
  `NIVEL` varchar(4) NOT NULL,
  UNIQUE KEY `unidad_gerencia` (`COD_UNIDAD`,`COD_GERENCIA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0004","GERENCIA DE GANADERIA BOVINA","4");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0003","GERENCIA PROYECTOS AGROINDUSTRIAL","3");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0001","VP AGROINDUSTRIAL","1");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0002","GERENCIA DE PROYECTOS ESTRATEGICOS","2");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0005","GERENCIA PLANTA ALIMENTOS BALANC.","5");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0006","GRANJA AFI - CALABOZO","6");
INSERT INTO m_jerarquia_org VALUES("001","AGROINDUSTRIAL","0007","GRANJA PROCER - QUIBOR","7");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0001","DIRECCION DE CAPITAL HUMANO","1");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0002","GERENCIA DE DESARROLLO Y CAMBIO ORG.","2");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0003","GERENCIA DE SERVICIOS DE ALIMENTACION","3");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0004","GERENCIA DE COMPENSACION Y GESTION","4");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0005","GERENCIA DE ASUNTOS DEL TRABAJO","5");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0006","GERENCIA DE CH MANUFACTURA","6");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0007","GERENCIA DE CH UNIDADES SOPORTE CGU","7");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0008","GERENCIA DE CH MANUF. EMBUTIDOS","8");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0009","GERENCIA DE CH MANUF. MATADERO","9");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0010","GERENCIA DE CH AGROINDUSTRIAL","10");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0011","GERENCIA DE CH COMERCIALIZACION","11");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0012","GERENCIA DE PREVENCION Y ADM. RIESGOS","12");
INSERT INTO m_jerarquia_org VALUES("002","CAPITAL HUMANO","0013","GERENCIA DE SEGURIDAD Y SALUD LABORAL","13");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0001","GERENCIA GENERAL","1");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0002","COMERCIAL","2");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0003","TECNOLOGIA DE INFORMACION","3");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0004","CAPITAL HUMANO","4");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0005","PROCURA","5");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0006","ADMINISTRACION","6");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0007","LOGISTICA","7");
INSERT INTO m_jerarquia_org VALUES("003","MONTSERRATINA","0008","PRODUCCION","8");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0001","UNIDAD DE CONGELADOS","1");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0002","GERENCIA DE CONSUMER MARKETING","2");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0003","GERENCIA DE CUSTOMER-TRADE MARKETIN","3");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0004","GERENCIA REGIONAL DE CUST. MARK. CC","4");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0005","GERENCIA REGIONAL DE CUST. MARK. CD","5");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0006","GERENCIA REGIONAL DE CUST. MARK. BA","6");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0007","GERENCIA REGIONAL DE CUST. MARK. VA","7");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0008","GERENCIA REGIONAL DE CUST. MARK. BQ","8");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0009","GERENCIA REGIONAL DE CUST. MARK. MB","9");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0010","GERENCIA NACIONAL DE VENTAS","10");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0011","GERENCIA REGIONAL DE VENTAS CCS","11");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0012","GERENCIA REGIONAL DE VENTAS CDB","12");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0013","GERENCIA REGIONAL DE VENTAS BAR","13");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0014","GERENCIA REGIONAL DE VENTAS VAL","14");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0015","GERENCIA REGIONAL DE VENTAS BQT","15");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0016","GERENCIA REGIONAL DE VENTAS MBO","16");
INSERT INTO m_jerarquia_org VALUES("004","COMERCIAL","0017","GERENCIA REGIONAL DE VENTAS CGU","17");



DROP TABLE m_listas_config_heder;

CREATE TABLE `m_listas_config_heder` (
  `cod_lista` int(3) NOT NULL,
  `nom_lista` varchar(30) NOT NULL,
  UNIQUE KEY `cod_lista` (`cod_lista`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_listas_config_heder VALUES("1","Lista estandar");



DROP TABLE m_listas_config_items;

CREATE TABLE `m_listas_config_items` (
  `cod_lista` int(3) NOT NULL,
  `cod_software` int(4) NOT NULL,
  `items` int(2) NOT NULL,
  UNIQUE KEY `lista` (`cod_lista`,`cod_software`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_listas_config_items VALUES("1","1","0");



DROP TABLE m_localidades;

CREATE TABLE `m_localidades` (
  `COD_LOCALIDAD` int(2) NOT NULL,
  `DESC_LOCALIDAD` varchar(40) NOT NULL,
  UNIQUE KEY `cod_localidad` (`COD_LOCALIDAD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_localidades VALUES("1","Planta Cagua");
INSERT INTO m_localidades VALUES("2","Sede Principal");
INSERT INTO m_localidades VALUES("3","Matadero");
INSERT INTO m_localidades VALUES("4","Sucursal Caracas");
INSERT INTO m_localidades VALUES("5","Sucursal Maracaibo");
INSERT INTO m_localidades VALUES("6","Sucursal Barquisimeto");
INSERT INTO m_localidades VALUES("7","Sucursal Barcelona");
INSERT INTO m_localidades VALUES("8","Sucursal Ciudad Bolívar");
INSERT INTO m_localidades VALUES("9","Sucursal Valencia");
INSERT INTO m_localidades VALUES("10","Planta ABA - Bejuma");
INSERT INTO m_localidades VALUES("11","Granja AFI - Calabozo");
INSERT INTO m_localidades VALUES("12","Granja Procer - Quibor");
INSERT INTO m_localidades VALUES("13","Profimar - Porlamar");
INSERT INTO m_localidades VALUES("14","Planta Tejerías");
INSERT INTO m_localidades VALUES("15","Sede Boleíta");
INSERT INTO m_localidades VALUES("16","Santa Cruz");
INSERT INTO m_localidades VALUES("0","");



DROP TABLE m_marcas;

CREATE TABLE `m_marcas` (
  `COD_MARCA` varchar(3) NOT NULL,
  `DESC_MARCA` varchar(25) NOT NULL,
  UNIQUE KEY `codigo_marca` (`COD_MARCA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_marcas VALUES("005","NA");
INSERT INTO m_marcas VALUES("004","Lexmark");
INSERT INTO m_marcas VALUES("003","Epson");
INSERT INTO m_marcas VALUES("002","Zebra");
INSERT INTO m_marcas VALUES("001","HP");
INSERT INTO m_marcas VALUES("006","Lenovo");
INSERT INTO m_marcas VALUES("007","Logitech");



DROP TABLE m_modelos;

CREATE TABLE `m_modelos` (
  `COD_MODELO` varchar(3) NOT NULL,
  `DESC_MODELO` varchar(25) NOT NULL,
  UNIQUE KEY `codigo_modelo` (`COD_MODELO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_modelos VALUES("001","ThinkPad T400");
INSERT INTO m_modelos VALUES("002","ThinkPad T420");
INSERT INTO m_modelos VALUES("003","ThinkPad T61D");
INSERT INTO m_modelos VALUES("004","ET1N0");
INSERT INTO m_modelos VALUES("005","9645-BN2");
INSERT INTO m_modelos VALUES("006","9482-AD5");
INSERT INTO m_modelos VALUES("007","7269-E1S");
INSERT INTO m_modelos VALUES("008","6072-E64");
INSERT INTO m_modelos VALUES("009","4518-E4S");
INSERT INTO m_modelos VALUES("010","3269-A8S");
INSERT INTO m_modelos VALUES("011","NA");
INSERT INTO m_modelos VALUES("012","Deskjet");
INSERT INTO m_modelos VALUES("013","Laserjet");
INSERT INTO m_modelos VALUES("014","Matricial");
INSERT INTO m_modelos VALUES("015","Térmica");



DROP TABLE m_proveedores;

CREATE TABLE `m_proveedores` (
  `RIF_PROV` varchar(20) NOT NULL,
  `DEN_PROV` varchar(35) NOT NULL,
  `STATUS_PROV` varchar(1) NOT NULL,
  `OBSER_PROV` varchar(200) NOT NULL,
  `COD_TIPO_PROV` varchar(2) NOT NULL,
  `CODIGO_SAP` varchar(15) NOT NULL,
  UNIQUE KEY `codigo_proveedor` (`RIF_PROV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_proveedores VALUES("9797","Proveedor 3","1","Prueba","02","899");
INSERT INTO m_proveedores VALUES("98989","Proveedor 2","1","Proveedor 2","02","777");
INSERT INTO m_proveedores VALUES("12345","Proveedor 1","1","Proveedor 1","01","888");



DROP TABLE m_roles;

CREATE TABLE `m_roles` (
  `COD_OPCION` varchar(13) NOT NULL,
  `DESC_ROL` varchar(35) NOT NULL,
  UNIQUE KEY `cod_rol` (`COD_OPCION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_roles VALUES("SICEI_PAG_003","Cancelar Solicitud");
INSERT INTO m_roles VALUES("SICEI_PAG_004","Desincorporación y/o Devolución");
INSERT INTO m_roles VALUES("SICEI_PAG_005","Cerrar Instalación");
INSERT INTO m_roles VALUES("SICEI_PAG_006","Maestro de Componentes");
INSERT INTO m_roles VALUES("SICEI_PAG_007","Atributos de Componentes");
INSERT INTO m_roles VALUES("SICEI_PAG_008","Maestro de Servidores");
INSERT INTO m_roles VALUES("SICEI_PAG_009","Atributos de Servidores");
INSERT INTO m_roles VALUES("SICEI_PAG_010","Maestro de Solicitantes");
INSERT INTO m_roles VALUES("SICEI_PAG_011","Jerarquia Organizativa");
INSERT INTO m_roles VALUES("SICEI_PAG_012","Maestro de Proveedores");
INSERT INTO m_roles VALUES("SICEI_PAG_013","Atributos de Proveedores");
INSERT INTO m_roles VALUES("SICEI_PAG_014","Maestro de Almacenes");
INSERT INTO m_roles VALUES("SICEI_PAG_015","Analistas CTS");
INSERT INTO m_roles VALUES("SICEI_PAG_016","Movimientos de Entradas");
INSERT INTO m_roles VALUES("SICEI_PAG_017","Movimientos de Salida");
INSERT INTO m_roles VALUES("SICEI_PAG_018","Traspasos");
INSERT INTO m_roles VALUES("SICEI_PAG_019","Documento de Inventario");
INSERT INTO m_roles VALUES("SICEI_PAG_020","Registro de Diferencias");
INSERT INTO m_roles VALUES("SICEI_PAG_021","Contabilizar Diferencias");
INSERT INTO m_roles VALUES("SICEI_PAG_022","Foto Técnologica");
INSERT INTO m_roles VALUES("SICEI_PAG_001","Aperturar Solicitud");
INSERT INTO m_roles VALUES("SICEI_PAG_002","Confirmar Solicitud");
INSERT INTO m_roles VALUES("SICEI_PAG_026","Maestro de Usuarios");
INSERT INTO m_roles VALUES("SICEI_PAG_029","Tipos de Solicitudes");
INSERT INTO m_roles VALUES("SICEI_PAG_030","Maestro de Localidades");
INSERT INTO m_roles VALUES("SICEI_PAG_023","Reporte de Stock");
INSERT INTO m_roles VALUES("SICEI_PAG_024","Reporte de Movimientos de Stock");
INSERT INTO m_roles VALUES("SICEI_PAG_027","Actualización Clave de Acceso");
INSERT INTO m_roles VALUES("SICEI_PAG_028","Asignación de Roles a Usuarios");
INSERT INTO m_roles VALUES("SICEI_PAG_031","Mantenimiento de la Base de Datos");
INSERT INTO m_roles VALUES("SICEI_PAG_033","Grafico Estadístico");
INSERT INTO m_roles VALUES("SICEI_PAG_034","Resumen Foto Técnologica");
INSERT INTO m_roles VALUES("SICEI_PAG_999","Funcionalidades de SICEI");
INSERT INTO m_roles VALUES("SICEI_PAG_036","Maestro de Proyectos");
INSERT INTO m_roles VALUES("SICEI_PAG_037","Maestro de Software");
INSERT INTO m_roles VALUES("SICEI_PAG_038","Maestro Tipos  de Software");
INSERT INTO m_roles VALUES("SICEI_PAG_039","Listas de Software");



DROP TABLE m_servidores;

CREATE TABLE `m_servidores` (
  `COD_SERV` varchar(10) NOT NULL,
  `DESC_SERV` varchar(45) NOT NULL,
  `NOMB_SERV` varchar(10) NOT NULL,
  `SERIAL_SERV` varchar(20) NOT NULL,
  `FEC_CREADO` date NOT NULL,
  `USUARIO_CREADO` varchar(10) NOT NULL,
  `STATUS_SERV` varchar(2) NOT NULL,
  `COD_TIPO_SERV` varchar(3) NOT NULL,
  `COD_PROCE_SERV` varchar(35) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `HDD` varchar(10) NOT NULL,
  `DISCO` varchar(6) NOT NULL,
  `COD_LOCALIDAD` int(2) NOT NULL,
  `FEC_MODIFI` date NOT NULL,
  `USUARIO_MODIFI` varchar(10) NOT NULL,
  `SERIAL_MON` varchar(20) NOT NULL,
  `SERIAL_TEC` varchar(20) NOT NULL,
  `SERIAL_MOU` varchar(20) NOT NULL,
  `IND_RAID` varchar(1) NOT NULL,
  `Grupo_servidor` varchar(2) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `COD_UNIDAD` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_servidores VALUES("ser_001","Linux VM SX Symantec (SBG)1","VECCSPRS01","KQMXPWC1","2013-09-18","MFREY","0","001","Intel Xeon 2.4Ghz 4 Core","5GB","2x146G-9h","","1","2013-11-24","MFREY","55-VX478-1","0776464-3","","","1","45454","006");
INSERT INTO m_servidores VALUES("Ser_002","Aplicaciones WEB Open - Virtual (VECGUPRA08)","VECGUPRA19","787878","2013-11-24","MFREY","1","001","Intel Xeon 2.4Ghz 4 Core","6GB","3x140GB","","4","2013-11-24","MFREY","","","","","2","","004");
INSERT INTO m_servidores VALUES("Ser_003","SAP PRO Aplicaciones 1","cgsapap1","10-AC00P","2013-11-24","MFREY","1","001","2","14","","","1","0000-00-00","","","","","","3","Server IBM power7","011");
INSERT INTO m_servidores VALUES("Ser_004","SAP PRO Aplicaciones 2","cgsapap2","10-AC00P","2013-11-24","MFREY","1","002","2","14","","","1","0000-00-00","","","","","","3","Server IBM power7","011");
INSERT INTO m_servidores VALUES("Ser_005","SAP PRO Aplicaciones 3","cgsapap3","10-AC00P","2013-11-24","MFREY","1","001","2","14","","","1","2013-11-24","MFREY","","","","","3","Server IBM power7","011");
INSERT INTO m_servidores VALUES("SER-00474","SAP PRO Aplicaciones 154","HDYUWEYR","JHSKJFHSDJ","2013-12-23","MFREY","1","002","4564","8GB","IRU","","4","0000-00-00","","76437","87987","0909989","1","1","YEURY8743","001");



DROP TABLE m_software;

CREATE TABLE `m_software` (
  `cod_software` int(4) NOT NULL,
  `tipo_software` int(3) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  `version` varchar(30) NOT NULL,
  UNIQUE KEY `cod_software` (`cod_software`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_software VALUES("1","3","2","Outlook 2010.");



DROP TABLE m_solicitantes;

CREATE TABLE `m_solicitantes` (
  `COD_SOL` int(10) NOT NULL,
  `NOMB_SOL` varchar(45) NOT NULL,
  `COD_SAP_SOL` varchar(10) NOT NULL,
  `COD_UNIDAD` varchar(3) NOT NULL,
  `COD_GERENCIA` varchar(4) NOT NULL,
  `ESTATUS` varchar(2) NOT NULL,
  `COD_LOCALIDAD` int(2) NOT NULL,
  UNIQUE KEY `codigo_solicitante` (`COD_SOL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_solicitantes VALUES("3","Jose Luis Briceño","0001","001","0001","1","1");
INSERT INTO m_solicitantes VALUES("2","Domingo Martín","0003","001","0003","1","5");
INSERT INTO m_solicitantes VALUES("1","Michael Strand","4546","001","0002","1","0");
INSERT INTO m_solicitantes VALUES("4","Ursula Tortolero","909","001","0004","1","0");
INSERT INTO m_solicitantes VALUES("9","Maria Elinor Frey","8989","001","0007","1","10");
INSERT INTO m_solicitantes VALUES("10","Oscar Guedez","990","004","0008","1","7");



DROP TABLE m_tipo_componente;

CREATE TABLE `m_tipo_componente` (
  `COD_TIPO` varchar(3) NOT NULL,
  `DESC_TIPO` varchar(25) NOT NULL,
  UNIQUE KEY `codigo_tipo` (`COD_TIPO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipo_componente VALUES("007","Impresoras Matriciales");
INSERT INTO m_tipo_componente VALUES("006","Matriciales LaserJets");
INSERT INTO m_tipo_componente VALUES("005","Matriciales Deskjet");
INSERT INTO m_tipo_componente VALUES("013","Otros");
INSERT INTO m_tipo_componente VALUES("003","Tablet PCs");
INSERT INTO m_tipo_componente VALUES("002","Laptops");
INSERT INTO m_tipo_componente VALUES("001","Desktops");
INSERT INTO m_tipo_componente VALUES("008","Impresoras Térmicas");
INSERT INTO m_tipo_componente VALUES("009","PDAs");
INSERT INTO m_tipo_componente VALUES("010","Impresoras PDAs");
INSERT INTO m_tipo_componente VALUES("011","Routers");
INSERT INTO m_tipo_componente VALUES("012","Enlaces");



DROP TABLE m_tipo_procesadores;

CREATE TABLE `m_tipo_procesadores` (
  `COD_PROCESA` varchar(3) NOT NULL,
  `DESC_PROCESA` varchar(25) NOT NULL,
  UNIQUE KEY `codigo_procesa` (`COD_PROCESA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipo_procesadores VALUES("002","L-Pentium Dual");
INSERT INTO m_tipo_procesadores VALUES("001","L-Pentium IV");
INSERT INTO m_tipo_procesadores VALUES("003","L-Pentium Quad");
INSERT INTO m_tipo_procesadores VALUES("004","Pentium Dual");
INSERT INTO m_tipo_procesadores VALUES("005","Pentium Quad");
INSERT INTO m_tipo_procesadores VALUES("006","NA");



DROP TABLE m_tipo_servidores;

CREATE TABLE `m_tipo_servidores` (
  `COD_TIPO_SERV` varchar(3) NOT NULL,
  `des_tipo_serv` varchar(35) NOT NULL,
  UNIQUE KEY `Tipo_servidor` (`COD_TIPO_SERV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipo_servidores VALUES("001","Server IBM x3650 M3");
INSERT INTO m_tipo_servidores VALUES("002","Server IBM Blade HS21");
INSERT INTO m_tipo_servidores VALUES("003","Server IBM xseries 3650 M2");
INSERT INTO m_tipo_servidores VALUES("004","Server IBM xseries 445");
INSERT INTO m_tipo_servidores VALUES("005","yiuyiu");



DROP TABLE m_tipo_software;

CREATE TABLE `m_tipo_software` (
  `tipo_software` int(3) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  UNIQUE KEY `tipo_ software` (`tipo_software`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipo_software VALUES("1","Sistema Operativo");
INSERT INTO m_tipo_software VALUES("2","Correo ");
INSERT INTO m_tipo_software VALUES("3","Office");
INSERT INTO m_tipo_software VALUES("4","Antivirus");
INSERT INTO m_tipo_software VALUES("5","Sap");
INSERT INTO m_tipo_software VALUES("6","Acrobat Reader");
INSERT INTO m_tipo_software VALUES("7","Versión Internet E.");
INSERT INTO m_tipo_software VALUES("8","WinZip");
INSERT INTO m_tipo_software VALUES("9","SMS");
INSERT INTO m_tipo_software VALUES("10","Project");
INSERT INTO m_tipo_software VALUES("11","Adam-Oracle");
INSERT INTO m_tipo_software VALUES("12","Visual Basic");
INSERT INTO m_tipo_software VALUES("13","Access");
INSERT INTO m_tipo_software VALUES("14","Columbus");
INSERT INTO m_tipo_software VALUES("15","SQL");
INSERT INTO m_tipo_software VALUES("16","Hyperion");
INSERT INTO m_tipo_software VALUES("17","Fax-Maker");
INSERT INTO m_tipo_software VALUES("18","Safiro");
INSERT INTO m_tipo_software VALUES("19","LincNet");



DROP TABLE m_tipos_plataformas;

CREATE TABLE `m_tipos_plataformas` (
  `COD_PLATAF` varchar(2) NOT NULL,
  `DESC_PLATAF` varchar(35) NOT NULL,
  `IND_INSTALACION` int(1) NOT NULL,
  UNIQUE KEY `codigo` (`COD_PLATAF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipos_plataformas VALUES("03","Servidores","0");
INSERT INTO m_tipos_plataformas VALUES("04","Servidores Virtuales","0");
INSERT INTO m_tipos_plataformas VALUES("05","Telecomunicaciones","1");
INSERT INTO m_tipos_plataformas VALUES("06","Códigos de Barras","1");
INSERT INTO m_tipos_plataformas VALUES("07","FDV","1");
INSERT INTO m_tipos_plataformas VALUES("08","Componentes Centros de Datos","0");
INSERT INTO m_tipos_plataformas VALUES("09","Sistemas Operativos","0");
INSERT INTO m_tipos_plataformas VALUES("01","PCs","1");
INSERT INTO m_tipos_plataformas VALUES("02","Impresoras","1");
INSERT INTO m_tipos_plataformas VALUES("10","Servidores UNIX","0");



DROP TABLE m_tipos_prov;

CREATE TABLE `m_tipos_prov` (
  `COD_TIPO_PROV` varchar(2) NOT NULL,
  `DESC_TIPO_PROV` varchar(20) NOT NULL,
  UNIQUE KEY `tipo_proveedor` (`COD_TIPO_PROV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipos_prov VALUES("01","Proveedores tipo A");
INSERT INTO m_tipos_prov VALUES("02","Proveedores tipo B");
INSERT INTO m_tipos_prov VALUES("04","De Impresoras");



DROP TABLE m_tipos_solicitudes;

CREATE TABLE `m_tipos_solicitudes` (
  `COD_TIPO_SOLIC` varchar(4) NOT NULL,
  `DESC_SOLIC` varchar(50) NOT NULL,
  `IND_SALIDA` varchar(1) NOT NULL,
  UNIQUE KEY `Cod_solicitud` (`COD_TIPO_SOLIC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_tipos_solicitudes VALUES("3","Desincorporación","");
INSERT INTO m_tipos_solicitudes VALUES("2","Renovación de Equipos","1");
INSERT INTO m_tipos_solicitudes VALUES("1","Instalación de Equipos","1");
INSERT INTO m_tipos_solicitudes VALUES("4","","");



DROP TABLE m_unidad_org;

CREATE TABLE `m_unidad_org` (
  `COD_UNIDAD` varchar(3) NOT NULL,
  `DESC_UNIDAD` varchar(40) NOT NULL,
  UNIQUE KEY `UNIDAD` (`COD_UNIDAD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_unidad_org VALUES("001","AGROINDUSTRIAL");
INSERT INTO m_unidad_org VALUES("002","DIRECCION DE CAPITAL HUMANO");
INSERT INTO m_unidad_org VALUES("003","MONTSERRATINA");
INSERT INTO m_unidad_org VALUES("004","COMERCIAL");
INSERT INTO m_unidad_org VALUES("005","FINANZAS");
INSERT INTO m_unidad_org VALUES("006","VENPACKERS");
INSERT INTO m_unidad_org VALUES("007","MANUFACTURA EMBUTIDOS");
INSERT INTO m_unidad_org VALUES("008","MANUFACTURA MATADERO");
INSERT INTO m_unidad_org VALUES("009","PROCURA");
INSERT INTO m_unidad_org VALUES("010","SAXOLUTIONS");
INSERT INTO m_unidad_org VALUES("011","DIRECCION DE TECNOLOGIA DE INFORMACION");
INSERT INTO m_unidad_org VALUES("012","PRESIDENCIA, VPS Y UCS");



DROP TABLE m_usuarios;

CREATE TABLE `m_usuarios` (
  `COD_USUARIO` varchar(10) NOT NULL,
  `NOM_USUARIO` varchar(15) NOT NULL,
  `APE_USUARIO` varchar(15) NOT NULL,
  `FEC_CREACION` date NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `CI_USUARIO` varchar(15) NOT NULL,
  `FEC_ULT_CAMBIO` date NOT NULL,
  `EMAIL_USUARIO` varchar(35) NOT NULL,
  `FEC_ULT_ACCESO` date NOT NULL,
  `HORA_ULT_ACCESO` text NOT NULL,
  `STATUS_USUARIO` int(2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipo_usuario` varchar(2) NOT NULL,
  UNIQUE KEY `COD_USUARIO` (`COD_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO m_usuarios VALUES("MFREY","Maria Elinor","Frey Jaspe","2013-07-09","12122835","12.122.835","2014-01-31","mfrey@plumrose.com","2014-02-17","18:18:23","1","fotomaria.jpg","01");
INSERT INTO m_usuarios VALUES("YABREU","Yoselin","Abreu","2013-11-14","11111111","12345678","2013-11-27","yabreu@hotmail.com","2014-01-12","16:16:50","1","","");
INSERT INTO m_usuarios VALUES("oguedez","Oscar Jose","Guedez Frey","2013-12-28","init01","11.999.189","0000-00-00","oguedez@hotmail.com","0000-00-00","","1","","");
INSERT INTO m_usuarios VALUES("aascanio","alvaro","ascanio","2013-12-28","init01","98989080","0000-00-00","a","0000-00-00","","1","","");



DROP TABLE mbd_respaldos;

CREATE TABLE `mbd_respaldos` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nomb_archivo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO mbd_respaldos VALUES("2014-01-08","02:02:05","pruebarespaldo1");
INSERT INTO mbd_respaldos VALUES("2014-01-06","02:02:59","respaldobdhoy");
INSERT INTO mbd_respaldos VALUES("2013-12-31","02:02:40","pruebarespaldo02");
INSERT INTO mbd_respaldos VALUES("2014-01-08","21:21:29","respaldobd");
INSERT INTO mbd_respaldos VALUES("2014-01-09","18:18:08","respaldobd");
INSERT INTO mbd_respaldos VALUES("2014-01-09","18:18:01","respadohoy");
INSERT INTO mbd_respaldos VALUES("2014-01-09","18:18:10","pruebahoy");
INSERT INTO mbd_respaldos VALUES("2014-01-13","11:11:32","respaldo13012014");
INSERT INTO mbd_respaldos VALUES("2014-02-17","18:18:49","respaldo");



DROP TABLE proyectos;

CREATE TABLE `proyectos` (
  `cod_proyecto` varchar(10) NOT NULL,
  `nom_proyecto` varchar(40) NOT NULL,
  `estatus` int(1) NOT NULL,
  `nro_inversion` varchar(15) NOT NULL,
  UNIQUE KEY `cod_proyecto` (`cod_proyecto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO proyectos VALUES("PRO001","Proyecto para Montserratina","2","gere0383");
INSERT INTO proyectos VALUES("PRO002","","1","Prueba Inversio");



DROP TABLE t_asignacion_equipos;

CREATE TABLE `t_asignacion_equipos` (
  `NUM_CONF` varchar(4) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `STATUS` varchar(2) NOT NULL,
  `ITEMS` int(4) NOT NULL,
  `NUM_SOLIC` varchar(10) NOT NULL,
  `NOM_EQUIPO` varchar(10) NOT NULL,
  UNIQUE KEY `conf_comp_serial` (`NUM_CONF`,`COD_COMP`,`NUM_SERIAL`,`NOM_EQUIPO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_asignacion_equipos VALUES("4324","2","uyiuyiuyiu","","1","","GG01");
INSERT INTO t_asignacion_equipos VALUES("8857","4","YGBD-003","","1","6","MFHF-004");
INSERT INTO t_asignacion_equipos VALUES("6565","4","YGBD-003","","2","3","MAU-002");
INSERT INTO t_asignacion_equipos VALUES("6565","1","TRVE-002","01","1","3","MAU-001");
INSERT INTO t_asignacion_equipos VALUES("7878","1","IUYOIUOIU","","2","","MM1");
INSERT INTO t_asignacion_equipos VALUES("123","2","JHJHJ","","0","","MM02");
INSERT INTO t_asignacion_equipos VALUES("7879","5","IUOUIU","","1","","JJJJJ");
INSERT INTO t_asignacion_equipos VALUES("7654","2","KNKK-98","","3","3","MAU-003");
INSERT INTO t_asignacion_equipos VALUES("866","4","UYUY-789","","1","7","trrer-0898");
INSERT INTO t_asignacion_equipos VALUES("866","2","GFGF-988","","2","7","trrer-0898");



DROP TABLE t_cab_confirmacion;

CREATE TABLE `t_cab_confirmacion` (
  `NUM_SOLIC` int(10) NOT NULL,
  `NUM_CONF` varchar(10) NOT NULL,
  `FEC_REGISTRO` date NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `NUM_MOVI` int(10) NOT NULL,
  `COD_ALM` varchar(3) NOT NULL,
  `cod_cts` varchar(10) NOT NULL,
  `OBSER_CONF` varchar(100) NOT NULL,
  UNIQUE KEY `Sol_conf` (`NUM_SOLIC`,`NUM_CONF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_cab_confirmacion VALUES("3","","2013-11-28","MFREY","8","002","","");
INSERT INTO t_cab_confirmacion VALUES("6","","2013-12-23","MFREY","14","002","","");
INSERT INTO t_cab_confirmacion VALUES("7","","2014-01-03","MFREY","19","001","","");
INSERT INTO t_cab_confirmacion VALUES("8","","2014-01-05","MFREY","21","001","","");
INSERT INTO t_cab_confirmacion VALUES("1","","2014-01-12","MFREY","61","002","","");
INSERT INTO t_cab_confirmacion VALUES("15","","2014-01-28","MFREY","62","002","","");



DROP TABLE t_cab_solicitud;

CREATE TABLE `t_cab_solicitud` (
  `NUM_SOLIC` int(10) NOT NULL,
  `NUM_TICKET_CTS` int(10) NOT NULL,
  `COD_SOL` varchar(10) NOT NULL,
  `COD_CTS` varchar(10) NOT NULL,
  `COD_TIPO_SOLIC` varchar(4) NOT NULL,
  `DESC_SOLIC` varchar(100) NOT NULL,
  `FEC_COMP` date NOT NULL,
  `FEC_CREADO` date NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `FEC_SOLIC` date NOT NULL,
  `COD_STATU` varchar(2) NOT NULL,
  `FEC_CIERRE` date NOT NULL,
  `COD_USU_CIERRE` varchar(10) NOT NULL,
  `COD_CTS_CIERRE` varchar(10) NOT NULL,
  `OBSER_CIERRE` varchar(100) NOT NULL,
  UNIQUE KEY `Numero_solicitud` (`NUM_SOLIC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_cab_solicitud VALUES("6","76767","1","2","1","PRUEBA","0000-00-00","2013-12-23","MFREY","2013-12-23","04","2013-12-23","MFREY","3","SE REALIZO LA INSTALACIÓN DE LA IMPRESORA");
INSERT INTO t_cab_solicitud VALUES("5","88","1","1","3","Prueba","0000-00-00","2013-11-28","MFREY","2013-11-28","02","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("4","4545","1","4","3","Prueba de una desincorporacion","0000-00-00","2013-11-28","MFREY","2013-11-28","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("3","776","1","3","2","Prueba","0000-00-00","2013-11-28","MFREY","2013-11-28","04","2013-11-28","MFREY","1","esto es una prueba del cierre de instalación");
INSERT INTO t_cab_solicitud VALUES("2","888","1","4","1","Prueba","0000-00-00","2013-11-28","MFREY","2013-11-28","02","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("1","5556","2","1","2","Esto es una prueba de solicitudes","0000-00-00","2013-11-28","MFREY","2013-11-28","03","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("7","87878","1","3","2","Prueba","0000-00-00","2014-01-03","MFREY","2014-01-03","04","2014-01-13","MFREY","2","");
INSERT INTO t_cab_solicitud VALUES("8","899","1","3","2","jhgjhgjhgjh","0000-00-00","2014-01-03","MFREY","2014-01-03","03","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("9","0","2","1","3","k,jmlkñl","0000-00-00","2014-01-12","MFREY","2014-01-12","02","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("10","9898","2","3","2","Esto es una prueba\n","0000-00-00","2014-01-12","MFREY","2014-01-12","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("11","9898","1","4","1","nkjlkjl\n\n\n","0000-00-00","2014-01-12","MFREY","2014-01-12","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("12","909","4","3","2","","0000-00-00","2014-01-12","MFREY","2014-01-12","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("13","888","1","3","2","esto es una prueba","0000-00-00","2014-01-12","MFREY","2014-01-12","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("14","98989","4","3","3","esto es una prueba","0000-00-00","2014-01-12","MFREY","2014-01-11","01","0000-00-00","","","");
INSERT INTO t_cab_solicitud VALUES("15","75675","2","2","1","Instalación de equipos","0000-00-00","2014-01-28","MFREY","2014-01-28","03","0000-00-00","","","");



DROP TABLE t_conf_equipos;

CREATE TABLE `t_conf_equipos` (
  `NUM_CONF` varchar(4) NOT NULL,
  `NOM_EQUIPO` varchar(10) NOT NULL,
  `COD_SOL` varchar(10) NOT NULL,
  `COD_UNIDAD` varchar(4) NOT NULL,
  `COD_GERENCIA` varchar(4) NOT NULL,
  `COD_PLATAF` varchar(2) NOT NULL,
  `num_solic` int(10) NOT NULL,
  UNIQUE KEY `conf_equipo` (`NUM_CONF`,`NOM_EQUIPO`,`COD_SOL`,`num_solic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_conf_equipos VALUES("123","MM02","9","001","0001","01","0");
INSERT INTO t_conf_equipos VALUES("7878","MM1","3","001","0003","01","0");
INSERT INTO t_conf_equipos VALUES("4324","GG01","4","001","0001","01","0");
INSERT INTO t_conf_equipos VALUES("8857","MFHF-004","3","001","0001","02","6");
INSERT INTO t_conf_equipos VALUES("6565","MAU-002","2","001","0003","02","3");
INSERT INTO t_conf_equipos VALUES("6565","MAU-001","1","001","0002","01","3");
INSERT INTO t_conf_equipos VALUES("7879","JJJJJ","9","001","0001","01","0");
INSERT INTO t_conf_equipos VALUES("7654","MAU-003","4","001","0004","01","3");
INSERT INTO t_conf_equipos VALUES("866","trrer-0898","9","001","0007","01","7");



DROP TABLE t_correlativos;

CREATE TABLE `t_correlativos` (
  `TIPO` varchar(2) NOT NULL,
  `CORRELATIVO` int(10) NOT NULL,
  UNIQUE KEY `tipo_correlativo` (`TIPO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_correlativos VALUES("MI","73");
INSERT INTO t_correlativos VALUES("TR","30");



DROP TABLE t_det_solicitud;

CREATE TABLE `t_det_solicitud` (
  `NUM_SOLIC` int(10) NOT NULL,
  `COD_GRUPO_ART` varchar(3) NOT NULL,
  `CANTIDAD` int(12) NOT NULL,
  UNIQUE KEY `cod_sol_grupo` (`NUM_SOLIC`,`COD_GRUPO_ART`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE t_devolucion;

CREATE TABLE `t_devolucion` (
  `NUM_SOLIC` int(10) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `COD_ALM` varchar(3) NOT NULL,
  `Cantidad` int(12) NOT NULL,
  `ITEMS` int(4) NOT NULL,
  `NUM_CONF` varchar(4) NOT NULL,
  `NUM_MOVI` int(10) NOT NULL,
  `tipo_stock` varchar(2) NOT NULL,
  UNIQUE KEY `sol_comp` (`NUM_SOLIC`,`COD_COMP`,`NUM_SERIAL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_devolucion VALUES("4","4","YGBD-003","002","1","1","6565","0","");
INSERT INTO t_devolucion VALUES("5","1","TRVE-002","002","1","1","6565","12","03");



DROP TABLE t_heder_inv_fisico;

CREATE TABLE `t_heder_inv_fisico` (
  `NUM_DOC` int(10) NOT NULL,
  `FEC_DOC` date NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `COD_ALM` varchar(3) NOT NULL,
  `STATUS_DOC` varchar(2) NOT NULL,
  UNIQUE KEY `nro_documento` (`NUM_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_heder_inv_fisico VALUES("1","2014-01-03","MFREY","002","09");
INSERT INTO t_heder_inv_fisico VALUES("2","2014-01-03","MFREY","002","03");



DROP TABLE t_item_inv_fisico;

CREATE TABLE `t_item_inv_fisico` (
  `NUM_DOC` int(10) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `CANT_STOCK` int(10) NOT NULL,
  `STATUS_STOCK` varchar(2) NOT NULL,
  `CANT_FISICA` int(10) NOT NULL,
  `STATUS_STOCK_FISICO` varchar(2) NOT NULL,
  UNIQUE KEY `nro_documento_componentes` (`NUM_DOC`,`COD_COMP`,`NUM_SERIAL`,`STATUS_STOCK`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_item_inv_fisico VALUES("1","1","TRVE-002","1","03","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","4","TRYR-003","0","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","2","WWW-001","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","2","KNKK-98","0","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","2","RETE-002","0","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","1","TRVE-002","0","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","1","TEREY-004","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","4","YGBD-003","0","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","2","yiyiuy8098098","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","3","67676","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","4","77878","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("1","4","uuuu","1","01","0","09");
INSERT INTO t_item_inv_fisico VALUES("2","1","TRVE-002","1","03","0","");
INSERT INTO t_item_inv_fisico VALUES("2","4","TRYR-003","0","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","2","WWW-001","1","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","2","KNKK-98","0","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","2","RETE-002","0","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","1","TRVE-002","0","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","1","TEREY-004","1","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","4","YGBD-003","0","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","2","yiyiuy8098098","1","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","3","67676","1","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","4","77878","1","01","0","");
INSERT INTO t_item_inv_fisico VALUES("2","4","uuuu","1","01","0","");



DROP TABLE t_movi_heder;

CREATE TABLE `t_movi_heder` (
  `num_movi` int(10) NOT NULL,
  `tipo_movi` varchar(1) NOT NULL,
  `clase_movi` varchar(2) NOT NULL,
  `fec_movi` date NOT NULL,
  `hora_movi` time NOT NULL,
  `cod_usuario` varchar(10) NOT NULL,
  `cod_alm` varchar(3) NOT NULL,
  `num_solic` varchar(10) NOT NULL,
  `num_confi` varchar(4) NOT NULL,
  `num_doc_ref` varchar(15) NOT NULL,
  `rif_prov` varchar(20) NOT NULL,
  `nota` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `estatus` varchar(2) NOT NULL,
  `COD_SOL` varchar(10) NOT NULL,
  UNIQUE KEY `numero_movimiento` (`num_movi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

INSERT INTO t_movi_heder VALUES("3","E","1","2013-11-28","13:13:07","MFREY","001","","","988","12345","PRUEBA","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("2","E","2","2013-11-28","13:13:15","MFREY","001","","","121","98989","PRUEBA DE ENTRADA","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("1","E","1","2013-11-28","13:13:27","MFREY","002","","","2323","9797","Prueba de entrada x compras","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("4","E","3","2013-11-28","13:13:27","MFREY","001","","","888","12345","PRUEBA","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("5","E","1","2013-11-28","13:13:24","MFREY","001","","","0909","12345","prueba","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("6","E","1","2013-11-28","13:13:56","MFREY","001","","","989","12345","PRUEBA","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("7","S","4","2013-11-28","13:13:24","MFREY","002","","","8898","","PRUEBA","2013-11-28","","1");
INSERT INTO t_movi_heder VALUES("8","S","6","2013-11-28","00:00:00","MFREY","002","","","3","","","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("9","E","05","2013-11-28","00:00:00","MFREY","002","","","4","","","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("10","E","05","2013-11-28","00:00:00","MFREY","002","","","4","","","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("11","E","1","2013-11-28","16:16:02","MFREY","002","","","9898","98989","sanfksan","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("12","E","3","2013-11-28","00:00:00","MFREY","002","","","5","","","2013-11-28","","");
INSERT INTO t_movi_heder VALUES("13","S","6","2013-11-28","17:17:27","MFREY","001","","","99","","sjagjhaskjshfkjsd","2013-11-28","","9");
INSERT INTO t_movi_heder VALUES("14","S","6","2013-12-23","00:00:00","MFREY","002","","","6","","","2013-12-23","","");
INSERT INTO t_movi_heder VALUES("15","E","1","2013-12-30","13:13:17","MFREY","002","","","8989","12345","Esto es una prueba de entradas de materiales                            ","2013-12-30","","");
INSERT INTO t_movi_heder VALUES("16","E","2","2013-12-30","13:13:26","MFREY","001","","","iujiuoio","","prueba de entrada                ","2013-12-30","","");
INSERT INTO t_movi_heder VALUES("19","S","6","2014-01-03","00:00:00","MFREY","001","","","7","","","2014-01-03","","");
INSERT INTO t_movi_heder VALUES("20","E","2","2014-01-03","16:16:11","MFREY","001","","","980980","","    jkuhiuhkhkj                ","2014-01-03","","");
INSERT INTO t_movi_heder VALUES("21","S","6","2014-01-05","00:00:00","MFREY","001","","","8","","","2014-01-05","","");
INSERT INTO t_movi_heder VALUES("22","E","91","2014-01-07","00:00:39","MFREY","","","","","","Ajuste de Inventario \n	         Físico","2014-01-07","","");
INSERT INTO t_movi_heder VALUES("24","E","91","2014-01-07","01:01:15","MFREY","002","","","","","Ajuste de Inventario \n	         Físico","2014-01-07","","");
INSERT INTO t_movi_heder VALUES("25","E","91","2014-01-07","01:01:38","MFREY","002","","","2","","Ajuste de Inventario \n	         Físico","2014-01-07","","");
INSERT INTO t_movi_heder VALUES("34","S","4","2014-01-07","23:23:50","MFREY","001","","","980980","","            PENF,SDN,MFSN,        ","2014-01-07","","2");
INSERT INTO t_movi_heder VALUES("35","S","4","2014-01-08","00:00:47","MFREY","001","","","8574395873","","        shakdhaksdkasjdkla            ","2014-01-08","","2");
INSERT INTO t_movi_heder VALUES("44","E","1","2014-01-08","00:00:25","MFREY","001","","","9809809","9797","        HDKASJKDJAKL                        ","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("45","E","93","2014-01-08","19:19:17","MFREY","002","","","11","","Ajuste de Inventario \n	         Físico","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("46","S","94","2014-01-08","19:19:17","MFREY","002","","","11","","Ajuste de Inventario \n	         Físico","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("47","E","93","2014-01-08","19:19:05","MFREY","002","","","14","","Entrada \n						  por Traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("48","S","94","2014-01-08","19:19:05","MFREY","001","","","14","","Salida por 						  traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("49","E","93","2014-01-08","20:20:16","MFREY","001","","","20","","Entrada \n						  por Traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("50","S","94","2014-01-08","20:20:16","MFREY","002","","","20","","Salida por 						  traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("51","E","93","2014-01-08","20:20:31","MFREY","002","","","21","","Entrada \n						  por Traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("52","S","94","2014-01-08","20:20:31","MFREY","001","","","21","","Salida por 						  traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("53","E","93","2014-01-08","21:21:23","MFREY","002","","","24","","Entrada \n						  por Traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("54","S","94","2014-01-08","21:21:23","MFREY","001","","","24","","Salida por 						  traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("55","E","93","2014-01-08","21:21:37","MFREY","001","","","25","","Entrada \n						  por Traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("56","S","94","2014-01-08","21:21:37","MFREY","002","","","25","","Salida por 						  traspaso","2014-01-08","","");
INSERT INTO t_movi_heder VALUES("57","E","93","2014-01-09","11:11:44","MFREY","002","","","26","","Entrada \n						  por Traspaso","2014-01-09","","");
INSERT INTO t_movi_heder VALUES("58","S","94","2014-01-09","11:11:44","MFREY","001","","","26","","Salida por 						  traspaso","2014-01-09","","");
INSERT INTO t_movi_heder VALUES("59","E","93","2014-01-09","12:12:33","MFREY","001","","","27","","Entrada \n						  por Traspaso","2014-01-09","","");
INSERT INTO t_movi_heder VALUES("60","S","94","2014-01-09","12:12:33","MFREY","002","","","27","","Salida por 						  traspaso","2014-01-09","","");
INSERT INTO t_movi_heder VALUES("61","S","6","2014-01-12","00:00:00","MFREY","002","","","1","","","2014-01-12","","");
INSERT INTO t_movi_heder VALUES("62","S","6","2014-01-28","00:00:00","MFREY","002","","","15","","","2014-01-28","","");
INSERT INTO t_movi_heder VALUES("70","E","1","2014-02-16","12:12:04","MFREY","002","","","8989","9797","        Esto es una prueba de entrada a proyectos","2014-02-16","","");



DROP TABLE t_movi_items;

CREATE TABLE `t_movi_items` (
  `NUM_MOVI` int(10) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `CANTIDAD_MOVI` int(12) NOT NULL,
  `ITEMS` int(4) NOT NULL,
  `estatus` varchar(2) NOT NULL,
  `TIPO_MOVI` varchar(1) NOT NULL,
  `cod_proyecto` varchar(10) NOT NULL,
  UNIQUE KEY `Movi_Comp` (`NUM_MOVI`,`COD_COMP`,`NUM_SERIAL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_movi_items VALUES("7","4","TRYR-003","1","1","","","");
INSERT INTO t_movi_items VALUES("6","4","UYUY-076","1","1","","","");
INSERT INTO t_movi_items VALUES("5","2","JHJH-009","1","1","","","");
INSERT INTO t_movi_items VALUES("4","2","GFGF-99","1","1","","","");
INSERT INTO t_movi_items VALUES("3","4","UYUY-789","1","4","","","");
INSERT INTO t_movi_items VALUES("3","1","GFGF-66","1","3","","","");
INSERT INTO t_movi_items VALUES("3","2","GFGF-988","1","2","","","");
INSERT INTO t_movi_items VALUES("3","3","YTY-4565","1","1","","","");
INSERT INTO t_movi_items VALUES("2","4","HJHJ-99","1","1","","","");
INSERT INTO t_movi_items VALUES("1","4","TRYR-003","1","6","","","");
INSERT INTO t_movi_items VALUES("1","4","YGBD-003","1","5","","","");
INSERT INTO t_movi_items VALUES("1","1","TRVE-002","1","4","","","");
INSERT INTO t_movi_items VALUES("1","1","TEREY-004","1","3","","","");
INSERT INTO t_movi_items VALUES("1","2","RETE-002","1","2","","","");
INSERT INTO t_movi_items VALUES("1","2","WWW-001","1","1","","","");
INSERT INTO t_movi_items VALUES("8","2","RETE-002","1","1","","","");
INSERT INTO t_movi_items VALUES("8","4","YGBD-003","1","6","","","");
INSERT INTO t_movi_items VALUES("8","1","TRVE-002","1","5","","S","");
INSERT INTO t_movi_items VALUES("9","4","YGBD-003","1","0","","","");
INSERT INTO t_movi_items VALUES("10","4","YGBD-003","1","0","","","");
INSERT INTO t_movi_items VALUES("11","2","KNKK-98","1","1","","","");
INSERT INTO t_movi_items VALUES("12","1","TRVE-002","1","0","","","");
INSERT INTO t_movi_items VALUES("13","4","HJHJ-99","1","1","","","");
INSERT INTO t_movi_items VALUES("8","2","KNKK-98","1","7","","","");
INSERT INTO t_movi_items VALUES("14","4","YGBD-003","1","1","","","");
INSERT INTO t_movi_items VALUES("15","2","yiyiuy8098098","1","1","01","","");
INSERT INTO t_movi_items VALUES("15","3","67676","1","2","02","","");
INSERT INTO t_movi_items VALUES("15","4","77878","1","3","03","","");
INSERT INTO t_movi_items VALUES("15","4","uuuu","1","4","04","","");
INSERT INTO t_movi_items VALUES("16","3","yrytyt","1","1","01","","");
INSERT INTO t_movi_items VALUES("16","2","87998090","1","2","02","","");
INSERT INTO t_movi_items VALUES("16","1","98989","1","3","03","","");
INSERT INTO t_movi_items VALUES("16","4","8888","1","4","04","","");
INSERT INTO t_movi_items VALUES("19","4","UYUY-789","1","2","","","");
INSERT INTO t_movi_items VALUES("18","2","GFGF-99","1","1","01","","");
INSERT INTO t_movi_items VALUES("19","2","GFGF-988","1","1","","","");
INSERT INTO t_movi_items VALUES("20","4","jkjkljlk","1","1","01","","");
INSERT INTO t_movi_items VALUES("21","1","GFGF-66","1","1","","","");
INSERT INTO t_movi_items VALUES("21","2","JHJH-009","1","2","","","");
INSERT INTO t_movi_items VALUES("34","3","YTY-4565","1","1","01","","");
INSERT INTO t_movi_items VALUES("32","3","YTY-4565","1","1","01","","");
INSERT INTO t_movi_items VALUES("31","3","YTY-4565","1","1","01","","");
INSERT INTO t_movi_items VALUES("29","2","KNKK-98","1","1","01","","");
INSERT INTO t_movi_items VALUES("25","1","hjhkjhk","0","1","01","","");
INSERT INTO t_movi_items VALUES("25","1","ijkjk","6","2","01","","");
INSERT INTO t_movi_items VALUES("25","1","iuiouio","0","3","01","","");
INSERT INTO t_movi_items VALUES("25","1","kjkj","1","4","01","","");
INSERT INTO t_movi_items VALUES("25","1","TRVE-002","1","5","01","","");
INSERT INTO t_movi_items VALUES("25","2","jhkjhkj","1","6","01","","");
INSERT INTO t_movi_items VALUES("25","2","KNKK-98","1","7","01","","");
INSERT INTO t_movi_items VALUES("25","3","jhkjhk","1","8","03","","");
INSERT INTO t_movi_items VALUES("35","2","GFGF-99","1","1","01","S","");
INSERT INTO t_movi_items VALUES("35","4","UYUY-076","1","2","01","S","");
INSERT INTO t_movi_items VALUES("44","1","8798789","2","1","02","E","");
INSERT INTO t_movi_items VALUES("44","4","8989","1","2","01","E","");
INSERT INTO t_movi_items VALUES("45","3","yrytyt","0","1","01","","");
INSERT INTO t_movi_items VALUES("46","3","yrytyt","0","1","01","","");
INSERT INTO t_movi_items VALUES("45","4","8989","0","2","01","","");
INSERT INTO t_movi_items VALUES("46","4","8989","0","2","01","","");
INSERT INTO t_movi_items VALUES("47","4","jkjkljlk","0","1","01","","");
INSERT INTO t_movi_items VALUES("48","4","jkjkljlk","0","1","01","","");
INSERT INTO t_movi_items VALUES("49","1","TRVE-002","0","1","03","","");
INSERT INTO t_movi_items VALUES("50","1","TRVE-002","0","1","03","","");
INSERT INTO t_movi_items VALUES("51","1","98989","0","1","03","","");
INSERT INTO t_movi_items VALUES("52","1","98989","0","1","03","","");
INSERT INTO t_movi_items VALUES("53","4","8888","0","1","04","","");
INSERT INTO t_movi_items VALUES("54","4","8888","0","1","04","","");
INSERT INTO t_movi_items VALUES("55","4","8888","0","1","04","","");
INSERT INTO t_movi_items VALUES("56","4","8888","0","1","04","","");
INSERT INTO t_movi_items VALUES("57","2","87998090","0","1","02","","");
INSERT INTO t_movi_items VALUES("58","2","87998090","0","1","02","","");
INSERT INTO t_movi_items VALUES("59","2","87998090","1","1","02","","");
INSERT INTO t_movi_items VALUES("60","2","87998090","1","1","02","","");
INSERT INTO t_movi_items VALUES("59","4","uuuu","1","2","01","","");
INSERT INTO t_movi_items VALUES("60","4","uuuu","1","2","01","","");
INSERT INTO t_movi_items VALUES("61","2","KNKK-98","1","1","","","");
INSERT INTO t_movi_items VALUES("62","2","WWW-001","1","1","","","");
INSERT INTO t_movi_items VALUES("62","4","77878","1","2","","","");
INSERT INTO t_movi_items VALUES("70","2","YYYY-001","1","1","01","E","");
INSERT INTO t_movi_items VALUES("70","2","TTT-001","1","2","04","E","PRO001");
INSERT INTO t_movi_items VALUES("73","2","TTT-001","1","1","04","S","cod_proyec");
INSERT INTO t_movi_items VALUES("73","1","TRVE-002","1","2","01","S","cod_proyec");



DROP TABLE t_necesidades;

CREATE TABLE `t_necesidades` (
  `NUM_NECES` varchar(10) NOT NULL,
  `COD_GRUPO_ART` varchar(3) NOT NULL,
  `CANT_SOL` int(12) NOT NULL,
  `REF_NECES` date NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `NUM_SOLIC` varchar(10) NOT NULL,
  UNIQUE KEY `numero_necesidad` (`NUM_NECES`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE t_recuento_inv_fisico;

CREATE TABLE `t_recuento_inv_fisico` (
  `NUM_DOC` int(10) NOT NULL,
  `ITEM` int(3) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `CANT_FISICO` int(10) NOT NULL,
  `STATUS_STOCK` varchar(2) NOT NULL,
  UNIQUE KEY `doc_inv_componente` (`NUM_DOC`,`COD_COMP`,`NUM_SERIAL`,`STATUS_STOCK`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_recuento_inv_fisico VALUES("2","1","2","jhkjhkj","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","2","3","jhkjhk","2","03");
INSERT INTO t_recuento_inv_fisico VALUES("2","3","1","hjhkjhk","0","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","4","1","TRVE-002","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","5","2","KNKK-98","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","6","1","TEREY-004","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","7","2","WWW-001","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","8","2","uuuio","0","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","9","1","iuiouio","0","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","10","1","kjkj","1","01");
INSERT INTO t_recuento_inv_fisico VALUES("2","11","1","ijkjk","6","01");



DROP TABLE t_registro_ingreso;

CREATE TABLE `t_registro_ingreso` (
  `COD_USUARIO` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `fecha_registro` date NOT NULL,
  `hora_reg` time NOT NULL,
  `estatus` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_registro_ingreso VALUES("mfrey","uoiuoi","2013-09-09","20:20:28","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","hola","2013-09-09","20:20:10","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","rrr","2013-09-09","20:20:14","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","hjhj","2013-09-09","20:20:19","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122835","2013-09-10","11:11:46","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","112345678","2013-09-12","14:14:09","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122835","2013-09-12","22:22:37","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122835","2013-09-19","08:08:19","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122835","2013-09-19","12:12:27","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","7687","2013-09-25","21:21:29","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","879879","2013-09-25","21:21:34","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","788987","2013-09-25","21:21:39","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","8888","2013-09-25","21:21:43","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122838","2013-11-19","17:17:36","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","1","2013-11-27","17:17:29","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","2","2013-11-27","17:17:35","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","3","2013-11-27","17:17:39","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","6","2013-11-27","17:17:44","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","8u89","2013-11-27","17:17:40","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","87878","2013-11-27","17:17:45","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","u8u9","2013-11-27","17:17:50","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","uiui","2013-11-27","17:17:55","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","iuiui","2013-11-27","17:17:00","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","8989","2013-11-27","18:18:31","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","77","2013-11-27","18:18:24","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","99","2013-11-27","18:18:27","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","888","2013-11-27","18:18:31","1");
INSERT INTO t_registro_ingreso VALUES("mfrey","12122838","2013-12-05","00:00:43","");



DROP TABLE t_solicitud_canceladas;

CREATE TABLE `t_solicitud_canceladas` (
  `NUM_SOLIC` int(10) NOT NULL,
  `FEC_CAN` date NOT NULL,
  `MOTIVO` varchar(200) NOT NULL,
  `COD_CTS` varchar(10) NOT NULL,
  UNIQUE KEY `nro_solicitud` (`NUM_SOLIC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_solicitud_canceladas VALUES("9","2014-01-12","        ","1");
INSERT INTO t_solicitud_canceladas VALUES("1","2013-11-28","Prueba","3");
INSERT INTO t_solicitud_canceladas VALUES("2","2013-11-28","","");
INSERT INTO t_solicitud_canceladas VALUES("5","2014-01-13","  ","1");



DROP TABLE t_solicitud_confirmadas;

CREATE TABLE `t_solicitud_confirmadas` (
  `NUM_SOLIC` int(10) NOT NULL,
  `NUM_CONF` varchar(10) NOT NULL,
  `COD_GRUPO_ART` varchar(3) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `CANT_CONF` int(12) NOT NULL,
  `items` int(4) NOT NULL,
  `num_serial` varchar(20) NOT NULL,
  `IND_ASIGNADO` int(1) NOT NULL,
  UNIQUE KEY `Sol_conf` (`NUM_SOLIC`,`COD_COMP`,`num_serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_solicitud_confirmadas VALUES("3","","","2","1","7","KNKK-98","1");
INSERT INTO t_solicitud_confirmadas VALUES("3","","","1","1","5","TRVE-002","1");
INSERT INTO t_solicitud_confirmadas VALUES("3","","","4","1","6","YGBD-003","1");
INSERT INTO t_solicitud_confirmadas VALUES("3","","","2","1","1","RETE-002","0");
INSERT INTO t_solicitud_confirmadas VALUES("6","","","4","1","1","YGBD-003","1");
INSERT INTO t_solicitud_confirmadas VALUES("7","","","2","1","1","GFGF-988","1");
INSERT INTO t_solicitud_confirmadas VALUES("7","","","4","1","2","UYUY-789","1");
INSERT INTO t_solicitud_confirmadas VALUES("8","","","1","1","1","GFGF-66","0");
INSERT INTO t_solicitud_confirmadas VALUES("8","","","2","1","2","JHJH-009","0");
INSERT INTO t_solicitud_confirmadas VALUES("1","","","2","1","1","KNKK-98","0");
INSERT INTO t_solicitud_confirmadas VALUES("15","","","2","1","1","WWW-001","0");
INSERT INTO t_solicitud_confirmadas VALUES("15","","","4","1","2","77878","0");



DROP TABLE t_stock;

CREATE TABLE `t_stock` (
  `cod_comp` varchar(10) NOT NULL,
  `num_serial` varchar(20) NOT NULL,
  `cod_alm` varchar(3) NOT NULL,
  `status` varchar(2) NOT NULL,
  `stock` int(12) NOT NULL,
  `nota` varchar(100) NOT NULL,
  `cod_proyecto` varchar(10) NOT NULL,
  UNIQUE KEY `stock` (`cod_comp`,`num_serial`,`cod_alm`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_stock VALUES("1","TRVE-002","002","03","0","","");
INSERT INTO t_stock VALUES("4","TRYR-003","002","01","0","","");
INSERT INTO t_stock VALUES("2","WWW-001","002","01","0","","");
INSERT INTO t_stock VALUES("2","KNKK-98","002","01","0","","");
INSERT INTO t_stock VALUES("2","RETE-002","002","01","0","","");
INSERT INTO t_stock VALUES("1","TRVE-002","002","01","1","","");
INSERT INTO t_stock VALUES("1","TEREY-004","002","01","1","","");
INSERT INTO t_stock VALUES("4","YGBD-003","002","01","0","","");
INSERT INTO t_stock VALUES("4","HJHJ-99","001","01","0","","");
INSERT INTO t_stock VALUES("1","GFGF-66","001","01","0","","");
INSERT INTO t_stock VALUES("2","GFGF-988","001","01","0","","");
INSERT INTO t_stock VALUES("3","YTY-4565","001","01","0","","");
INSERT INTO t_stock VALUES("4","UYUY-789","001","01","0","","");
INSERT INTO t_stock VALUES("2","GFGF-99","001","01","0","","");
INSERT INTO t_stock VALUES("2","JHJH-009","001","01","0","","");
INSERT INTO t_stock VALUES("4","UYUY-076","001","01","0","","");
INSERT INTO t_stock VALUES("1","TRVE-002","001","03","0","","");
INSERT INTO t_stock VALUES("2","yiyiuy8098098","002","01","1","","");
INSERT INTO t_stock VALUES("3","67676","002","01","1","","");
INSERT INTO t_stock VALUES("4","77878","002","01","0","","");
INSERT INTO t_stock VALUES("4","uuuu","002","01","0","","");
INSERT INTO t_stock VALUES("1","98989","001","03","0","","");
INSERT INTO t_stock VALUES("2","87998090","001","02","1","","");
INSERT INTO t_stock VALUES("3","yrytyt","001","01","0","","");
INSERT INTO t_stock VALUES("4","8888","001","04","1","","");
INSERT INTO t_stock VALUES("4","jkjkljlk","001","01","0","","");
INSERT INTO t_stock VALUES("1","8798789","001","02","2","","");
INSERT INTO t_stock VALUES("4","8989","001","01","0","","");
INSERT INTO t_stock VALUES("3","yrytyt","002","01","0","","");
INSERT INTO t_stock VALUES("4","8989","002","01","0","","");
INSERT INTO t_stock VALUES("4","jkjkljlk","002","01","0","","");
INSERT INTO t_stock VALUES("1","98989","002","03","0","","");
INSERT INTO t_stock VALUES("4","8888","002","04","0","","");
INSERT INTO t_stock VALUES("2","87998090","002","02","0","","");
INSERT INTO t_stock VALUES("4","uuuu","001","01","1","","");
INSERT INTO t_stock VALUES("2","TTT-001","002","04","1","","PRO001");
INSERT INTO t_stock VALUES("2","YYYY-001","002","01","1","","");



DROP TABLE t_traspaso_heder;

CREATE TABLE `t_traspaso_heder` (
  `NUM_TRASPASO` varchar(15) NOT NULL,
  `FEC_MOVI` date NOT NULL,
  `HORA_MOVI` time NOT NULL,
  `COD_USUARIO` varchar(10) NOT NULL,
  `COD_ALM_ORIGEN` varchar(3) NOT NULL,
  `NUM_DOC_REF` varchar(15) NOT NULL,
  `Nota` varchar(100) NOT NULL,
  `COD_ALM_DESTINO` varchar(3) NOT NULL,
  UNIQUE KEY `NUM_TRASPASO` (`NUM_TRASPASO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_traspaso_heder VALUES("11","2014-01-08","19:19:17","MFREY","001","uoiuoi","hjhkkkjhkjhkjh                                                                                      ","$00");
INSERT INTO t_traspaso_heder VALUES("14","2014-01-08","19:19:05","MFREY","001","980980","asdajskjdaks\n                                                                                    ","002");
INSERT INTO t_traspaso_heder VALUES("20","2014-01-08","20:20:16","MFREY","002","908098i09","Prueba                                    ","001");
INSERT INTO t_traspaso_heder VALUES("21","2014-01-08","20:20:31","MFREY","001","uoiuoiuoi","  Cambio del 001 al 002, 1 cpu 98989 esttaus dañado...                     ","002");
INSERT INTO t_traspaso_heder VALUES("24","2014-01-08","21:21:23","MFREY","001","989890","4 - 8888 proyecto 001 a 002, cantidad 1                        ","002");
INSERT INTO t_traspaso_heder VALUES("25","2014-01-08","21:21:37","MFREY","002","iuouio","hjhjkhkjh                        ","001");
INSERT INTO t_traspaso_heder VALUES("26","2014-01-09","11:11:44","MFREY","001","888","del 001 al 002                                      ","002");
INSERT INTO t_traspaso_heder VALUES("27","2014-01-09","12:12:33","MFREY","002","98989","   Prueba                                             ","001");



DROP TABLE t_traspaso_items;

CREATE TABLE `t_traspaso_items` (
  `NUM_TRASPASO` int(15) NOT NULL,
  `ITEMS` int(4) NOT NULL,
  `COD_COMP` varchar(10) NOT NULL,
  `NUM_SERIAL` varchar(20) NOT NULL,
  `CANTIDAD_MOVI` int(12) NOT NULL,
  `ESTATUS` varchar(2) NOT NULL,
  UNIQUE KEY `NUM_TRASPASO` (`NUM_TRASPASO`,`COD_COMP`,`NUM_SERIAL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO t_traspaso_items VALUES("14","1","4","jkjkljlk","1","01");
INSERT INTO t_traspaso_items VALUES("11","2","4","8989","1","01");
INSERT INTO t_traspaso_items VALUES("11","3","3","yrytyt","1","01");
INSERT INTO t_traspaso_items VALUES("20","1","1","TRVE-002","1","03");
INSERT INTO t_traspaso_items VALUES("21","1","1","98989","1","03");
INSERT INTO t_traspaso_items VALUES("24","1","4","8888","1","04");
INSERT INTO t_traspaso_items VALUES("25","1","4","8888","1","04");
INSERT INTO t_traspaso_items VALUES("26","1","2","87998090","1","02");
INSERT INTO t_traspaso_items VALUES("27","1","4","uuuu","1","01");
INSERT INTO t_traspaso_items VALUES("27","2","2","87998090","1","02");



