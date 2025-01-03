<?php
require_once  '/vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


// Cargar variables de entorno desde .env
$envFile =  '/.env';
if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile, false, INI_SCANNER_RAW);
    foreach ($envVariables as $key => $value) {
        putenv("$key=$value");
    }
}

// Configuración de Doctrine
$paths = [ '/src/entity']; // Directorio donde estarán las entidades
$isDevMode = true;

// Configuración de conexión a la base de datos
$dbParams = [
    'driver'   => getenv('DB_DRIVER'),
    'host'     => getenv('DB_HOST'),
    'port'     => getenv('DB_PORT'),
    'dbname'   => getenv('DB_NAME'),
    'user'     => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD'),
];

// Crear configuración y Entity Manager
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);

// Devolver el Entity Manager
return $entityManager;
