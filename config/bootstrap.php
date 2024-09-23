<?php
// configuration de l'EntityManager
use Doctrine\ORM\ORMSetup;

require_once __DIR__.'/../vendor/autoload.php';

//définir l'emplacement des entités
$path = [__DIR__.'/../src/Entity'];
$isDevMode = true;

//Définir la configuration des entités
$configuration = ORMSetup::createAttributeMetadataConfiguration($path, $isDevMode);

//Définir les éléments de connection à la base de données
$configurationdb =[
    'driver'=>'pdo_mysql',
    'user'=>'root',
    'password'=>'',
    'dbname'=>'db_post',
    'host'=>'localhost'
];

//Créer la connexion à la base de données
$connexionBD = \Doctrine\DBAL\DriverManager::getConnection($configurationdb, $configuration);
$entityManager = new Doctrine\ORM\EntityManager($connexionBD, $configuration);
return $entityManager;