<?php

namespace App;

use Symfony\Component\DependencyInjection\ContainerConfigurator;
use Symfony\Bundle\FrameworkBundle\DependencyInjection\FrameworkConfigurator;
use FOS\UserBundle\DependencyInjection\FOSUserConfigurator;

class AppConfigurator extends ContainerConfigurator
{
    // these would be added via Flex
    use FrameworkConfigurator;
    use FOSUserConfigurator;
}
