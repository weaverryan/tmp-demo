<?php

use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Definition;
use App\Command\ListUsersCommand;
use App\Twig\AppExtension;
use App\EventListener\CommentNotificationSubscriber;
use App\EventListener\RedirectToPreferredLocaleSubscriber;
use Twig\Extensions\IntlExtension;
use App\Utils\Slugger;

$definition = new Definition();

$definition
    ->setAutowired(true)
    ->setAutoconfigured(true)
    ->setPublic(false)
;

$this->registerClasses(
    $definition,
    'App\\',
    '../src/*',
    '../src/{Entity,Repository}'
);

$definition
    ->setAutowired(true)
    ->setAutoconfigured(true)
    ->addTag('controller.service_arguments')
;
$this->registerClasses(
    $definition,
    'App\\Controller\\',
    '../src/Controller'
);

$container->register(ListUsersCommand::class)
    ->setArgument('$locales', '%app_locales%');

$container->register(AppExtension::class)
    ->setArgument('$locales', '%app_locales%');

$container->register(CommentNotificationSubscriber::class)
    ->setArgument('$locales', '%app_locales%');

$container->register(RedirectToPreferredLocaleSubscriber::class)
    ->setArgument('$locales', '%app_locales%');

$container->register(IntlExtension::class)
    ->setArgument('$locales', '%app_locales%');

$container->setAlias('slugger', new Alias(Slugger::class));
