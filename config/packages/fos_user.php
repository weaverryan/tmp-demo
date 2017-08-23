<?php

use App\AppConfigurator;

return function(AppConfigurator $di) {
    $fos_user = $di->fos_user();

    $fos_user->db_driver('orm');
    $fos_user->firewall_name('main');
    $fos_user->user_class('App\\Entity\\User');
    $fos_user->service()
      ->user_manager(UserManager::class)
      ->mailer(CustomMailer::class);
    $fos_user->from_email()
      ->address('%mailer_sender_address%')
      ->sender_name('%mailer_sender_name%');

    // we go one level deeper here
    $fos_user->registration\confirmation()
      ->enabled(true);
    $fos_user->registration\form()
      ->type(RegistrationFormType::class);

    $fos_user->resetting\token_ttl(86400);
    $fos_user->change_password(true);
    $fos_user->profile(true);
};
