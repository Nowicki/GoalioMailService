<?php
namespace GoalioMailService\Mail\Options\Service;

use GoalioMailService\Mail\Options\TransportOptions;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class TransportOptionsFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
        return new TransportOptions($config['goaliomailservice'] ?? []);
    }
}
