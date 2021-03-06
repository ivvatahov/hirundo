<?php
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

AnnotationDriver::registerAnnotationClasses();
   
$config = new Configuration();
$config->setProxyDir(__SITE_PATH . '/data/cache/mongo');
$config->setProxyNamespace('Proxies');
$config->setDefaultDB('hirundo');
$config->setHydratorDir(__SITE_PATH . '/data/cache/mongo');
$config->setHydratorNamespace('Hydrators');
$config->setMetadataDriverImpl(AnnotationDriver::create(__SITE_PATH . '/data/cache/mongo'));

$dm = DocumentManager::create(new Connection(), $config);
    
?>
