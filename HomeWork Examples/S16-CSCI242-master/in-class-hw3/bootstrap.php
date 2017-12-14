<?php

require_once("vendor/autoload.php");

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('hw3');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/src/Smith/Models/'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create(new Connection(), $config);