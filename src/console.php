#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use MaciejFikus\RSSFetcher\Command\CSVSimpleCommand;
use MaciejFikus\RSSFetcher\Command\CSVExtendedCommand;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application;

$container = new ContainerBuilder();
$loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../config/'));
$loader->load('services.xml');

$container->compile();

$app = new Application();
$app->add($container->get(CSVSimpleCommand::class));
$app->add($container->get(CSVExtendedCommand::class));
$app->run();