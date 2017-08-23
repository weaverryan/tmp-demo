<?php
use Symfony\Component\Config\Loader\Config\framework;
$container->loadFromExtension('framework', [
    'secret' => '%env(APP_SECRET)%',
    // 'default_locale' => 'en',
    // 'csrf_protection' => true,
    // 'http_method_override' => true,
    // 'trusted_hosts' => [],
    // https://symfony.com/doc/current/reference/configuration/framework.html#handler-id
    // 'session' => [
        // handler_id: session.handler.native_file
        // save_path: '%kernel.project_dir%/var/sessions/%kernel.environment%'
    // ],
    // 'esi' => true,
    // 'fragments' => true,
    'php_errors' => [
        'log' => true
    ]
]);
