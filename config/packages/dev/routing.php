<?php

use App\AppConfigurator;

return function(AppConfigurator $di) {
    $framework = $di->framework();

    $framework->router
        ->strict_requirements(true);
};
