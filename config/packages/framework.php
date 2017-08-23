<?php

use App\AppConfigurator;

return function(AppConfigurator $di) {
    $framework = $di->framework();

    $framework->secret('%env(SYMFONY_SECRET)%');

    // $framework->default_locale('en');
    // $framework->csrf_protection(true);
    // $framework->http_method_override(true);
    // $framework->trusted_hosts(null);

    // https://symfony.com/doc/current/reference/configuration/framework.html#handler-id
    // $framework->session
    //  ->handler_id('session.handler.native_file')
    //  ->save_path('%kernel.project_dir%/var/sessions/%kernel.environment%');

    // $framework->esi()
    // $framework->fragments();

    $framework->php_errors
      ->log(true);
};
