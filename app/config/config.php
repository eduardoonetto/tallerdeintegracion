<?php
// Definir constantes
define("DB_HOST", "localhost");
define("DB_USER", "erp_admin");
define("DB_PASSWORD", "Hash:12!");
define("DB_NAME", "integration_workshop");

define("SITE_TITLE", "Mi Sitio Web");
define("MAX_UPLOAD_SIZE", 1048576); // Tamaño máximo de carga en bytes

// Otras constantes
define("TAX_RATE", 0.19);
// Puedes agregar más constantes según tus necesidades

// Constantes de rutas
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
define("INCLUDES_PATH", ROOT_PATH . "/includes");
define("IMAGES_PATH", ROOT_PATH . "/images");

// Constantes de URL
define("SITE_URL", "https://www.tusitio.com");
define("ASSETS_URL", SITE_URL . "/assets");
define("UPLOADS_URL", SITE_URL . "/uploads");
define("ERROR_CODES", array(
    1=>"Campos Faltantes",
    2=>"Error al guardar",
));
?>