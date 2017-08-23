<?php

use App\AppConfigurator;
use App\Command\ListUsersCommand;
use App\Twig\AppExtension;
use App\EventListener\CommentNotificationSubscriber;
use App\EventListener\RedirectToPreferredLocaleSubscriber;
use Twig\Extensions\IntlExtension;
use App\Utils\Slugger;

return function(AppConfigurator $di) {
    $di->configureDefaults()
        ->autowired(true)
        ->autoconfigured(true)
        ->public(false);

    $di
        ->load('App\\', '../src/*', '../../src/{Entity,Repository}');

    $di
        ->load('AppBundle\Controller\\', '../../src/AppBundle/Controller')
        ->public(true)
        ->tag('../../src/AppBundle/Controller');

    $di->get(ListUsersCommand::class)
        ->bind('$emailSender', '%email_sender%');
    ;
    $di->get(AppExtension::class)
        ->bind('$locales', '%app_locales%');
    $di->get(CommentNotificationSubscriber::class)
        ->bind('$sender', '%app.notifications.email_sender%');
    $di->get(RedirectToPreferredLocaleSubscriber::class)
        ->bind('$locales', '%app_locales%')
        ->bind('$defaultLocale', '%locale%');
    $di->add(IntlExtension::class);
    $di->alias('slugger', $di->reference(Slugger::class))
        ->public(true);
};
