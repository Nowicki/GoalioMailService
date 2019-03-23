<?php
namespace GoalioMailService;

use GoalioMailService\Mail\Service\MessageFactory;

class Module {

    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'shared' => [
                'goaliomailservice_message'   => false
            ],
            'invokables' => [
                'goaliomailservice_message'   => 'GoalioMailService\Mail\Service\Message',
            ],
            'factories' => [
                'goaliomailservice_options'   => 'GoalioMailService\Mail\Options\Service\TransportOptionsFactory',
                'goaliomailservice_transport' => 'GoalioMailService\Mail\Transport\Service\TransportFactory',
                'goaliomailservice_renderer'  => 'GoalioMailService\Mail\View\MailPhpRendererFactory',
                'goaliomailservice_message'   => MessageFactory::class,
            ],
        ];
    }
}
