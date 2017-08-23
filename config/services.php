<?php

use App\Command\ListUsersCommand;
use App\Twig\AppExtension;
use App\EventListener\CommentNotificationSubscriber;
use App\EventListener\RedirectToPreferredLocaleSubscriber;
use Twig\Extensions\IntlExtension;
use App\Utils\Slugger;

di\services()
    ->defaults()
        ->autowired(true)
        ->autoconfigured(true)
        ->public(false)
    ->prototype('App\\', '../src/*')
        ->exclude('../src/{Entity,Repository}')
    ->prototype('App\\Controller\\', '../src/Controller')
        ->public(true)
        ->tag('controller.service_arguments')
    ->add(ListUsersCommand::class)
        ->argument('$locales', '%app_locales%')

    ->add(AppExtension::class)
        ->argument('$locales', '%app_locales%')

    ->add(CommentNotificationSubscriber::class)
        ->argument('$locales', '%app_locales%')

    ->add(RedirectToPreferredLocaleSubscriber::class)
        ->argument('$locales', '%app_locales%')

    ->add(IntlExtension::class)
        ->argument('$locales', '%app_locales%')

    ->alias('slugger', \di\ref(Slugger::class))
;
