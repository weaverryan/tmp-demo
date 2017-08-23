<?php

use App\AppConfigurator;

return function(AppConfigurator $di) {
    $framework = $di->framework();

    $framework->test(true);
    $framework->session
        ->storage_id('session.storage_mock_file');
};
